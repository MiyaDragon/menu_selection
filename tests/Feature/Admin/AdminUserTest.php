<?php

namespace Tests\Feature\Admin;

use App\Models\AdminUser;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_users_index_screen_can_be_rendered(): void
    {
        $response = $this->get('/admin/admin_users');

        $response->assertStatus(200);
    }

    public function test_new_admin_users_can_register(): void
    {
        $response = $this->post('/admin/admin_users', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/admin/admin_users');
    }

    public function test_admin_users_can_be_updated(): void
    {
        $admin_user = AdminUser::factory()->create();

        $response = $this
            ->actingAs($admin_user)
            ->put("/admin/admin_users/{$admin_user->id}", [
                'name' => 'Update User',
                'email' => 'update@example.com',
                'password' => 'password',
                'password_confirmation' => 'password',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/admin/admin_users');

        $admin_user->refresh();

        $this->assertSame('Update User', $admin_user->name);
        $this->assertSame('update@example.com', $admin_user->email);
    }

    public function test_admin_user_can_delete_their_account(): void
    {
        $admin_user = AdminUser::factory()->create();

        $response = $this
            ->actingAs($admin_user)
            ->delete("/admin/admin_users/{$admin_user->id}");

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/admin/admin_users');

        $this->assertSoftDeleted($admin_user->fresh());
    }
}
