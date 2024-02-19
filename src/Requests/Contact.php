<?php

declare(strict_types=1);

namespace Storipress\Revert\Requests;

use stdClass;
use Storipress\Revert\Objects\Crm\Contact as ContactObject;
use Storipress\Revert\Objects\Crm\HubSpot\ContactUpdated;
use Storipress\Revert\Objects\CursorPagination;

class Contact extends Request
{
    /**
     * Returns information about an authorized user.
     *
     * @param  array{
     *     fields?: string,
     *     pageSize?: string,
     *     cursor?: string,
     * }  $options
     * @return array{
     *     data: array<int,ContactObject>,
     *     pagination: CursorPagination,
     * }
     *
     * @link https://docs.revert.dev/api-reference/api-reference/crm/contact/get-contacts
     */
    public function list(array $options = []): array
    {
        $data = $this->request(
            'get',
            '/crm/contacts',
            $options,
        );

        return [
            'data' => array_map(
                fn (stdClass $item) => ContactObject::from($item),
                $data->results,
            ),
            'pagination' => CursorPagination::from($data),
        ];
    }

    /**
     * Returns information about an authorized user.
     *
     * @param  array{
     *     fields?: string,
     * }  $options
     *
     * @link https://docs.revert.dev/api-reference/api-reference/crm/contact/get-contact
     */
    public function get(string $id, array $options = []): ContactObject
    {
        $data = $this->request(
            'get',
            sprintf('/crm/contacts/%s', $id),
            $options,
        );

        return ContactObject::from($data->result);
    }

    /**
     * @param array{
     *     email?: string,
     *     firstName?: string,
     *     lastName?: string,
     *     phone?: string,
     *     associations?: array{
     *         dealId?: string,
     *         leadId?: string,
     *     },
     *     additional?: array<string, mixed>,
     * } $options
     */
    public function update(string $id, array $options): ContactUpdated
    {
        $data = $this->request(
            'patch',
            sprintf('/crm/contacts/%s', $id),
            $options,
        );

        return ContactUpdated::from($data->result);
    }
}
