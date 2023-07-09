<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminUserStoreRequest;
use App\Http\Requests\Admin\AdminUserUpdateRequest;
use App\Models\AdminUser;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * 管理者一覧画面
     */
    public function index(): View
    {
        $admin_users = AdminUser::select('id', 'name', 'email')->paginate(10);

        return view('admin.admin_users.index', compact('admin_users'));
    }

    /**
     * 管理者作成画面
     */
    public function create(): View
    {
        return view('admin.admin_users.form');
    }

    /**
     * 管理者作成処理
     */
    public function store(AdminUserStoreRequest $request): RedirectResponse
    {
        AdminUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return to_route('admin.admin_users.index');
    }

    /**
     * 管理者更新画面
     */
    public function edit(AdminUser $admin_user): View
    {
        return view('admin.admin_users.form', compact('admin_user'));
    }

    /**
     * 管理者更新処理
     */
    public function update(AdminUserUpdateRequest $request, AdminUser $admin_user): RedirectResponse
    {
        $admin_user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return to_route('admin.admin_users.index');
    }

    /**
     * 管理者削除処理
     */
    public function destroy(AdminUser $admin_user): RedirectResponse
    {
        // TODO:自分は削除できないように

        $admin_user->delete();

        return to_route('admin.admin_users.index');
    }
}
