<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function signUp($request) {
        if ($request->avatar) {
            $avatar = $request->file('avatar')->store('uploads', 'public');
        } else {
            $avatar = null;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $avatar
        ]);

        Auth::login($user);
        
        session()->flash('success', 'Вход в аккаунт успешно выполнен! Добро пожаловать ' . Auth::user()->name  . '!');
    }
        
    public function signIn($request) {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->withErrors([
                'error' => 'Wrong login or password.'
            ]);
        }

        session()->flash('success', 'Вход в аккаунт успешно выполнен! Добро пожаловать ' . Auth::user()->name  . '!');
    }

    public function toupdateprofile($request, $id) {
        $user = User::query()->find($id);

        if ($request->avatarFile) {
            $avatar = $request->file('avatarFile')->store('uploads', 'public');
        } else {
            $avatar = $request->avatarString;
        }
        
        $user->update([
            'name' => $request->name,
            'avatar' => $avatar
        ]);

        session()->flash('success', 'Профиль был успешно обновлен!');
    }
}
?>