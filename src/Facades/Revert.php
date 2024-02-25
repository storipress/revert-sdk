<?php

declare(strict_types=1);

namespace Storipress\Revert\Facades;

use Illuminate\Support\Facades\Facade;
use Storipress\Revert\Requests\Contact;
use Storipress\Revert\Requests\Deal;
use Storipress\Revert\Requests\Property;

/**
 * @method static \Storipress\Revert\Revert instance()
 * @method static string getToken()
 * @method static \Storipress\Revert\Revert setToken()
 * @method static string getCustomerId()
 * @method static \Storipress\Revert\Revert setCustomerId()
 * @method static string getUserAgent()
 * @method static \Storipress\Revert\Revert setUserAgent()
 * @method static Contact contact()
 * @method static Deal deal()
 * @method static Property property()
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
