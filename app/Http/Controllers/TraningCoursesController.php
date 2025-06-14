<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TraningCourses;
use App\Http\Requests\CreateTraningCoursesValidationRequest;
use App\Http\Requests\AddStudentToTraining;
use App\Models\Courses;
use App\Models\Enrollment;
use App\Models\Student;




class TraningCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TraningCourses::all();
        if(!empty($data)){
            foreach($data as $info){
                $info->courseName = Courses::where('id','=',$info->courseID)->value('courseName');
            }
        }
        return view('traningCourses.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Courses = Courses::select("id","courseName")->where("status",1)->get();
        return view('traningCourses.create',['Courses' => $Courses]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTraningCoursesValidationRequest $request)
    {
        $traning = new TraningCourses;
        $traning->courseID = $request->input('courseID');
        $traning->price = $request->input('price');
        $traning->startDate = $request->input('startDate');
        $traning->endDate = $request->input('endDate');
        $traning->notes = $request->input('notes');
        $traning->save();

        return redirect('/traningCourses')->with('success', 'traning Course created');
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
        $data = TraningCourses::find($id);
        if(empty($data)){
            return redirect('/traningCourses')->with('error', 'traning Course is not found');
        }
        $Courses = Courses::select("id","courseName")->where("status",1)->get();
         return view('traningCourses.edit',['Courses' => $Courses])->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateTraningCoursesValidationRequest $request, string $id)
    {
        $traning = TraningCourses::find($id);
        if(empty($traning)){
            return redirect('/traningCourses')->with('error', 'traning Course is not found');
        }
        $traning->courseID = $request->input('courseID');
        $traning->price = $request->input('price');
        $traning->startDate = $request->input('startDate');
        $traning->endDate = $request->input('endDate');
        $traning->notes = $request->input('notes');
        $traning->save();
        return redirect('/traningCourses')->with('success', 'traning Course updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $traning = TraningCourses::find($id);
        if(empty($traning)){
            return redirect('/traningCourses')->with('error', 'traning Course is not found');
        }
        $traning->delete();
        return redirect('/traningCourses')->with('success', 'traning Course removed');
    }

    public function details(string $id)
    {
        $data = TraningCourses::find($id);
        if(empty($data)){
            return redirect('/traningCourses')->with('error', 'traning Course is not found');
        }
        $data->courseName = Courses::where('id','=',$data->courseID)->value('courseName');
        $data->studentsCounter = Enrollment::where('trainingID','=',$id)->count();
        $enrollments = Enrollment::select("*")->where('trainingID','=',$id)->get();
        if(!empty($enrollments)){
            foreach($enrollments as $info){
                $info->studentName = Student::where('id','=',$info->studentID)->value('name');
            }
        }
        return view('traningCourses.details')->with(['data'=>$data, 'enrollments'=>$enrollments]);
    }

    public function enrollStudent(string $id)
    {
        $data = TraningCourses::find($id);
        if(empty($data)){
            return redirect('/traningCourses')->with('error', 'traning Course is not found');
        }
        $students = Student::select("id","name")->where("status",1)->get();
        return view('traningCourses.enrollStudent')->with(['data'=>$data, 'students'=>$students]);
    }

    public function AddEnrollStudent(AddStudentToTraining $request, $id)
    {
        $data = TraningCourses::find($id);
        if(empty($data)){
            return redirect('/traningCourses')->with('error', 'traning Course is not found');
        }
        $studentCounter = Enrollment::where('trainingID','=',$id)->where('studentID','=',$request->studentID)->count();
        if($studentCounter>0){
            return redirect()->route('traningCourses.details',$id)->with('error', 'this student has been added once before');
        }

        $enroll = new Enrollment;
        $enroll->trainingID = $id;
        $enroll->studentID = $request->input('studentID');
        $enroll->save();
        return redirect()->route('traningCourses.details',$id)->with('success', 'the student has been added');

    }

    public function deleteEnrollStudent(string $id)
    {
        $data = Enrollment::find($id);
        if(empty($data)){
            return redirect('/traningCourses')->with('error', 'traning Course is not found');
        }
        $data->delete();
       return redirect()->route('traningCourses.details',$id)->with('success', 'the student has been removed');
    }

}
