<?php

namespace Tests\Feature\Admin;

use App\Models\AdminUser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_index_screen_can_be_rendered(): void
    {
        $admin_user = AdminUser::factory()->create();

        $response = $this
            ->actingAs($admin_user, 'admin')
            ->get('/admin/users');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register(): void
    {
        $admin_user = AdminUser::factory()->create();

        $response = $this
            ->actingAs($admin_user, 'admin')
            ->post('/admin/users', [
                'nickname' => 'Test User',
                'email' => 'test@example.com',
                'password' => 'password',
                'password_confirmation' => 'password',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/admin/users');
    }

    public function test_users_can_be_updated(): void
    {
        $user = User::factory()->create();
        $admin_user = AdminUser::factory()->create();

        $response = $this
            ->actingAs($admin_user, 'admin')
            ->put("/admin/users/{$user->id}", [
                'nickname' => 'Update User',
                'email' => 'update@example.com',
                'password' => 'password',
                'password_confirmation' => 'password',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/admin/users');

        $user->refresh();

        $this->assertSame('Update User', $user->nickname);
        $this->assertSame('update@example.com', $user->email);
    }

    public function test_admin_user_can_delete_their_account(): void
    {
        $user = User::factory()->create();
        $admin_user = AdminUser::factory()->create();

        $response = $this
            ->actingAs($admin_user, 'admin')
            ->delete("/admin/users/{$user->id}");

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/admin/users');

        $this->assertSoftDeleted($user->fresh());
    }
}
