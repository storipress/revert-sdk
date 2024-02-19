<?php

declare(strict_types=1);

namespace Tests;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Http;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Storipress\Revert\Revert;

class TestCase extends BaseTestCase
{
    use WithWorkbench;

    public Revert $revert;

    protected function setUp(): void
    {
        parent::setUp();

        $this->assertInstanceOf(Application::class, $this->app);

        $this->revert = $this->app->make('revert');

        Http::preventStrayRequests();

        $data = require __DIR__.'/Dataset/all.php';

        Http::fake($data);
    }
}
