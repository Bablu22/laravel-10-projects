<?php

namespace App\Services;

use App\Models\Url;
use App\Models\User;
use App\Notifications\UrlFailedNotification;
use Illuminate\Support\Facades\Http;

class UrlChecker
{
    public function check(Url $url)
    {
        $startTime = microtime(true);

        // use in production environment
        // $response = Http::get($url);

        // use in case of SSL error in development environment
        $response = Http::withOptions(['verify' => false])->get($url->url);
        $totalTime = microtime(true) - $startTime;

        if (!$response->ok() && $url->failed == false) {
            logger($totalTime);
            $this->notifyUser($url);
            $url->failed = true;
            $url->save();

            return false;
        }
        return $response->ok();
    }

    private function notifyUser(Url $url)
    {
        $user = User::find(2);
        $user->notify(new UrlFailedNotification($url));
    }

}