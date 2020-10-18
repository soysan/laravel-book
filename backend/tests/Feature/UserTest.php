<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;
    /**
     * db connection check
     *
     * @return void
     */
    public function testCreateAUser()
    {
        Factory(User::class)->create([
            'name' => 'jack',
            'email' => 'aaa.bbb@gmail.com',
            'password' => 'ABCDEFGH'
        ]);
        Factory(User::class, 10)->create();

        $this->assertDatabaseHas('users', [
            'name' => 'jack',
            'email' => 'aaa.bbb@gmail.com',
            'password' => 'ABCDEFGH'
        ]);
    }


    public function testCreateAUserLogin()
    {
        Factory(User::class)->create([
            'name' => 'jack',
            'email' => 'aaa.bbb@gmail.com',
            'password' => 'ABCDEFGH',
        ]);
        Factory(User::class)->create();

        $this->assertDatabaseHas('users', [
            'name' => 'jack',
            'email' => 'aaa.bbb@gmail.com',
            'password' => 'ABCDEFGH'
        ]);
    }
}
