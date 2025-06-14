@extends('main_layout')

@section('title')
Enrollments
@endsection

@section('content')

          <div class="col-12" style="padding: 15px">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="text-align: center; float: none">Training Course and enrollments Info

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
               @if(@isset($data) and !@empty($data) )
              <div class="card-body table-responsive p-0" style="height: 500px;">

                <table id="example2" class="table table-bordered table-hover">

                    <tr>
                      <td>Course Name</td>
                      <td>{{$data->courseName}}</td>
                    </tr>

                    <tr>
                      <td>Course Price</td>
                      <td>{{$data->price}}</td>
                    </tr>

                    <tr>
                      <td>Course start date</td>
                      <td>{{$data->startDate}}</td>
                    </tr>

                    <tr>
                      <td>Course end date</td>
                      <td>{{$data->endDate}}</td>
                    </tr>

                    <tr>
                      <td>Notes</td>
                      <td>{{$data->notes}}</td>
                    </tr>

                    <tr>
                      <td>students Count</td>
                      <td>{{$data->studentsCounter}}</td>
                    </tr>

                    <tr>

                      <td><a href="{{route('traningCourses.enrollStudent',$data->id)}}" class="button" style="background-color:#04AA6D; color:white; padding:10px">Add Student</a></td>
                    </tr>


                </table>
                @else
                    <p style="text-align: center">There is no Training Courses right now!!!!</p>
                @endif


                @if(@isset($enrollments) and !@empty($enrollments) and @count($enrollments)>0)
              <div class="card-body table-responsive p-0" style="height: 300px;">

                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>student Name</th>
                      <th>Enrollment Date</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($enrollments as $info)
                    <tr>
                      <td>{{$info->studentName}}</td>
                      <td>{{$info->created_at}}</td>
                      <td style="width:15%">
                        <a href="{{route('traningCourses.deleteEnrollStudent',$info->id)}}" class="button" style="background-color:#aa0704; color:white; padding:10px">Delete</a><br><br>

                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @else
                    <p style="text-align: center">There is no students in this Training Course right now!!!!</p>
                @endif

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>


@endsection
