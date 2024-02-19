<?php

declare(strict_types=1);

namespace Storipress\Revert\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Storipress\Revert\Revert instance()
 */
class Revert extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'revert';
    }
}
