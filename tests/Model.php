<?php

/*
 * This file is part of Laravel Model Hashids.
 *
 * (c) Javier Cabello <jaacu.97@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jaacu\Tests\LaravelModelHashids;

use Jaacu\LaravelModelHashids\Traits\UsesHashIds;
use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    use UsesHashIds;

    protected $table = 'models';

    public $timestamps = false;
}
