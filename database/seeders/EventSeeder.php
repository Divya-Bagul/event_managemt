<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $locations = ['New York','England','Chicago','India'];
        $Eventtype = ['seminar','workshop'];

        for($i=1;$i <=5; $i++){
           
            Event::create([
                'title'=> "Event $i",
                'location'=>$locations[array_rand($locations)],
                'ticket_price'=> rand(50,500),
                'event_type'=>$Eventtype[array_rand($Eventtype)],
                'date'=>date('Y-m-d'),
                'time'=>date('H:i'),
                'event_manager_id'=>2
            ]);
        }
    }
}
