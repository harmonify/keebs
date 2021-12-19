<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
    public function test_it_can_render_home()
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
    }
}
