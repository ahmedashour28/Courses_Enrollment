 @extends('main_layout')

@section('title')
Edit Course
@endsection

@section('content')

 <!-- form start -->
  @if(Session::has('error'))
                    <div class="alert alert-error" role="alert">
                        {{Session::get('error')}}
                    </div>

                @endif
              <form method="POST" action="{{route('courses.update',$data->id)}}" >
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Course name</label>
                    <input autofocus type="text" name="name" class="form-control" id="name" value="{{old('name',$data->courseName)}}">
                    @error('name')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <lable>Status</lable>
                        <select name="status" id="status" class="form-control">
                            <option value="">Choose the status</option>
                            <option value="1">Active</option>
                            <option value="0">NOT Active</option>
                        </select>
                        @error('status')
                        <span style="color:red;">{{$message}}</span>
                        @enderror
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>

@endsection
