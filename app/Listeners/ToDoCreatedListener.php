<?php

namespace App\Listeners;

use App\Events\ToDoCreatedEvent;
use App\Models\UserLog;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function Symfony\Component\String\s;

class ToDoCreatedListener
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
     * @param  ToDoCreatedEvent  $event
     * @return void
     */
    public function handle(ToDoCreatedEvent $event)
    {
        $currentTimestamp = Carbon::now()->toDateTimeString();
        $addTask = DB::table('user_logs')->insert([
                'message'=>$event->userLog->taskName,
                'action'=>'Added',
                'by'=>Auth::user()->name,
                'created_at'=>$currentTimestamp,
                'updated_at'=>$currentTimestamp
        ]
        );
        return $addTask;
    }
}
