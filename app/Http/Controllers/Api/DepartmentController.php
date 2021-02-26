<?php

namespace App\Http\Controllers\Api;

use App\Department;
use App\Professor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\School;

class DepartmentController extends Controller
{


    public function search(Request $request)
    {

        $departments = new Department();

        $query = $request->input('query');
        $departments = $departments->where('department_name', 'like', "%$query%");


        return response()->json([
            'departments' => $departments->get(),
            'message' => 'Department Record fetched successfully.',
            'status' => 'success',
            'code' => 200,
        ], 200);
    }
}
