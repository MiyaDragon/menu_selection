<?php

namespace Tests\Feature\Admin\Auth;

use App\Models\AdminUser;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
    }

    public function test_admin_users_can_authenticate_using_the_login_screen(): void
    {
        $admin_user = AdminUser::factory()->create();

        $response = $this->post('/admin/login', [
            'email' => $admin_user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated('admin');
        $response->assertRedirect(RouteServiceProvider::ADMIN_HOME);
    }

    public function test_admin_users_can_not_authenticate_with_invalid_password(): void
    {
        $admin_user = AdminUser::factory()->create();

        $this->post('/login', [
            'email' => $admin_user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }
}
