<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_adding_client_right_way(){
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'pucminas'),
        ]);
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);
        $response = $this->actingAs($user)->post('clients/store',[
            'clinic_id' => 1,
            'name' => $name = $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
        ]);
        $this->assertAuthenticatedAs($user);
        $this->assertDatabaseHas('clients',['name' => $name]);
    }
}
