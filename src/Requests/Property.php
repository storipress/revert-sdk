<?php

declare(strict_types=1);

namespace Storipress\Revert\Requests;

use stdClass;
use Storipress\Revert\Objects\Crm\HubSpot\PropertyCreated;
use Storipress\Revert\Objects\Crm\Property as PropertyObject;

/**
 * @phpstan-type PropertyType 'company'|'contact'|'deal'|'event'|'lead'|'note'|'task'|'user'
 * @phpstan-type HubSpotProperties array{
 *     label: string,
 *     groupName: string,
 *     fieldType: string,
 * }
 */
class Property extends Request
{
    /**
     * Get object properties for connection.
     *
     * @param  PropertyType  $type
     * @return array<int,PropertyObject>
     *
     * @link https://docs.revert.dev/api-reference/api-reference/crm/properties/get-object-properties
     */
    public function list(string $type): array
    {
        $data = $this->request(
            'get',
            sprintf('/crm/properties/%s', $type),
            isArray: true,
        );

        return array_map(
            fn (stdClass $item) => PropertyObject::from($item),
            $data,
        );
    }

    /**
     * Set custom properties on an object for a given connection.
     *
     * @param  PropertyType  $type
     * @param  array{
     *     name: string,
     *     type: string,
     *     description?: string,
     *     additional?: HubSpotProperties,
     * }  $options
     *
     * @link https://docs.revert.dev/api-reference/api-reference/crm/properties/set-custom-properties
     */
    public function create(string $type, array $options): PropertyCreated
    {
        $data = $this->request(
            'post',
            sprintf('/crm/properties/%s', $type),
            $options,
        );

        return PropertyCreated::from($data->data);
    }
}
