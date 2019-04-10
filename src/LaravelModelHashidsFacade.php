<?php

namespace Jaacu\LaravelModelHashids;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Jaacu\LaravelModelHashids\Skeleton\SkeletonClass
 */
class LaravelModelHashidsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-model-hashids';
    }
}
