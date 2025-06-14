@extends('main_layout')

@section('title')
Training Courses
@endsection

@section('content')

          <div class="col-12" style="padding: 15px">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="text-align: center; float: none">Training Courses Info
                    <a class="btn btn-sm btn-info" href="{{route('traningCourses.create')}}">Create Training Courses</a>
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
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

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
                      <th>Training Courses ID</th>
                      <th>Course Name</th>
                      <th>Training Courses Price</th>
                      <th>Training Courses start date</th>
                      <th>Training Courses end date</th>
                      <th>Notes</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $traning)
                    <tr>
                      <td>{{$traning->id}}</td>
                      <td>{{$traning->courseName}}</td>
                      <td>{{$traning->price*1}}</td>
                      <td>{{$traning->startDate}}</td>
                      <td>{{$traning->endDate}}</td>
                      <td>{{$traning->notes}}</td>
                      <td>{{$traning->created_at}}</td>
                      <td>{{$traning->updated_at}}</td>
                      <td style="width:15%">
                        <a href="{{route('traningCourses.edit',$traning->id)}}" class="button" style="background-color:#04AA6D; color:white; padding:10px">Edit</a>
                        <a href="{{route('traningCourses.destroy',$traning->id)}}" class="button" style="background-color:#aa0704; color:white; padding:10px">Delete</a><br><br>
                         <a href="{{route('traningCourses.details',$traning->id)}}" class="button" style="background-color:#2149e6; color:white; padding:10px">Enrollments</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @else
                    <p style="text-align: center">There is no Training Courses right now!!!!</p>
                @endif
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>


@endsection
