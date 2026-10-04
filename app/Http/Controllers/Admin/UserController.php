<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    /** Admin only (see routes). Handy to verify that salesmen get 403 here. */
    public function index(): View
    {
        return view('admin.users', [
            'users' => User::orderBy('role')->orderBy('name')->get(),
        ]);
    }
}
