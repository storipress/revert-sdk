<?php

declare(strict_types=1);

namespace Storipress\Revert\Objects;

class Connection extends RevertObject
{
    public string $tp_id;

    public string $tp_access_token;

    public ?string $tp_refresh_token = null;

    public string $tp_customer_id;

    public string $t_id;

    public mixed $app_config = null;
}
