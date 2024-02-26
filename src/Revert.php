<?php

declare(strict_types=1);

namespace Storipress\Revert;

use Illuminate\Http\Client\Factory;
use Storipress\Revert\Requests\Connection;
use Storipress\Revert\Requests\Contact;
use Storipress\Revert\Requests\Deal;
use Storipress\Revert\Requests\Property;

class Revert
{
    protected string $token = '';

    protected string $customerId = '';

    protected string $userAgent = 'storipress/revert-sdk (https://github.com/storipress/revert-sdk; v1.0.0)';

    protected readonly Contact $contact;

    protected readonly Deal $deal;

    protected readonly Property $property;

    protected readonly Connection $connection;

    /**
     * Create a new revert instance.
     */
    public function __construct(
        public Factory $http,
    ) {
        $this->contact = new Contact($this);

        $this->deal = new Deal($this);

        $this->property = new Property($this);

        $this->connection = new Connection($this);
    }

    /**
     * Get the current revert instance.
     */
    public function instance(): static
    {
        return $this;
    }

    /**
     * Get the access token.
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * Set the access token for future requests.
     */
    public function setToken(string $token): static
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get the customer id.
     */
    public function getCustomerId(): string
    {
        return $this->customerId;
    }

    /**
     * Set the customer id for future requests.
     */
    public function setCustomerId(string $customerId): static
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Get the user agent.
     */
    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    /**
     * Set user agent for future requests.
     */
    public function setUserAgent(string $userAgent): static
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    public function contact(): Contact
    {
        return $this->contact;
    }

    public function deal(): Deal
    {
        return $this->deal;
    }

    public function property(): Property
    {
        return $this->property;
    }

    public function connection(): Connection
    {
        return $this->connection;
    }
}
