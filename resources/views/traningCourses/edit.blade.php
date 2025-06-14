 @extends('main_layout')

@section('title')
Edit Traning Course
@endsection

@section('content')

 <!-- form start -->
  @if(Session::has('error'))
                    <div class="alert alert-error" role="alert">
                        {{Session::get('error')}}
                    </div>

                @endif
              <form method="POST" action="{{route('traningCourses.update',$data->id)}}" >
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                    <lable>Course Name</lable>
                        <select name="courseID" id="courseID" class="form-control">
                            <option value="">Choose the Course</option>
                            @if(!@empty($Courses))
                                @foreach($Courses as $info)
                                    <option value="{{$info->id}}">{{$info->courseName}}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('courseID')
                        <span style="color:red;">{{$message}}</span>
                        @enderror
                  </div>
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input autofocus type="text" name="price" oninput="this.value=this.value.replace(/[^0-9.]/g,'');" class="form-control" id="price" value="{{old('price',$data->price*1)}}">
                    @error('price')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="startDate">Start Date</label>
                    <input autofocus type="date" name="startDate" class="form-control" id="startDate" value="{{old('startDate',$data->startDate)}}">
                    @error('startDate')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="endDate">End Date</label>
                    <input autofocus type="date" name="endDate" class="form-control" id="endDate" value="{{old('endDate',$data->endDate)}}">
                    @error('endDate')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="notes">Notes</label>
                    <input autofocus type="text" name="notes"  class="form-control" id="notes" value="{{old('notes',$data->notes)}}">

                  </div>



                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">update</button>
                </div>
              </form>

@endsection
