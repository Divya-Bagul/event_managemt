@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Event Manager's dashboard here....{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>

            
        </div>
    </div>

    <div class=" conatiner my-4">
        <div class="row justify-content-center">
           
            <div class="col-md-3">
                <a href="/ListEvent" class="btn btn-danger"> Add Events</a>
            </div>
            <div class="col-md-3">
                <a href="/ListAttendee"  class="btn btn-success"> List Attendees</a>
            </div>
        </div>
    </div>
</div>
@endsection
