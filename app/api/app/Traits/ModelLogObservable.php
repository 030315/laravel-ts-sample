<?php
namespace App\Traits;

use App\Observers\ModelLogObserver;

trait ModelLogObservable
{
    public static function bootModelLogObservable()
    {
        self::observe(ModelLogObserver::class);
    }
}
