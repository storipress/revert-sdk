<?php

declare(strict_types=1);

namespace Storipress\Revert\Requests;

use stdClass;
use Storipress\Revert\Objects\Crm\Deal as DealObject;
use Storipress\Revert\Objects\CursorPagination;

/**
 * @phpstan-type HubSpotDealSearch array{
 *     filterGroups: array<int, array{
 *         filters: array<int, array{
 *             propertyName: string,
 *             operator: 'EQ'|'NEQ'|'LT'|'LTE'|'GT'|'GTE'|'BETWEEN'|'IN'|'NOT_IN'|'HAS_PROPERTY'|'NOT_HAS_PROPERTY'|'CONTAINS_TOKEN'|'NOT_CONTAINS_TOKEN',
 *             value?: string,
 *             values?: array<int, string>,
 *         }>,
 *     }>,
 * }
 */
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

    /**
     * Search for deals.
     *
     * @param  array{
     *     fields?: string,
     *     searchCriteria: HubSpotDealSearch,
     * }  $options
     * @return array<int,DealObject>
     *
     * @link https://docs.revert.dev/api-reference/api-reference/crm/deal/search-deals
     */
    public function search(array $options): array
    {
        $data = $this->request(
            'post',
            '/crm/deals/search',
            $options,
        );

        return array_map(
            fn (stdClass $item) => DealObject::from($item),
            $data->results,
        );
    }
}
