<?php

namespace Tests\Features\Beer;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetBeersTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     */
    public function it_grabs_beers()

    {
        $response1 = $this->json('POST', '/register', [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ])->json();


        $this->assertArrayHasKey('token', $response1);
        $response = $this->withHeader('Authorization', 'Bearer ' . $response1['token'])->json('GET', 'api/beers');
        $response->assertStatus(200);
        $response->assertOk();
        $beers = $response->json();
        $this->assertIsArray($beers);
        $this->assertArrayHasKey('data', $beers);

    }
}
