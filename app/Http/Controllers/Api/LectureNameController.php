<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LectureName;
use Illuminate\Http\Request;

class LectureNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lectureNames = LectureName::all();

        return response()->json([
            'status' => true,
            'lectureNames' => $lectureNames
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lectureName = LectureName::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "LectureName Created successfully!",
            'lectureName' => $lectureName
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LectureName  $lectureName
     * @return \Illuminate\Http\Response
     */
    public function show(LectureName $lectureName)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LectureName  $lectureName
     * @return \Illuminate\Http\Response
     */
    public function edit(LectureName $lectureName)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LectureName  $lectureName
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LectureName $lectureName)
    {
        $lectureName->update($request->all());

        return response()->json([
            'status' => true,
            'message' => "LectureName Updated successfully!",
            'lectureName' => $lectureName
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LectureName  $lectureName
     * @return \Illuminate\Http\Response
     */
    public function destroy(LectureName $lectureName)
    {
        //
    }
}
