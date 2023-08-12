<?php

namespace App\Http\Controllers\ApiRest;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Students::all();
        return StudentResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = Students::create($request->all());
        return new StudentResource($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Students::find($id);
        if (!$data){
            response()->json(["message" => "Student not found"], 404);
        }
        return new StudentResource($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = Students::find($id);
        if (!$data){
            response()->json(['message' => 'Student not found'], 404);
        }
        $data->update($request->all());
        return new StudentResource($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Students::find($id);
        if (!$data){
            response()->json(['message' => 'Student not found'],404);
        }
        $data->delete();
        return response()->json(null, 204);
    }
}
