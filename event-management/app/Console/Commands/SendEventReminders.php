<?php

namespace App\Console\Commands;

use App\Notifications\EventReminderNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class SendEventReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-event-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send event reminders to all users who have an event in the next 24 hours.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $events = \App\Models\Event::with('attendees.user')
            ->whereBetween('start_time', [now(), now()->addDay()])
            ->get();
        $eventCount = $events->count();
        $eventLabel = Str::plural('event', $eventCount);

        $this->info("Found {$eventCount} {$eventLabel}");

        $events->each(function ($event) {
            $event->attendees->each(function ($attendee) use ($event) {
                $attendee->user->notify(new EventReminderNotification($event));
            });
        });

        $this->info('Reminder notifications sent.');
    }
}
