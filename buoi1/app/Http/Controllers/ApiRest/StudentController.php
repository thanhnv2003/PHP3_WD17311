<?php

namespace App\Http\Controllers\ApiRest;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Models\tests;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = tests::all();
        //trả về toàn bộ
        //1 dạng list collection
        return StudentResource::collection($students);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $students = tests::create($request->all());
        //trả về 1 object
        return new StudentResource($students);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $student = tests::find($id);
        if (!$student){
            return response()->json(['message' => 'Student not found'], 404);
        }
        return new StudentResource($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $student = tests::find($id);
        if (!$student){
            return response()->json(['message' => 'Student not found'], 404);
        }
        $student->update($request->all());
        return new StudentResource($student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $student = tests::find($id);
        if (!$student){
            return response()->json(['message' => 'Student not found'], 404);
        }
        $student->delete();
        return response()->json(null,204);
    }
}
