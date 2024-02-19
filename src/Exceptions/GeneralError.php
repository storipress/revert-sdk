<?php

declare(strict_types=1);

namespace Storipress\Revert\Exceptions;

use Storipress\Revert\Objects\Error;
use Throwable;

class GeneralError extends RevertException
{
    public function __construct(
        public Error $error,
        string $message = '',
        int $code = 0,
        ?Throwable $previous = null,
    ) {
        parent::__construct($message, $code, $previous);
    }
}
