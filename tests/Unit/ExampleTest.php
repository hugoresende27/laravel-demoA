<?php

namespace Tests\Unit;
use Tests\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
//use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }


    public function test_that_string_is_string(): void
    {
        $this->assertIsString("string");
    }

    public function test_that_name_is_hugo()
    {
        $name = "hugo";
        $this->assertTrue($name == "hugo");
    }


    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

    }

    public function test_the_application_returns_a_successful_response_post()
    {
        $response = $this->post('/user', ['name' => 'Amy']);

        $response->assertStatus(404);
    }

}
