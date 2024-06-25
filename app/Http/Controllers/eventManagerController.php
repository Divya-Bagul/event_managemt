<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Eventmanager;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;
class eventManagerController extends Controller
{
    //
    public function ListEventManger(){
       
        $managerList = User::all();
        return view('admin/eventManagerList',compact('managerList'));
    }

    public function CreateEventManager(Request $request){
        if($request->get('email')){
            $user = User::where('email',trim($request->get('email')))->first();
            if(isset($user)){
                return redirect(route('admin.ListEventManger'))->with('error',"Event Manager Email Already Exists");
            }
        }

        $this->validate($request,[
            'name'=>'required|string',
            'email'=>'required|string|email|unique:users',
        ]);

       
        try{
            $user = User::create([
                'name'=>trim($request->get('name')),
                'email'=>trim($request->get('email')),
                'password' => Hash::make($request->get('name')), //default password is eventmanagername
            ]);
            $user->assignRole("event manager");
            return redirect(route('admin.ListEventManger'))->with('success',"Event Manager Created Successfully");

        }catch(\Exception $e){
            return redirect(route('admin.ListEventManger'))->with('error',"Something went wrong");
        }
    }
    public function EditEventManger($id){
        $managerList = User::find($id);

        if($managerList){
            return [
                'response' =>'true',
                'name'=>$managerList->name,
                'email'=>$managerList->email,
                'id'=>$managerList->id,


            ];
        }else{
           
            return [
                'response'=>"false",
            ];
        }
    }

    public function UpdateEventManger(Request $request){
       
       
        $this->validate($request,[
            'name'=>'required|string',
            'email'=>'required|string|email',
        ]);

       
        try{
            $user = User::find($request->get('id'));
            $user->name = trim($request->get('name'));
            $user->email =trim($request->get('email'));
            $user->save();
            
          
            return redirect(route('admin.ListEventManger'))->with('success',"Event Manager Updated Successfully");

        }catch(\Exception $e){
            return redirect(route('admin.ListEventManger'))->with('error',"Something went wrong");
        }
    }

    public function DeleteEventManger($id){
        $manager = User::find($id);
        if($manager){
            $manager->delete();
            return [
                'response'=>"true",
            ];
        }else{
            $manager->delete();
            return [
                'response'=>"false",
            ];
        }
       
    }

}
