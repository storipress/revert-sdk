<?php

declare(strict_types=1);

namespace Storipress\Revert\Objects;

use stdClass;

class CursorPagination extends RevertObject
{
    public ?string $previous = null;

    public ?string $next = null;

    /**
     * {@inheritdoc}
     */
    public static function from(stdClass $data): static
    {
        $object = new stdClass();

        $object->previous = $data->previous ?? null;

        $object->next = $data->next ?? null;

        return parent::from($object);
    }
}
