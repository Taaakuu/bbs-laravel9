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

    /**
     * 显示用户注册页面
     *
     * @param User $user
     * @return Factory|View|Application
     */
    public function edit(User $user): View|Factory|Application
    {
        return view('users.edit', compact('user'));
    }


    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功');
    }
}
