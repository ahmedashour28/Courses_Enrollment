<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\CreateStudentValidationRequest;
use Illuminate\Support\Facades\Storage;



class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Student::all();
        return view('student.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateStudentValidationRequest $request)
    {


        // handle the file upload
        if($request->hasFile('image')){
            // get file with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            // get the file name alone
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get the extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // make the file name to store
            $fileNameToStore = $fileName .'_'.time().'.'.$extension;
            // upload image
            //$path = $request->file('image')->storeAs('public/images', $fileNameToStore);
            Storage::disk('public')->putFileAs('images', $request->file('image'), $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $student = new Student;
        $student->name = $request->input('name');
        $student->phone = $request->input('phone');
        $student->address = $request->input('address');
        $student->status = $request->input('status');
        $student->image = $fileNameToStore;
        $student->save();

        return redirect('/student')->with('success', 'student created');
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
        $data = Student::find($id);
        if(empty($data)){
            return redirect('/student')->with('error', 'student is not found');
        }
         return view('student.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateStudentValidationRequest $request, string $id)
    {
        $student = Student::find($id);
        if(empty($student)){
            return redirect('/student')->with('error', 'student is not found');
        }


        // handle the file upload
        if($request->hasFile('image')){
            // get file with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            // get the file name alone
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get the extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // make the file name to store
            $fileNameToStore = $fileName .'_'.time().'.'.$extension;
            // upload image
            //$path = $request->file('image')->storeAs('public/images', $fileNameToStore);
            Storage::disk('public')->putFileAs('images', $request->file('image'), $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }


        $student->name = $request->input('name');
        $student->phone = $request->input('phone');
        $student->address = $request->input('address');
        $student->status = $request->input('status');
        if($request->hasFile('image')){
            $student->image = $fileNameToStore;
        }
        $student->save();

        return redirect('/student')->with('success', 'student updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $student = Student::find($id);
        if(empty($student)){
            return redirect('/student')->with('error', 'student is not found');
        }
        $student->delete();
        return redirect('/student')->with('success', 'student removed');
    }


    public function ajax_search_student(Request $request){
        if($request->ajax()){
            $name = $request->name;
            $data = Student:: where('name', 'like', "%{$name}%")->get();
            return view('student.ajax_search_student')->with('data',$data);
        };

    }
}
