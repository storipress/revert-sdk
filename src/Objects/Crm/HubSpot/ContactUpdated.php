<?php

declare(strict_types=1);

namespace Storipress\Revert\Objects\Crm\HubSpot;

use stdClass;
use Storipress\Revert\Objects\RevertObject;

class ContactUpdated extends RevertObject
{
    public stdClass $properties;
}
