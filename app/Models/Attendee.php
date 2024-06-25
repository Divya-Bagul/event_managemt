<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','event_id',"event_manager_id"] ;
    public function event(){
        return $this->belongsTo(Event::class);
    }
    public function eventManger(){
        return $this->belongsTo(User::class,'event_manager_id');
    }
}
