<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Http\Requests\CreateCourseValidationRequest;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Courses::all();
        return view('index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCourseValidationRequest $request)
    {
        $course = new Courses;
        $course->courseName = $request->input('name');
        $course->status = $request->input('status');
        $course->save();

        return redirect('/courses')->with('success', 'course created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Courses::find($id);
        if(empty($data)){
            return redirect('/courses')->with('error', 'course is not found');
        }
         return view('edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateCourseValidationRequest $request, string $id)
    {
        $data = Courses::find($id);
        if(empty($data)){
            return redirect('/courses')->with('error', 'course is not found');
        }
        $data->courseName = $request->input('name');
        $data->status = $request->input('status');
        $data->save();
        return redirect('/courses')->with('success', 'course updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Courses::find($id);
        if(empty($data)){
            return redirect('/courses')->with('error', 'course is not found');
        }
        $data->delete();
        return redirect('/courses')->with('success', 'course removed');
    }
}
