<?php

namespace App\Providers;

use App\Events\ToDoCompletedEvent;
use App\Events\ToDoCreatedEvent;
use App\Events\ToDoDeletedEvent;
use App\Events\ToDoEditEvent;
use App\Listeners\ToDoCompletedListener;
use App\Listeners\ToDoCreatedListener;
use App\Listeners\ToDoDeletedListener;
use App\Listeners\ToDoEditListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        ToDoCreatedEvent::class => [
            ToDoCreatedListener::class,
        ],

        ToDoDeletedEvent::class=> [
            ToDoDeletedListener::class,
        ],

        ToDoEditEvent::class=> [
            ToDoEditListener::class,
        ],

        ToDoCompletedEvent::class=> [
            ToDoCompletedListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
