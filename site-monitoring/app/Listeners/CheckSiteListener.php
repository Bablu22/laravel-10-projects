<?php

namespace App\Listeners;

use App\Events\CheckSite;
use App\Services\UrlChecker;
use Illuminate\Contracts\Queue\ShouldQueue;

class CheckSiteListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct(private UrlChecker $urlChecker)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CheckSite $event): void
    {
        $this->urlChecker->check($event->url);
    }
}