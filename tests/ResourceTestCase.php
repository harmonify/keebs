<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResourceTestCase extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->password = 'secret';
        $this->user = User::factory()->create(['password' => bcrypt($this->password)]);
    }

    public function tearDown(): void
    {
        $this->artisan('migrate:refresh');

        parent::tearDown();
    }
}
