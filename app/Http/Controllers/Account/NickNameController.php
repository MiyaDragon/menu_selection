<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\NickNameUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NickNameController extends Controller
{
    /**
     * ニックネーム更新画面
     */
    public function edit(Request $request): View
    {
        return view('accounts.nicknames.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * ニックネーム更新処理
     */
    public function update(NickNameUpdateRequest $request): RedirectResponse
    {
        $request->user()->update($request->validated());

        return to_route('account.show');
    }
}
