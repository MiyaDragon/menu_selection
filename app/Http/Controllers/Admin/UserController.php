<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * ユーザー一覧画面
     */
    public function index(): View
    {
        $users = User::select('id', 'nickname', 'email')->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    /**
     * ユーザー作成画面
     */
    public function create(): View
    {
        return view('admin.users.form');
    }

    /**
     * ユーザー作成処理
     */
    public function store(UserStoreRequest $request): RedirectResponse
    {
        User::create([
            'nickname' => $request->nickname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return to_route('admin.users.index');
    }

    /**
     * ユーザー更新画面
     */
    public function edit(User $user): View
    {
        return view('admin.users.form', compact('user'));
    }

    /**
     * ユーザー更新処理
     */
    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        $user->update([
            'nickname' => $request->nickname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return to_route('admin.users.index');
    }

    /**
     * ユーザー削除処理
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return to_route('admin.users.index');
    }
}
