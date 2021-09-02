<?php

namespace App\Listeners;

use App\Events\ToDoEditEvent;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ToDoEditListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ToDoEditEvent  $event
     * @return void
     */
    public function handle(ToDoEditEvent $event)
    {
        $currentTimestamp = Carbon::now()->toDateTimeString();
        $addTask = DB::table('user_logs')->insert([
                'message'=>$event->userLog->taskName,
                'action'=>'Edited',
                'by'=>Auth::user()->name,
                'created_at'=>$currentTimestamp,
                'updated_at'=>$currentTimestamp
            ]
        );
        return $addTask;
    }
}
