<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Attendee;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\App;

class eventsController extends Controller
{
    //

    public function ListEvent(){
        
        
        $user = Auth::user();
        if(!$user->hasRole('admin')){
            $eventList = Event::where('event_manager_id','=', $user->id)->get();
        }else
        {
            $eventList = Event::all();
           
        }
        
        return view('admin/eventList',compact('eventList','user'));
    }

    public function CreateEvent(Request $request){
        
        $user = Auth::user();
        $this->validate($request,[
            'title'=>'required',
            'location'=>'required',
            'ticket_price'=>'required',
            'event_type'=>'required',
            'date'=>'required',
            'time'=>'required',

        ]);

       
        try{
           
            $event = Event::create([
                'title'=>trim($request->get('title')),
                'location'=>trim($request->get('location')),
                'ticket_price'=>trim($request->get('ticket_price')),
                'event_type'=>trim($request->get('event_type')),
                'date'=>trim($request->get('date')),
                'time'=>trim($request->get('time')),
                'event_manager_id'=>$user->id,
            ]);
            if(!$user->hasRole('admin')){
                return redirect(route('ListEvent'))->with('success',"Event Created Successfully");

            }else
            {
                return redirect(route('admin.ListEvent'))->with('success',"Event Created Successfully");

            }
           
        }catch(\Exception $e){
           
            if(!$user->hasRole('admin')){
                return redirect(route('ListEvent'))->with('error',"Something went wrong");
            }else
            {
                return redirect(route('admin.ListEvent'))->with('error',"Something went wrong");
            }
            
        }
    }
    public function EditEvent($id){
        $eventList = Event::find($id);
        $isadmin= false;
        if($eventList){
            $user = Auth::user();
            if($user->hasRole('admin')){
                $isadmin= true;
            }
            
            return [
                'response' =>'true',
                'title'=>$eventList->title,
                'location'=>$eventList->location,
                'ticket_price'=>$eventList->ticket_price,
                'event_type'=>$eventList->event_type,
                'date'=>$eventList->date,
                'time'=>$eventList->time,
                'id'=>$eventList->id,
                'admin'=>$isadmin,



            ];
        }else{
           
            return [
                'response'=>"false",
            ];
        }
    }

    public function UpdateEvent(Request $request){
       
        $user = Auth::user();
        $this->validate($request,[
            'title'=>'required|string',
            'location'=>'required|string',
            'ticket_price'=>'required',
            'event_type'=>'required',
            'date'=>'required',
            'time'=>'required',

        ]);

       
        try{
          
            $event = Event::find($request->get('id'));
            $event->title = trim($request->get('title'));
            $event->location =trim($request->get('location'));
            $event->ticket_price =trim($request->get('ticket_price'));
            $event->event_type =trim($request->get('event_type'));

            $event->date =trim($request->get('date'));
            $event->time =trim($request->get('time'));
            $event->event_manager_id = $user->id;
            $event->save();
            
            if(!$user->hasRole('admin')){
                
                return redirect(route('ListEvent'))->with('success',"Event Updated Successfully");

            }else
            {
                return redirect(route('admin.ListEvent'))->with('success',"Event Updated Successfully");

            }
           
        }catch(\Exception $e){
            if(!$user->hasRole('admin')){
                return redirect(route('ListEvent'))->with('error',"Something went wrong");
            }else
            {
                return redirect(route('admin.ListEvent'))->with('error',"Something went wrong");
            }
            
        }
    }

    public function DeleteEvent($id){
        $event = Event::find($id);
        if($event){
            $event->delete();
            return [
                'response'=>"true",
            ];
        }else{
            $event->delete();
            return [
                'response'=>"false",
            ];
        }
       
    }

    public function getDataEvent($lang = NULL) {

       
        if ($lang != NULL){
          
            app()->setLocale($lang);
      
      //Gets the translated message and displays it
    
            
        }else{
            App::setLocale('en');
        }
      
        $eventList = Event::all();
        return view('welcome',compact('eventList'));
    }
    public function EventData($id){
        $eventList = Event::find($id);
        $isadmin= false;
        if($eventList){
           
            
            return [
                'response' =>'true',
                'title'=>$eventList->title,
                'location'=>$eventList->location,
                'ticket_price'=>$eventList->ticket_price,
                'event_type'=>$eventList->event_type,
                'date'=>$eventList->date,
                'time'=>$eventList->time,
                'event_manager_id'=>$eventList->event_manager_id,
               



            ];
        }else{
           
            return [
                'response'=>"false",
            ];
        }
    }

    public function CreateAttendee(Request $request) {
       
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'event'=>'required',
           
        ]);

       
        try{
           
            $Attendee = Attendee::create([
                'name'=>trim($request->get('name')),
                'email'=>trim($request->get('email')),
                'event_id'=>trim($request->get('event')),
                "event_manager_id" =>$request->get('event_manager_id')
               
            ]);
           
                return redirect(route('EventRegister'))->with('success',"Event Register Successfully");

            
           
        }catch(\Exception $e){
          
           
                return redirect(route('EventRegister'))->with('error',"Something went wrong");
            
            
        }
    }

    public function ListAttendee(){
        $user = Auth::user();
        if(!$user->hasRole('admin')){
            $eventList = Attendee::where('event_manager_id','=', $user->id)->get();
        }else
        {
            $eventList = Attendee::all();
           
        }
        
        return view('admin/AtendeeList',compact('eventList','user'));
    }
}
