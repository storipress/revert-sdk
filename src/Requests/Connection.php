<?php

declare(strict_types=1);

namespace Storipress\Revert\Requests;

use stdClass;
use Storipress\Revert\Objects\Connection as ConnectionObject;

class Connection extends Request
{
    /**
     * Get details of all the connection for a specific account at Revert.
     *
     * @return array<int, ConnectionObject>
     *
     * @link https://docs.revert.dev/api-reference/api-reference/connection/get-all-connections
     */
    public function list(): array
    {
        $data = $this->request(
            'get',
            '/connection/all',
            isArray: true,
        );

        return array_map(
            fn (stdClass $item) => ConnectionObject::from($item),
            $data,
        );
    }

    /**
     * Get details of a connection for a specific tenant.
     *
     * @link https://docs.revert.dev/api-reference/api-reference/connection/get-connection
     */
    public function get(): ConnectionObject
    {
        $data = $this->request(
            'get',
            '/connection',
        );

        return ConnectionObject::from($data);
    }

    /**
     * Delete a connection for a specific tenant.
     *
     * @link https://docs.revert.dev/api-reference/api-reference/connection/delete-connection
     */
    public function delete(): bool
    {
        $data = $this->request(
            'delete',
            '/connection',
        );

        return $data->status === 'ok';
    }
}
