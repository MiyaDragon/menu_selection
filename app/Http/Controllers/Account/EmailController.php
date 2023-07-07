<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailController extends Controller
{
    /**
     * メールアドレス更新画面
     */
    public function edit(Request $request): View
    {
        return view('accounts.emails.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * メールアドレス更新処理
     */
    public function update(EmailUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return to_route('account.show');
    }
}
