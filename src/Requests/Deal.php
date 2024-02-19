<?php

declare(strict_types=1);

namespace Storipress\Revert\Requests;

use stdClass;
use Storipress\Revert\Objects\Crm\Deal as DealObject;
use Storipress\Revert\Objects\CursorPagination;

class Deal extends Request
{
    /**
     * Get all the deals.
     *
     * @param  array{
     *     fields?: string,
     *     pageSize?: string,
     *     cursor?: string,
     * }  $options
     * @return array{
     *     data: array<int,DealObject>,
     *     pagination: CursorPagination,
     * }
     *
     * @link https://docs.revert.dev/api-reference/api-reference/crm/deal/get-deals
     */
    public function list(array $options = []): array
    {
        $data = $this->request(
            'get',
            '/crm/deals',
            $options,
        );

        return [
            'data' => array_map(
                fn (stdClass $item) => DealObject::from($item),
                $data->results,
            ),
            'pagination' => CursorPagination::from($data),
        ];
    }

    /**
     * Get details of a deal.
     *
     * @param  array{
     *     fields?: string,
     * }  $options
     *
     * @link https://docs.revert.dev/api-reference/api-reference/crm/deal/get-deal
     */
    public function get(string $id, array $options = []): DealObject
    {
        $data = $this->request(
            'get',
            sprintf('/crm/deals/%s', $id),
            $options,
        );

        return DealObject::from($data->result);
    }
}
