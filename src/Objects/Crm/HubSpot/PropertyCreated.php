<?php

declare(strict_types=1);

namespace Storipress\Revert\Objects\Crm\HubSpot;

use stdClass;
use Storipress\Revert\Objects\RevertObject;

class PropertyCreated extends RevertObject
{
    public string $updatedAt;

    public string $createdAt;

    public string $name;

    public string $label;

    public string $type;

    public string $fieldType;

    public string $description;

    public string $groupName;

    /**
     * @var array<mixed>
     */
    public array $options;

    public string $createdUserId;

    public string $updatedUserId;

    public int $displayOrder;

    public bool $calculated;

    public bool $externalOptions;

    public bool $archived;

    public bool $hasUniqueValue;

    public bool $hidden;

    public stdClass $modificationMetadata;

    public bool $formField;
}
