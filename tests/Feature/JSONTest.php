<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JSONTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_json(): void
    {
        $response = $this->get('/json-test');

        $response->assertStatus(200);
        $response->assertJson([
            'updated' => true,
        ]);
    }
    public function test_json_exact(): void
    {
        $response = $this->get('/json-test');

        $response->assertStatus(200);
        $response->assertExactJson([
            'updated' => true,
        ]);
    }
}
