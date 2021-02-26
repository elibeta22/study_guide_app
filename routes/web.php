<?php
use App\School;
use App\Review;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;
use App\State;
use App\Department;
use JsonStreamingParser\Listener\InMemoryListener;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/image/{img}', function ($img) {
    try {
        $url =  storage_path() . '/app/public/image/' . $img;
        return  response()->download($url);
    } catch (FileNotFoundException $e) {
        return [
            'message' => $img . " does not exist.",
            'code' => 404,
            'status' => 'error'
        ];
    }
});
Route::get('/documents/{document}', function ($document) {
    try {
        $url =  storage_path() . '/app/public/documents/' . $document;
        return  response()->download($url);
    } catch (FileNotFoundException $e) {
        return [
            'message' => $document . " does not exist.",
            'code' => 404,
            'status' => 'error'
        ];
    }
});

Route::get('/upload-data', function () {

    ini_set('max_execution_time', 180);

    Artisan::call('migrate:fresh');

    $path = storage_path() . '/app/data.json';

    $listener = new InMemoryListener();

    $stream = fopen($path, 'rb');

    try {
        $parser = new \JsonStreamingParser\Parser($stream, $listener);
        $parser->parse();
        fclose($stream);
    } catch (Exception $e) {
        fclose($stream);
        throw $e;
    }

    $json = $listener->getJson();
    // $json = json_decode(file_get_contents($path), true);


    for ($i = 0; $i < count($json); $i++) {
        $school = School::create([
            'school_id'   => $json[$i]['school_id'],
            'school_name' => $json[$i]['school_name'],
            'school_location' => $json[$i]['school_location'],
            'school_state' => $json[$i]['school_state'],
            'school_total_top_professors' => $json[$i]['school_total_top_professors'],
        ]);

        for ($j = 0; $j < count($json[$i]['school_top_professors']); $j++) {
            $user = \App\User::create([
                'school_id' => $school->id,
                'professor_id' => $json[$i]['school_top_professors'][$j]['professor_id'],
                'name' => $json[$i]['school_top_professors'][$j]['professor_name'],
                'total_reviews' => count($json[$i]['school_top_professors'][$j]['professor_reviews']),
                'image' => $json[$i]['school_top_professors'][$j]['professor_image'],
                'department' => $json[$i]['school_top_professors'][$j]['professor_department'],
                'rate' => $json[$i]['school_top_professors'][$j]['professor_rate'],
            ]);

            for ($k = 0; $k < count($json[$i]['school_top_professors'][$j]['professor_reviews']); $k++) {
                $review = Review::create([
                    'user_id' => $user->id,
                    'name' => $json[$i]['school_top_professors'][$j]['professor_reviews'][$k]['name'],
                    'rating' => $json[$i]['school_top_professors'][$j]['professor_reviews'][$k]['rating'],
                    'comment' => $json[$i]['school_top_professors'][$j]['professor_reviews'][$k]['comment'],
                    'review_date' => date("Y-m-d", strtotime($json[$i]['school_top_professors'][$j]['professor_reviews'][$k]['review_date'])),
                ]);
            }
        }
    }

    $path = storage_path() . '/app/states.json';
    $states = json_decode(file_get_contents($path), true)[0]["states"];

    for ($i = 0; $i < count($states); $i++) {

        State::create([
            'state' => $states[$i]['value'],
            'code' => $states[$i]['key'],
        ]);
    }


    $departments = \App\User::select('department')->groupBy('department')->get();

    foreach ($departments as $department) {
        Department::create([
            'name' => $department->department
        ]);
    }


    $departments = \App\User::select('school_id', 'department')->get();

    foreach ($departments as $schoolDepartment) {
        $department = Department::select('id')->where('name', $schoolDepartment->department)->first();
        $department->schools()->attach($schoolDepartment->school_id);
    }
});
