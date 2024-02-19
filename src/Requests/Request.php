<?php

declare(strict_types=1);

namespace Storipress\Revert\Requests;

use Illuminate\Http\Client\Response;
use stdClass;
use Storipress\Revert\Exceptions\ExpiredAccessToken;
use Storipress\Revert\Exceptions\GeneralError;
use Storipress\Revert\Exceptions\UnexpectedResponseData;
use Storipress\Revert\Objects\Error;
use Storipress\Revert\Revert;

abstract class Request
{
    const ENDPOINT = 'https://api.revert.dev';

    /**
     * Create a new request instance.
     */
    public function __construct(
        protected readonly Revert $app,
    ) {
        //
    }

    /**
     * @param  'get'|'post'|'patch'|'delete'  $method
     * @param  non-empty-string  $path
     * @param  array<string, mixed>  $options
     * @return ($isArray is true ? array<int, stdClass> : stdClass)
     */
    protected function request(
        string $method,
        string $path,
        array $options = [],
        bool $isArray = false,
    ): stdClass|array {
        $app = $this->app;

        $response = $app->http
            ->acceptJson()
            ->asJson()
            ->withUserAgent($app->getUserAgent())
            ->withHeader('x-revert-api-token', $app->getToken())
            ->withHeader('x-revert-t-id', $app->getCustomerId())
            ->{$method}($this->url($path), $options);

        if (! ($response instanceof Response)) {
            throw new UnexpectedResponseData();
        }

        $data = $response->object();

        if ($isArray) {
            if (! is_array($data)) { // @phpstan-ignore-line
                throw new UnexpectedResponseData();
            }
        } elseif (! ($data instanceof stdClass)) {
            throw new UnexpectedResponseData();
        }

        if (! $response->successful() || ! $response->json('ok', true)) {
            $this->error($response, $data);
        }

        return $data;
    }

    /**
     * Build up the request API URL.
     */
    protected function url(string $path): string
    {
        return sprintf(
            '%s/%s',
            rtrim(self::ENDPOINT, '/'),
            ltrim($path, '/'),
        );
    }

    /**
     * Convert response error to exception.
     */
    public function error(Response $response, stdClass $data): void
    {
        throw match ($response->status()) {
            401 => new ExpiredAccessToken(),

            default => new GeneralError(
                Error::from($data),
                $response->body(),
                $response->status(),
            ),
        };
    }
}
