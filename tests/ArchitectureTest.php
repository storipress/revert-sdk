<?php

declare(strict_types=1);

namespace Tests;

use Storipress\Revert\Exceptions\RevertException;
use Storipress\Revert\Objects\RevertObject;
use Storipress\Revert\Requests\Request;

test('There are no debugging statements remaining in our code.')
    ->expect(['dd', 'dump', 'ray', 'var_dump', 'echo'])
    ->not
    ->toBeUsed();

test('Strict typing must be enforced in the code.')
    ->expect('Storipress\Revert')
    ->toUseStrictTypes();

test('The code should not utilize the "final" keyword.')
    ->expect('Storipress\Revert')
    ->not()
    ->toBeFinal();

test('All Request classes should extend "Request".')
    ->expect('Storipress\Revert\Requests')
    ->classes()
    ->toExtend(Request::class);

test('All Object classes should extend "RevertObject".')
    ->expect('Storipress\Revert\Objects')
    ->classes()
    ->toExtend(RevertObject::class);

test('All Exception classes should extend "Exception".')
    ->expect('Storipress\Revert\Exceptions')
    ->classes()
    ->toExtend(RevertException::class);
