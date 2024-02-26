<?php

declare(strict_types=1);

namespace Storipress\Revert\Requests;

use stdClass;
use Storipress\Revert\Objects\Crm\Deal as DealObject;
use Storipress\Revert\Objects\CursorPagination;

class Connection extends Request
{
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
