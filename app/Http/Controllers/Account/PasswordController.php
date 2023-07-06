<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class PasswordController extends Controller
{
    /**
     * パスワード更新画面
     */
    public function edit(Request $request): View
    {
        return view('accounts.passwords.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * パスワード更新処理
     */
    public function update(PasswordUpdateRequest $request): RedirectResponse
    {
        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return to_route('account.show');
    }
}
