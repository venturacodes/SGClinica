<?php

namespace Tests\Feature;

use App\Role;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CollaboratorTest extends TestCase
{
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

    public function test_adding_collaborator_right_way(){
        
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'pucminas'),
        ]);
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);
        $response = $this->actingAs($user)->post('collaborators/store',[
            'email' => 'teste@teste.com.br',
            'password' => bcrypt($password = 'secret'),
            'role_id' => 4,
            'clinic_id' => 1,
            'name' => 'teste',
            'phone' => '321312321',
        ]);
        $this->assertAuthenticatedAs($user);
        $this->assertDatabaseHas('users',['email' => $user->email]);
    }

}
