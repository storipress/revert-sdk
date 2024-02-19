<?php

declare(strict_types=1);

namespace Storipress\Revert\Objects\Crm;

use stdClass;
use Storipress\Revert\Objects\RevertObject;

class Contact extends RevertObject
{
    public string $firstName;

    public string $lastName;

    public string $email;

    public ?string $phone = null;

    public string $id;

    public string $remoteId;

    public stdClass $additional;
}
