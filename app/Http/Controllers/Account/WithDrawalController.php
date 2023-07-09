<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\WithDrawalReasonRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class WithDrawalController extends Controller
{
    /**
     * 退会画面
     */
    public function edit(Request $request): View
    {
        return view('accounts.withdrawals.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * 退会処理
     */
    public function destroy(WithDrawalReasonRequest $request): RedirectResponse
    {
        if (filled($request->withdrawal_reason)) {
            $request->user()->update($request->validated());
        }

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('home');
    }
}
