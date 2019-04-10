<?php
namespace Jaacu\LaravelModelHashids\Traits;

use ReflectionClass;
use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

trait UsesHashIds 
{

    public static function bootUsesHashIds()
    {
        static::creating(function (Model $model) {

            $model->fillable( array_merge( $model->fillable, ['hash_id']) );

        });

        static::created(function (Model $model) {

            $app_name = config('app.short_name') ?? str_limit( config('app.name'), 5, '' );
            $model->update([
               'hash_id' => $app_name . '_' . $model->getHashShortName() . '_' . Hashids::encode($model->id),
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
        return strtolower( str_limit( (new ReflectionClass($this) )->getShortName(),4, '') );
    }
}