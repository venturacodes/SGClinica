<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MedicineTest extends TestCase
{
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
    public function test_adding_medicine_right_way(){
        
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'pucminas'),
        ]);
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);
        $response = $this->actingAs($user)->post('medicines/store',[
            'generic_name' => 'Nimesulida',
            'manufacturer_name' => 'Teste nome fabricante',
            'manufacturer' => 'Teste fabrica',
        ]);
        $this->assertAuthenticatedAs($user);
        $this->assertDatabaseHas('medicines',['generic_name' => 'Nimesulida']);
    }
}
