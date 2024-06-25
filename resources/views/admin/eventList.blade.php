@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 d-flex justify-content-between ">
            
            @php $user = Auth::user(); @endphp
            @if($user->hasRole('admin'))
            <a href="/admin" class="btn btn-danger m-2" id="btn-add" >Back to dashboard</a>
            @else
            <a href="/manager" class="btn btn-danger m-2" id="btn-add" >Back to dashboard</a>

            @endif
        </div>
       
        
        <div class="col-md-12 " id = "adddEvent" style="margin: 40px 0px;  ">
            @if(!$user->hasRole('admin'))
            <form method="POST" id="formdata" action="{{ route('CreateEvent') }}" autocomplete="off">
            @else
            <form method="POST" id="formdata" action="{{ route('admin.CreateEvent') }}" autocomplete="off">
            @endif  
                @csrf
                <div class="form-group my-2">
                    <label >Event Title</label>
                    <input type="text" name="title" class="form-control" id="title"  placeholder="Enter Event Title" value="{{ old('title') }}">
                    @error('title')
                    <strong class="text-danger">{{ $message }} </strong>
                    @enderror
                </div>
                 
                <div class="form-group my-2">
                  <label >Event Location</label>
                  <input type="text" name="location" class="form-control" id="location" placeholder="Enter Event  Location"  value="{{ old('location') }}">
                  @error('location')
                  <strong class="text-danger">{{ $message }} </strong>
                    @enderror
                   
                </div>
                <div class="form-group my-2">
                    <label >Event Type</label>
                    <input type="text" name="event_type" class="form-control" id="event_type" placeholder="Enter Event  Type"  value="{{ old('type') }}">
                    @error('event_type')
                    <strong class="text-danger">{{ $message }} </strong>
                      @enderror
                  </div>

                  <div class="form-group my-2">
                    <label >Event Ticket Price</label>
                    <input type="text" name="ticket_price" class="form-control" id="ticket_price" placeholder="Enter Event  Ticket Price"  value="{{ old('ticket_price') }}">
                    @error('ticket_price')
                    <strong class="text-danger">{{ $message }} </strong>
                      @enderror
                  </div>

                  <div class="form-group my-2">
                    <label >Event Date</label>
                    <input type="date" name="date" class="form-control" id="date" placeholder="Enter Event  Date"  value="{{ old('date') }}">
                    @error('date')
                    <strong class="text-danger">{{ $message }} </strong>
                      @enderror
                  </div>

                  <div class="form-group my-2">
                    <label >Event Time</label>
                    <input type="time" name="time" class="form-control" id="time" placeholder="Enter Event  Time"  value="{{ old('time') }}">
                    @error('time')
                    <strong class="text-danger">{{ $message }} </strong>
                      @enderror
                  </div>
                <input type="hidden" id="eventId" name ="id" />
               
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
                    <th>Event Created By</th>

                    <th>Event Title</th>
                    <th>Event Location</th>
                    <th>Event Ticket Price</th>
                    <th>Event Date</th>
                    <th>Event Time</th>
                    <th>Action</th>
                </tr>
                <tbody>
                    @php $i= 1; @endphp
                @foreach ( $eventList  as $value)
                    <tr>
                           
                            <td>{{ $i++ }} </td>
                            <td>{{ $value->manager->name }}</td>
                            <td>{{ $value->title }} </td>

                            <td>{{ $value->location }} </td>
                            <td>{{ $value->ticket_price }} </td>
                             <td>{{ $value->date }} </td>
                              <td>{{ $value->time }} </td>
                            <td>
                                @if(!$user->hasRole('admin'))
                                    <button class="btn btn-primary mx-2 edit" id="edit" data-id="{{ $value->id }}" data-url = "{{ route('EditEvent',$value->id) }}">Edit</button>
                                    <button class="btn btn-danger mx-2 remove" id="remove" data-id="{{ $value->id }}" data-url = "{{ route('DeleteEvent',$value->id) }}">Remove</button>
                                @else
                                    <button class="btn btn-primary mx-2 edit" id="edit" data-id="{{ $value->id }}" data-url = "{{ route('admin.EditEvent',$value->id) }}">Edit</button>
                                    <button class="btn btn-danger mx-2 remove" id="remove" data-id="{{ $value->id }}" data-url = "{{ route('admin.DeleteEvent',$value->id) }}">Remove</button>
                                @endif
                            </td>
                      
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
            $('#title').val('');
                        $('#location').val('');
                        $('#ticket_price').val('');
                        $('#event_type').val('');
                        $('#date').val('');
                        $('#time').val('');
                        $('#eventId').val('');




            $.ajax({
                type:'GET',
                url:$(this).attr('data-url'), //'/admin/EditEvent/'+id,
                success:function(result){
                    if(result.response == 'true'){
                        $('#title').val(result.title);
                        $('#location').val(result.location);
                        $('#ticket_price').val(result.ticket_price);
                        $('#event_type').val(result.event_type);
                        $('#date').val(result.date);
                        $('#time').val(result.time);
                        $('#eventId').val(result.id);
                        if(result.admin == true){
                            $('#formdata').attr('action',"{{ route('admin.UpdateEvent') }}");
                        }else{
                            $('#formdata').attr('action',"{{ route('UpdateEvent') }}");
                        }
                       


                    }
                }
            });

       });

       $('.remove').on("click", function(e){
            var id = $(this).attr('data-id');
           
            $.ajax({
                type:'GET',
                url:$(this).attr('data-url'), //'/admin/DeleteEvent/'+id,
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
