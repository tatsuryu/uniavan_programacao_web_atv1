<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Tasks::all();
        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newtask = Tasks::create([
            'description'=>$request->description,
            'done'=>false
        ]);
        return response()->json($newtask, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tasks $tasks)
    {
        return response()->json($tasks);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tasks $tasks)
    {
        $tasks->description = is_null($request->description) ?
            $tasks->description : $request->description;
        $tasks->done = is_null($request->done) ?
            $tasks->done : $request->done;
        $tasks->save();
        return response()->json($tasks);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasks $tasks)
    {
        $tasks->delete();
        return response()->json(null, 204);
    }
}
