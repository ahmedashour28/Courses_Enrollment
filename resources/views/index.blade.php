@extends('main_layout')

@section('title')
Courses
@endsection

@section('content')

          <div class="col-12" style="padding: 15px">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="text-align: center; float: none">Courses Info
                    <a class="btn btn-sm btn-info" href="{{route('courses.create')}}">Create Course</a>
                </h3>
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>

                @endif
                @if(Session::has('error'))
                    <div class="alert alert-error" role="alert">
                        {{Session::get('error')}}
                    </div>

                @endif

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
               @if(@isset($data) and !@empty($data) and @count($data)>0)
              <div class="card-body table-responsive p-0" style="height: 300px;">

                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Course Name</th>
                      <th>Status</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $course)
                    <tr>
                      <td>{{$course->id}}</td>
                      <td>{{$course->courseName}}</td>
                      <td>@if($course->status==1) Active @else NOT Active @endif</td>
                      <td>{{$course->created_at}}</td>
                      <td>{{$course->updated_at}}</td>
                      <td>
                        <a href="{{route('courses.edit',$course->id)}}" class="button" style="background-color:#04AA6D; color:white; padding:10px">Edit</a>
                        <a href="{{route('courses.destroy',$course->id)}}" class="button" style="background-color:#aa0704; color:white; padding:10px">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @else
                    <p style="text-align: center">There is no courses right now!!!!</p>
                @endif
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>


@endsection
