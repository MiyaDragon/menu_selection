<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function __invoke(Request $request): View
    {
        return view('accounts.show', [
            'user' => $request->user(),
        ]);
    }
}
