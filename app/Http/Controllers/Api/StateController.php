<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\State;

class StateController extends Controller
{
    public function index()
    {
        return response()->json([
            'states' => State::select('state', 'code')->orderBy('state', 'asc')->get(),
            'message' => 'State Record fetched successfully.',
            'status' => 'success',
            'code' => 200,
        ], 200);
    }
}
