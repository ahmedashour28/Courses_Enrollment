 @extends('main_layout')

@section('title')
Edit Student
@endsection

@section('content')

 <!-- form start -->
  @if(Session::has('error'))
                    <div class="alert alert-error" role="alert">
                        {{Session::get('error')}}
                    </div>

                @endif
              <form method="POST" action="{{route('student.update',$data->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Student name</label>
                    <input autofocus type="text" name="name" class="form-control" id="name" value="{{old('name',$data->name)}}">
                    @error('name')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="phone">Student phone</label>
                    <input autofocus type="text" name="phone" class="form-control" id="phone" value="{{old('phone',$data->phone)}}">
                    @error('phone')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="address">Student Address</label>
                    <input autofocus type="text" name="address" class="form-control" id="address" value="{{old('address',$data->address)}}">
                    @error('address')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <lable>Status</lable>
                        <select name="status" id="status" class="form-control">
                            <option value="">Choose the status</option>
                            <option value="1">Active</option>
                            <option value="0">Banned</option>
                        </select>
                        @error('status')
                        <span style="color:red;">{{$message}}</span>
                        @enderror
                  </div>
                  <div class="form-group">
                    <img style="width:70px; height:70px" src="{{asset('/storage/images/'.$data->image)}}">
                    <label for="image">Upload File:</label>
                    <input type="file" name="image" class="form-group" id="image">
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">update</button>
                </div>
              </form>

@endsection
