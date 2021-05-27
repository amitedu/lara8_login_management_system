<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_can_user_login_using_login_form(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $this->assertAuthenticated();

        $response->assertSeeText('/');
    }


    public function test_user_can_not_acces_admin_page(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $this->get('/admin/users');

        $response->assertRedirect('/');
    }


    public function test_admin_can_acces_admin_page(): void
    {
        $user = User::factory()->create();

        $user->roles()->attach(1);

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response = $this->get('/admin/users');

        $response->assertSeeText('Users');
    }
}
