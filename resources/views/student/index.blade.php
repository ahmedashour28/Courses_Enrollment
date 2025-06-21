@extends('main_layout')

@section('title')
students
@endsection

@section('content')

          <div class="col-12" style="padding: 15px">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="text-align: center; float: none">students Info
                    <a class="btn btn-sm btn-info" href="{{route('student.create')}}">Add student</a>
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
                   <input type="text" name="searchByName" id="searchByName" class="form-control float-right" placeholder="Search By Name">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
               @if(@isset($data) and !@empty($data) and @count($data)>0)
              <div class="card-body table-responsive p-0" style="height: 300px;" id="ajax_response_div">

                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Student ID</th>
                      <th>Student image</th>
                      <th>Student Name</th>
                      <th>Student Phone</th>
                      <th>Student Address</th>
                      <th>Status</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $student)
                    <tr>
                      <td>{{$student->id}}</td>
                      <td><img style="width:70px; height:70px" src="{{asset('/storage/images/'.$student->image)}}"></td>
                      <td>{{$student->name}}</td>
                      <td>{{$student->phone}}</td>
                      <td>{{$student->address}}</td>
                      <td>@if($student->status==1) Active @else Banned @endif</td>
                      <td>{{$student->created_at}}</td>
                      <td>{{$student->updated_at}}</td>
                      <td style="width:15%">
                        <a href="{{route('student.edit',$student->id)}}" class="button" style="background-color:#04AA6D; color:white; padding:10px">Edit</a>
                        <a href="{{route('student.destroy',$student->id)}}" class="button" style="background-color:#aa0704; color:white; padding:10px">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @else
                    <p style="text-align: center">There is no students right now!!!!</p>
                @endif
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>


@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $(document).on('input',"#searchByName",function(){
            var name = $(this).val();
            jQuery.ajax({
                url:'{{route('student.ajax_search_student')}}',
                type:'POST',
                dataType:'html',
                cache:false,
                data:{
                    "_token": '{{csrf_token()}}',
                    name:name
                },
                success: function(data) {
                    // Handle success
                    $("#ajax_response_div").html(data);
                },
                error: function(xhr) {
                    // Handle error
                    console.error(xhr);
                }
            });
        })
    })
</script>

@endsection
