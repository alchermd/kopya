<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KopyaTest extends TestCase
{
    /** @test */
    public function guest_cant_access_dashboard()
    {
        $response = $this->get('/home');

        $response->assertStatus(302);
    }
}
