<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\ResourceTestCase;

class DashboardTest extends ResourceTestCase
{
    public function test_guest_cannot_access_dashboard()
    {
        $response = $this->get(route('dashboard.index'));

        $response->assertStatus(302);

        $response->assertRedirect(route('login'));
    }

    public function test_user_can_access_dashboard()
    {
        $response = $this->actingAs($this->user)->get(route('dashboard.index'));

        $response->assertStatus(200);

        $response->assertViewIs('dashboard.index');
    }
}
