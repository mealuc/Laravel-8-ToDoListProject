<?php

namespace App\Listeners;

use App\Events\ToDoDeletedEvent;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ToDoDeletedListener
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
     * @param  ToDoDeletedEvent  $event
     * @return void
     */
    public function handle(ToDoDeletedEvent $event)
    {
        $currentTimestamp = Carbon::now()->toDateTimeString();
        $addTask = DB::table('user_logs')->insert([
                'message'=>$event->userLog->taskName,
                'action'=>'Deleted',
                'by'=>Auth::user()->name,
                'created_at'=>$currentTimestamp,
                'updated_at'=>$currentTimestamp
            ]
        );
        return $addTask;
    }
}
