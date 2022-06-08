<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RouteTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_home_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_login_returns_a_successful_response()
    {
        $response = $this->get('/login');

        $response->assertSee('Email Address');
        $response->assertSee('Password');
        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_register_returns_a_successful_response()
    {
        $response = $this->get('/register');

        $response->assertSee('Name');
        $response->assertSee('Email Address');
        $response->assertSee('Password');
        $response->assertSee('Confirm Password');
        $response->assertStatus(200);
    }

    public function test_auth_user_can_see_configurations_index()
    {
        $user = User::create([
            'name' => 'tester1',
            'email' => 'tester1@gmail.com',
            'password' => Hash::make('tester1'),
        ]);

        $response = $this->actingAs($user)->get('/configurations');
        $response->assertStatus(200);

    }

    public function test_auth_user_can_see_configurations_form()
    {
        $user = User::create([
            'name' => 'tester1',
            'email' => 'tester1@gmail.com',
            'password' => Hash::make('tester1'),
        ]);

        $response = $this->actingAs($user)->get('/configurations/create');
        $response->assertStatus(200);

    }

    public function test_unauth_user_cannot_see_configurations_index()
    {
        $response = $this->get('/configurations');
        $response->assertStatus(302);
        $response->assertRedirect('/login');

    }

    public function test_unauth_user_cannot_see_configurations_form()
    {
        $response = $this->get('/configurations/create');
        $response->assertStatus(302);
        $response->assertRedirect('/login');

    }
}
