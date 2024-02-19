<?php

declare(strict_types=1);

namespace Storipress\Revert\Objects\Crm;

use Storipress\Revert\Objects\RevertObject;

class Property extends RevertObject
{
    public string $name;

    public string $type;

    public string $description;
}
