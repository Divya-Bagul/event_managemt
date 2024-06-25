@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 d-flex justify-content-between">
           
            <a href="/admin" class="btn btn-danger m-2" id="btn-add" >Back to dashboard</a>
        </div>
        
        <div class="col-md-12 " id = "adddManager" style="margin: 40px 0px;  ">
           
            <form method="POST" id="formdata" action="{{ route('admin.CreateEventManager') }}" autocomplete="off">
                @csrf
                <div class="form-group my-2">
                    <label >Name</label>
                    <input type="text" name="name" class="form-control" id="managerName"  placeholder="Enter Event Manager Name" value="{{ old('name') }}">
                    @error('name')
                    <strong class="text-danger">{{ $message }} </strong>
                    @enderror
                </div>
                 
                <div class="form-group my-2">
                  <label >Email address</label>
                  <input type="email" name="email" class="form-control" id="managerEmail" placeholder="Enter Event Manager email"  value="{{ old('email') }}">
                  @error('email')
                  <strong class="text-danger">{{ $message }} </strong>
                    @enderror
                    @if(session()->has('error'))
                    <strong class="text-danger">{{ session('error') }} </strong>
                    @endif
                </div>
                <input type="hidden" id="managerId" name ="id" />
               
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
               @if(session()->has('success'))
                    <h2 class="text-success my-2">{{ session('success') }} </h2>
                @endif
                @if(session()->has('error'))
                <h2 class="text-danger my-2">{{ session('error') }} </h2>
            @endif
              <hr>
        </div>

            <div class="col-md-12">
            <table class="table" >
                <tr>
                    <th> Id </th>
                    <th>Event Manager Name</th>
                    <th>Event Manager Email</th>
                    <th>Action</th>
                </tr>
                <tbody>
                    @php $i= 1; @endphp
                @foreach ( $managerList  as $value)
                    <tr>
                        @if(!$value->hasRole('admin'))
                            <td>{{ $i++ }} </td>
                            <td>{{ $value->name }} </td>

                            <td>{{ $value->email }} </td>
                            <td>
                                <button class="btn btn-primary mx-2 edit" id="edit" data-id="{{ $value->id }}" >Edit</button>
                                <button class="btn btn-danger mx-2 remove" id="remove" data-id="{{ $value->id }}">Remove</button>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
               
            </table>

           
        
        </div>

    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    //    $('#adddManager').hide();
    
       $('#btn-add').on("click", function(e){
        $('#adddManager').toggle();

       });

       $('.edit').on("click", function(e){
            var id = $(this).attr('data-id');
            $('#managerName').val('');
                        $('#managerEmail').val('');
                        $('#managerId').val('');
            $.ajax({
                type:'GET',
                url:'/admin/EditEventManger/'+id,
                success:function(result){
                    if(result.response == 'true'){
                        $('#managerName').val(result.name);
                        $('#managerEmail').val(result.email);
                        $('#managerId').val(result.id);
                        $('#formdata').attr('action',"{{ route('admin.UpdateEventManger') }}");


                    }
                }
            });

       });

       $('.remove').on("click", function(e){
            var id = $(this).attr('data-id');
           
            $.ajax({
                type:'GET',
                url:'/admin/DeleteEventManger/'+id,
                success:function(result){
                    if(result.response == 'true'){
                        window.location.reload();

                    }
                }
            });

       });
    });
</script>
@endsection
