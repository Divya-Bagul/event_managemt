<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['title','location','ticket_price','event_type','event_manager_id','date','time'] ;
    public function attendees(){
        return $this->hasmany(Attendee::class);
    }
    public function manager(){
        return $this->belongsTo(User::class,'event_manager_id');
    }
}
