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

use PHPUnit\Framework\TestCase;
use GrahamCampbell\Analyzer\AnalysisTrait;

class AnalysisTest extends TestCase
{
    use AnalysisTrait;

    /**
     * Get the code paths to analyze.
     *
     * @return string[]
     */
    protected function getPaths()
    {
        return [
            realpath(__DIR__.'/../config'),
            realpath(__DIR__.'/../src'),
            realpath(__DIR__),
        ];
    }
}
