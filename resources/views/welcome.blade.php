<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

           
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 d-flex justify-content-between">
                        <div class="col-md-12 " id = "adddEvent" style="margin: 40px 0px;  ">
               
                            <h2> Event Attendee form</h2>
                <form method="POST" id="formdata" action="{{ route('CreateAttendee') }}" autocomplete="off">
               
                    @csrf
                    <div class="form-group my-2">
                        <label >Name</label>
                        <input type="text" name="name" class="form-control" id="name"  placeholder="Enter  Name" value="{{ old('title') }}">
                        @error('name')
                        <strong class="text-danger">{{ $message }} </strong>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label >Email address</label>
                        <input type="email" name="email" class="form-control" id="Email" placeholder="Enter  email"  value="{{ old('email') }}">
                        @error('email')
                        <strong class="text-danger">{{ $message }} </strong>
                          @enderror
                          @if(session()->has('error'))
                          <strong class="text-danger">{{ session('error') }} </strong>
                          @endif
                      </div>
                    <div class="form-group my-2">
                        <label >Event</label>
                        <br>
                        <select name="event" id ="eventSelect" class="form-select">
                            <option value="">Select Event</option>
                            @foreach ( $eventList as $value )
                                    <option value="{{ $value->id }}" data-url="{{ route('EventData',$value->id) }}"><b>Event Title :</b> {{ $value->title }} </option>
                            @endforeach
                        </select>
                        @error('name')
                        <strong class="text-danger">{{ $message }} </strong>
                        @enderror
                    </div>
                <div class="eventData">
                    <div class="form-group my-2 " >
                        <label >Event Location</label>
                        <input type="text" readonly name="location" class="form-control" id="location"  placeholder="Enter  Name" value="{{ old('title') }}">
                        @error('name')
                        <strong class="text-danger">{{ $message }} </strong>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label >Event Type</label>
                        <input type="text" readonly name="event_type" class="form-control" id="event_type" placeholder="Enter Event  Type"  value="{{ old('type') }}">
                        @error('event_type')
                        <strong class="text-danger">{{ $message }} </strong>
                          @enderror
                    </div>
    
                    <div class="form-group my-2">
                        <label >Event Ticket Price</label>
                        <input type="text"  readonly name="ticket_price" class="form-control" id="ticket_price" placeholder="Enter Event  Ticket Price"  value="{{ old('ticket_price') }}">
                        @error('ticket_price')
                        <strong class="text-danger">{{ $message }} </strong>
                          @enderror
                    </div>
    
                    <div class="form-group my-2">
                        <label >Event Date</label>
                        <input type="date"  readonly name="date" class="form-control" id="date" placeholder="Enter Event  Date"  value="{{ old('date') }}">
                        @error('date')
                        <strong class="text-danger">{{ $message }} </strong>
                          @enderror
                    </div>
    
                    <div class="form-group my-2">
                        <label >Event Time</label>
                        <input type="time" readonly name="time" class="form-control" id="time" placeholder="Enter Event  Time"  value="{{ old('time') }}">
                        @error('time')
                        <strong class="text-danger">{{ $message }} </strong>
                          @enderror
                    </div>
                </div>
                    
                    
                    
            
                      
            
                      
            
                      
                    <input type="hidden" id="event_manager_id" name ="event_manager_id" />
                   
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
                    </div></div></div></div>
        </div>
    </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    //    $('#adddManager').hide();
    
    $('.eventData').addClass('d-none');

       $('#eventSelect').on("change", function(e){
           var selct = $(this).find(':selected');
           var value = selct.val();
            var eventId = $(this).val();
            $('#title').val('');
            $('#location').val('');
            $('#ticket_price').val('');
            $('#event_type').val('');
            $('#date').val('');
            $('#time').val('');
            
            $.ajax({
                type:'GET',
                url: selct.attr('data-url'), //'/admin/EditEvent/'+id,
                success:function(result){
                    if(result.response == 'true'){
                        $('#title').val(result.title);
                        $('#location').val(result.location);
                        $('#ticket_price').val(result.ticket_price);
                        $('#event_type').val(result.event_type);
                        $('#date').val(result.date);
                        $('#time').val(result.time);
                        $('#event_manager_id').val(result.event_manager_id);
                        $('.eventData').removeClass('d-none');
                    }
                }
            });

       });

    
    });
</script>