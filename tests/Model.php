<?php

namespace Jaacu\Tests\LaravelModelHashids;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Jaacu\LaravelModelHashids\Traits\UsesHashIds;

use Jaacu\LaravelModelHashids\LaravelModelHashidsServiceProvider;
class Model extends BaseModel
{
    use UsesHashIds;

    protected $table = 'models';

    public $timestamps = false;

}