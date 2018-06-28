<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DatabaseTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function can_query_the_database()
    {
        $this->assertEmpty(\App\User::all());
    }
}
