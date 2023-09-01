<?php

namespace App\Listeners;

use App\Events\ClassCanceled;
use App\Jobs\NotifyClassCanceledJob;
use App\Mail\ClassCanceledMail;
use PhpParser\Node\Expr\Array_;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ClassCanceledNotification;

class NotifyClassCanceled
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ClassCanceled $event): void
    {

        /**use get for notification and remove get for mail */
        $members = $event->scheduleClass->members()->get();
        $className = $event->scheduleClass->classType->name;
        $classDateTime = $event->scheduleClass->date_time;

        $details = compact('className', 'classDateTime');

        // /**send a mail*/
        // $members->each(function ($user) use ($details) {
        //     Mail::to($user)->send(new ClassCanceledMail($details));
        // });

        // /**This below line will moved to
        //  *  [app/Jobs/NotifyClassCanceledJob.php] because of mail can be run on background
        //  */
        //  Notification::send($this->members,new ClassCanceledNotification($this->details));
        NotifyClassCanceledJob::dispatch($members,$details);

    }
}
