<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register()
    {
        $response = $this->post('/user/register',[
            'user_name' => 'hello',
            'password' => '24682468',
            'password_confirmation' => '24682468',
        ]);

        $response->assertStatus(200);
    }

    public function test_login(){
        $response = $this->post('/user/login',[
            'user_name' => 'ayman_safwat',
            'password' => '24682468',
        ]);

        $response->assertStatus(200);
    }

    public function test_logout(){
        $response = $this->get('/user/logout');
        $response->assertStatus(302); //cause it redirect to login page
    }
}
