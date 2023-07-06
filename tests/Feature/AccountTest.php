<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AccountTest extends TestCase
{
    public function test_nickname_can_be_updated(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch('/account/nickname', [
                'nickname' => 'taro',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/account');

        $user->refresh();

        $this->assertSame('taro', $user->nickname);
    }

    public function test_password_can_be_updated(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch('/account/password', [
                'current_password' => 'password',
                'password' => 'new-password',
                'password_confirmation' => 'new-password',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/account');

        $this->assertTrue(Hash::check('new-password', $user->refresh()->password));
    }
}
