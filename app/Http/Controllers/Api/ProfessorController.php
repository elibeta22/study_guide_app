<?php

namespace App\Http\Controllers\Api;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Professor;
use App\Review;
use App\StudyData;
use App\User;
use TijsVerkoyen\CssToInlineStyles\Css\Property\Processor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ProfessorController extends Controller
{
    public function show(Professor $professor)
    {


        $professor->load('ratings');
        $professor->load('department');
        $professor->average_rating = $professor->ratings()->avg('rating');

        foreach ($professor->ratings as $rating){

                $review_by_user = User::find($rating->review_by);
                if($review_by_user->user_type_id == 2){
                    $review_by_name = Professor::where('professor_user_id', '=', $review_by_user->id)->get();
                    $rating->review_by_name = $review_by_name[0]['professor_name'];
                }else{
                    $review_by_name = Student::where('student_user_id', '=', $review_by_user->id)->get();
                    $rating->review_by_name = $review_by_name[0]['student_name'];
                }

        }

        return response()->json([
            'professor' => $professor,
            'message' => 'Get Single Professor',
            'status' => 'success',
            'code' => 200,
        ], 200);
    }

    public function search(Request $request)
    {

        if ($request->has('by_name')) {
            $school_name = $request->input('school_name');
            $professor_name = $request->input('professor_name');
            $professors = Professor::leftjoin('schools', 'professors.school_id', '=', 'schools.id')
                ->select('professors.professor_name', 'schools.school_name')
                ->where('professor_name', 'like', "%$professor_name%");
        }

        if ($request->has('by_department')) {
            $school_id = $request->input('school_id');
            $department_id = $request->input('department_id');
            $professors = Professor::leftjoin('schools', 'professors.school_id', '=', 'schools.id')
                ->leftjoin('departments', 'professors.department_id', '=', 'departments.id')
                ->select(array("professors.id","professors.professor_name", "schools.school_name","departments.department_name"))
                ->where('school_id', 'like', "%$school_id%")
                ->orWhere('department_id', 'like', "%$department_id%");
            $results = $professors->get();
            $results->load('ratings');

        }

        foreach ($results as $professor){

            $professor->professor_rating = $professor->ratings->avg('rating');
            $professor->total_reviews = $professor->ratings->count('id');
        }


        if (auth()->check()) {
            $professors = $professors->where('name', '!=', auth()->user()->professor()->professor_name);
        }

        return response()->json([
            'professors' => $results,
            'message' => 'Professors Record fetched successfully.',
            'status' => 'success',
            'code' => 200,
        ], 200);
    }


    public function rate(Request $request)
    {

        try {
            $this->validate($request, [
                'review_for' => [
                    'required',
                    'exists:professors,id',
                    Rule::unique('reviews')->where(function ($query) use ($request) {
                        return $query->where('review_for', $request->review_for)
                            ->where('review_by', auth()->user()->id);
                    })
                ],
                'rating' => 'required',
                'comment' => 'required',
            ], [
                'unique' => 'You already submitted a review for this professor.'
            ]);
        } catch (ValidationException $e) {
            $message = '';
            foreach ($e->errors() as $key => $value) {
                $message = $value[0];
                break;
            }
            return response()->json([
                'message' => $message,
                'status' => 'error',
                'code' => 422,
            ], 422);
        }

        Review::create([
            'review_for' => $request->review_for,
            'review_by' => auth()->user()->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'review_date' => date('Y-m-d'),
        ]);

        return response()->json([
            'message' => 'Review has been submited Successfully.',
            'status' => 'success',
            'code' => 200,
        ], 200);
    }
    public function upload(Request $request)
    {
        // Validate request
        $this->validate($request, [
            'published_to' => 'required|exists:users,id',
            'documents' => 'required|array|min:1',
            'documents.*.document' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:5120',
            'documents.*.document_type' => 'required|in:image,document',
            'documents.*.document_name' => 'required'
        ]);

        $documents = $request->documents;

        for ($i = 0; $i < count($documents); $i++) {

            // Name image/document and store
            $document = $documents[$i]['document'];
            $documentName = $documents[$i]['document_name'];
            $temp = explode('.', $documentName);
            $ext  = array_pop($temp);
            $documentName = implode('.', $temp);
            $documentSize = $this->formatSizeUnits($document->getSize());
            $documentNewName = str_slug($documentName) . '-' . time() . '.' . $document->getClientOriginalExtension();
            $destinationPath = $documents[$i]['document_type'] === 'image' ? 'public/image' : 'public/documents';
            $document->storeAs($destinationPath, $documentNewName);
            $documentFullPath = $documents[$i]['document_type'] === 'image' ? 'image/' . $documentNewName : 'documents/' . $documentNewName;

            // Presist to database
            StudyData::create([
                'published_to'  => $request->published_to,
                'published_by'  => auth()->user()->id,
                'document_name' =>  $documentName,
                'document_size' => $documentSize,
                'document_type' => $documents[$i]['document_type'],
                'document' =>  $documentFullPath,
            ]);
        }


        return response()->json([
            'message' => 'Document has been uploaded successfully.',
            'status' => 'success',
            'code' => 200,
        ], 200);
    }

    public function studyData(Professor $professor)
    {
        $documents =  $professor
            ->studyData()
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'documents' => $documents,
            'message' => 'Document has been fetched successfully.',
            'status' => 'success',
            'code' => 200,
        ], 200);
    }

    public function deleteDocument(StudyData $document)
    {
        // Verify id user own document or not
        if ($document->published_by === auth()->user()->id) {
            //Delete document from storage
            Storage::delete('public/' . $document->getOriginal('document'));
            //Delete document from database
            $document->delete();
            return response()->json([
                'message' => 'Document has been deleted.',
                'status' => 'success',
                'code' => 200,
            ], 200);
        }

        return response()->json([
            'message' => 'You are not authorized to delete this document.',
            'status' => 'error',
            'code' => 403,
        ], 403);
        return auth()->user()->id;
    }

    public function updatePorfile(Request $request)
    {
        $user = auth()->user();

        if ($request->has('name')) {
            $user->name = $request->input('name');
        }

        if ($request->has('image')) {
            if ($user->is_able_to_login && $user->image) {
                Storage::delete('public/' . $user->getOriginal('image'));
            }
            // Save User New Image
            $path = $request->file('image')->store('image', 'public');
            $user->image = $path;
        }

        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return response()->json([
            'message' => 'Your Profile has been updated successfully.',
            'status' => 'success',
            'user' => $user,
            'code' => 200,
        ], 200);
    }

    public function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
}
