<?php

/*
 * This file is part of Laravel Model Hashids.
 *
 * (c) Javier Cabello <jaacu.97@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jaacu\LaravelModelHashids\Traits;

use Illuminate\Database\Eloquent\Model;
use ReflectionClass;
use Vinkla\Hashids\Facades\Hashids;

trait UsesHashIds
{
    public static function bootUsesHashIds()
    {
        static::creating(function (Model $model) {
            $model->fillable(array_merge($model->fillable, ['hash_id']));
        });

        static::created(function (Model $model) {
            $app_name = config('app.short_name') ?? str_limit(config('app.name'), 5, '');
            $model->update([
               'hash_id' => strtolower($app_name).'_'.strtolower($model->getHashShortName()).'_'.Hashids::encode($model->id),
            ]);
        });
    }

    public function getRouteKeyName()
    {
        return 'hash_id';
    }

    public function getId()
    {
        return $this->hash_id;
    }

    public function getHashShortName()
    {
        return strtolower(str_limit((new ReflectionClass($this) )->getShortName(), 4, ''));
    }
}
