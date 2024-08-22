<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Models\User;
use Faker\Factory;
use Illuminate\Console\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class UsersController extends Controller
{
    /**
     * 显示用户个人信息页面
     *
     * @param User $user
     * @return Factory|View|Application
     */
    public function show(User $user): Factory|View|Application
    {
        return view('users.show', compact('user'));
    }



    public function edit(User $user)
    {

    }


    public function update(User $user)
    {

    }
}
