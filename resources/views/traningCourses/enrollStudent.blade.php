 @extends('main_layout')

@section('title')
Create Traning Courses
@endsection

@section('content')

 <!-- form start -->
  @if(Session::has('error'))
                    <div class="alert alert-error" role="alert">
                        {{Session::get('error')}}
                    </div>

                @endif
              <form method="POST" action="{{route('traningCourses.AddEnrollStudent',$data->id)}}" >
                @csrf
                <div class="card-body">
                    <div class="form-group">
                    <lable>Student Info</lable>
                        <select name="studentID" id="studentID" class="form-control">
                            <option value="">Choose the Student</option>
                            @if(!@empty($students))
                                @foreach($students as $info)
                                    <option value="{{$info->id}}">{{$info->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('studentID')
                        <span style="color:red;">{{$message}}</span>
                        @enderror
                  </div>




                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add student to training</button>
                </div>
              </form>

@endsection
