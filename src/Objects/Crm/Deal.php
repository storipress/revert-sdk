<?php

declare(strict_types=1);

namespace Storipress\Revert\Objects\Crm;

use stdClass;
use Storipress\Revert\Objects\RevertObject;

class Deal extends RevertObject
{
    public int $amount;

    public ?string $priority = null;

    public string $stage;

    public string $name;

    public string $expectedCloseDate;

    public bool $isWon;

    public float $probability;

    public string $id;

    public string $remoteId;

    public string $updatedTimestamp;

    public stdClass $additional;
}
