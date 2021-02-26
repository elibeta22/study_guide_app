<?php

namespace App\Http\Controllers\Api;

use App\Professor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\School;

class SchoolController extends Controller
{


    public function search(Request $request)
    {

        $schools = new School();

        if ($request->has('query')) {
            $query = $request->input('query');
            $schools = $schools->where('school_name', 'like', "%$query%");
        } else if ($request->has('location')) {
            $school_location = $request->input('location');
            $schools  = $schools->where('school_location', 'like', "%$school_location%");
        }

        return response()->json([
            'schools' => $schools->get(),
            'message' => 'Schools Record fetched successfully.',
            'status' => 'success',
            'code' => 200,
        ], 200);
    }

    public function show(School $school)
    {
        $school->load('professors');
        foreach ($school->professors as $professor){
            $avg_rate = Professor::find($professor->id);
            $professor->professor_rating = $avg_rate->ratings->avg('rating');
            $professor->number_of_reviews = $avg_rate->ratings->count('id');

        }


        return response()->json([
            'school' => $school,
            'message' => 'Get Single School',
            'status' => 'success',
            'code' => 200,
        ], 200);
    }

    public function departments(School $school)
    {
        $schoolDepartments =  $school->departments()->select(['id', 'name'])->get();

        return response()->json([
            'school_departments' => $schoolDepartments,
            'message' => 'Get School Departments',
            'status' => 'success',
            'code' => 200,
        ], 200);
    }
}
