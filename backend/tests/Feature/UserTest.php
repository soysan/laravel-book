<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Faker\Factory;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * db connection check
     *
     * @return void
     */
    public function testCreateAUser()
    {
        Factory(User::class)->create();

        $this->assertCount(1, User::all());
    }
}
