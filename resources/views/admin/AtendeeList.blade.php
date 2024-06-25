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
       
        
      
            <div class="col-md-12">
            <table class="table" >
                <tr>
                    <th> Id </th>
                    <th>Event Created By</th>

                    <th>Event Title</th>
                    <th>Attendee Name</th>
                    <th>Attendee Email</th>
                    
                    
                </tr>
                <tbody>
                    @php $i= 1; @endphp
                @foreach ( $eventList  as $value)
                    <tr>
                           
                            <td>{{ $i++ }} </td>
                            <td>{{ $value->eventManger->name }}</td>
                            <td>{{ $value->event->title }} </td>

                            <td>{{ $value->name }} </td>
                            <td>{{ $value->email }} </td>
                           
                      
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
