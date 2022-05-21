<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Configuration;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class ConfigurationTest extends TestCase

{
    use DatabaseTransactions;

    public function test_auth_user_can_create_a_configuration()
    {
        $user = User::create([
            'name' => 'tester1',
            'email' => 'tester1@gmail.com',
            'password' => Hash::make('tester1'),
        ]);

        $configuration = Configuration::create([
            'web_name' => 'tester1web',
            'admin_email' => 'tester1@gmail.com',
            'theme' => 'go',
            'php' => '7.4',
            'storage' => 'ENOUGH',
            'catalog' => '1',
            'search' => 'BASIC',
            'paypal_payment' => '1',
            'creditcard_payment' => '1',
            'mobile_payment' => '1',
            'cart' => '1',
            'security' => 'STANDARD',
            'backup' => '0',
            'seo' => '1',
            'twitter_socials' => '1',
            'facebook_socials' => '0',
            'youtube_socials' => '0',
            'assigned_port' => '65000',
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->get('/configurations');
        $response->assertStatus(200);
        $response->assertSee([$configuration->web_name, $configuration->admin_email, $configuration->theme, $configuration->php, $configuration->status]);
    }

    public function test_auth_user_can_delete_a_configuration()
    {
        $user = User::create([
            'name' => 'tester1',
            'email' => 'tester1@gmail.com',
            'password' => Hash::make('tester1'),
        ]);

        $configuration = Configuration::create([
            'web_name' => 'tester1web',
            'admin_email' => 'tester1@gmail.com',
            'theme' => 'go',
            'php' => '7.4',
            'storage' => 'ENOUGH',
            'catalog' => '1',
            'search' => 'BASIC',
            'paypal_payment' => '1',
            'creditcard_payment' => '1',
            'mobile_payment' => '1',
            'cart' => '1',
            'security' => 'STANDARD',
            'backup' => '0',
            'seo' => '1',
            'twitter_socials' => '1',
            'facebook_socials' => '0',
            'youtube_socials' => '0',
            'assigned_port' => '65000',
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->get('/configurations');
        $response->assertStatus(200);

        $response->assertSee(['Name','Email','Theme','PHP','Status','Actions']);
        $response->assertSee('Delete');

    }

    public function test_auth_user_can_access_configuration_wordpress()
    {
        $user = User::create([
            'name' => 'tester1',
            'email' => 'tester1@gmail.com',
            'password' => Hash::make('tester1'),
        ]);

        $configuration = Configuration::create([
            'web_name' => 'tester1web',
            'admin_email' => 'tester1@gmail.com',
            'theme' => 'go',
            'php' => '7.4',
            'storage' => 'ENOUGH',
            'catalog' => '1',
            'search' => 'BASIC',
            'paypal_payment' => '1',
            'creditcard_payment' => '1',
            'mobile_payment' => '1',
            'cart' => '1',
            'security' => 'STANDARD',
            'backup' => '0',
            'seo' => '1',
            'twitter_socials' => '1',
            'facebook_socials' => '0',
            'youtube_socials' => '0',
            'assigned_port' => '65000',
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->get('/configurations');
        $response->assertStatus(200);

        $response->assertSee(['Name','Email','Theme','PHP','Status','Actions']);
        $response->assertSee('WordPress');
    }

    public function test_auth_user_can_access_configuration_phpmyadmin()
    {
        $user = User::create([
            'name' => 'tester1',
            'email' => 'tester1@gmail.com',
            'password' => Hash::make('tester1'),
        ]);

        $configuration = Configuration::create([
            'web_name' => 'tester1web',
            'admin_email' => 'tester1@gmail.com',
            'theme' => 'go',
            'php' => '7.4',
            'storage' => 'ENOUGH',
            'catalog' => '1',
            'search' => 'BASIC',
            'paypal_payment' => '1',
            'creditcard_payment' => '1',
            'mobile_payment' => '1',
            'cart' => '1',
            'security' => 'STANDARD',
            'backup' => '0',
            'seo' => '1',
            'twitter_socials' => '1',
            'facebook_socials' => '0',
            'youtube_socials' => '0',
            'assigned_port' => '65000',
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->get('/configurations');
        $response->assertStatus(200);

        $response->assertSee(['Name','Email','Theme','PHP','Status','Actions']);
        $response->assertSee('phpMyAdmin');

    }
}
