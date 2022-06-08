<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use File;

class LoginTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login_with_an_user_is_successful()
    {
        User::create([
            'name' => 'tester1',
            'email' => 'tester1@gmail.com',
            'password' => Hash::make('tester1test'),
        ]);

        $response = $this->post('/login', [
            'email' => 'tester1@gmail.com',
            'password' => 'tester1test',
        ]);

        $response->assertStatus(302);

    }

    public function test_login_with_an_user_redirects_to_configurations_view()
    {
        User::create([
            'name' => 'tester1',
            'email' => 'tester1@gmail.com',
            'password' => Hash::make('tester1test'),
        ]);

        $response = $this->post('/login', [
            'email' => 'tester1@gmail.com',
            'password' => 'tester1test',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/home');

    }

    public function test_user_has_name_attribute()
    {
        $user = User::create([
            'name' => 'tester1',
            'email' => 'tester1@gmail.com',
            'password' => Hash::make('tester1'),
        ]);

        $this->assertEquals('tester1', $user->name);

    }

    public function test_user_has_email_attribute()
    {
        $user = User::create([
            'name' => 'tester1',
            'email' => 'tester1@gmail.com',
            'password' => Hash::make('tester1'),
        ]);

        $this->assertEquals('tester1@gmail.com', $user->email);

    }

    public function test_register_with_an_user_is_successful()
    {
        $response = $this->post('/register', [
            'name' => 'tester1',
            'email' => 'tester1@gmail.com',
            'password' => 'tester1test',
            'password_confirmation' => 'tester1test',
        ]);

        File::deleteDirectory(storage_path('app/tester1'));

        $response->assertStatus(302);

    }

    public function test_register_with_an_user_redirects_to_configurations_view()
    {
        $response = $this->post('/register', [
            'name' => 'tester1',
            'email' => 'tester1@gmail.com',
            'password' => 'tester1test',
            'password_confirmation' => 'tester1test',
        ]);

        File::deleteDirectory(storage_path('app/tester1'));

        $response->assertStatus(302);
        $response->assertRedirect('/configurations');

    }
}
