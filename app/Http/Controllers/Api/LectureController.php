<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLectureRequest;
use Illuminate\Http\Request;
use App\Http\Resources\LectureResource;
use App\Models\Lecture;


class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
        return LectureResource::collection(Lecture::all());
        
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


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        // Get only Lecture fields to create a new lecture model
        $lecture = Lecture::create($request->only([
            'start_time', 'end_time'
        ]));

        // Get comma seperated category ids and create an array with the id's
        $categoriesArray = json_decode($request->get('categories'));

        // Create an empty array
        $categories = [];

        // Create new category for each item and add it to empty array
        foreach ($categoriesArray as $category) {
            $categories[] = Category::create([
                'title' => $category->title
            ]);
        }

        // Attach categories to the lecture and save them
        $lecture->categories()->saveMany($categories);

        // Return response with ArticleResource to deliver relationships
        return response()->json([
            'status' => true,
            'message' => "Lecture Created successfully!",
            'post' => LectureResource::collection(Lecture::find($lecture))
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function show(Lecture $lecture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function edit(lecture $lecture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Lecture $lecture)
    {
        dd($request->all(), $lecture);
        // Get only Lecture fields to create a new lecture model
        $lecture = Lecture::create($request->only([
            'start_time', 'end_time'
        ]));

        // Get comma seperated category ids and create an array with the id's
        $categoriesArray = json_decode($request->get('categories'));

        // Create an empty array
        $categories = [];

        // Create new category for each item and add it to empty array
        foreach ($categoriesArray as $category) {
            $categories[] = Category::create([
                'title' => $category->title
            ]);
        }

        // Attach categories to the lecture and save them
        $lecture->categories()->saveMany($categories);

        // Return response with ArticleResource to deliver relationships
        return response()->json([
            'status' => true,
            'message' => "Lecture Created successfully!",
            'post' => LectureResource::collection(Lecture::find($lecture))
        ], 200);

        $lecture->update($request->all());

        return response()->json([
            'status' => true,
            'message' => "Lecture Updated successfully!",
            'lecture' => $lecture
        ], 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecture $lecture)
    {
        $lecture->delete();

        return response()->json([
            'status' => true,
            'message' => "Lecture Deleted successfully!",
        ], 200);
    }
}
