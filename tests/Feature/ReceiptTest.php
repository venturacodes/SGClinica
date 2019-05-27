<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReceiptTest extends TestCase
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
    public function test_adding_receipt_right_way(){
        
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'pucminas'),
        ]);
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);
        $response = $this->actingAs($user)->post('receipts/store',[
            'client_id' => 1,
            'medicine_id' => 1,
            'collaborator_id' => 1,
            'quantity' => '1 cápsula',
            'period' => '8 horas',
            'form_of_use' => '1 cápsula de 8/8horas',
        ]);
        $this->assertAuthenticatedAs($user);
        $this->assertDatabaseHas('receipts',['client_id' => 1]);
    }

}
