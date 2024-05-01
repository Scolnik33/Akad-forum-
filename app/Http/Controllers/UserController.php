<?php

namespace App\Http\Controllers;

use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    public function signUp(SignupRequest $request) {
        $request->validated();

        $this->userService->signUp($request);

        return redirect('home');
    }

    public function signIn(SigninRequest $request) {
        $request->validated();

        $this->userService->signIn($request);
        
        return redirect('home');
    }

    public function toupdateprofile(UpdateProfileRequest $request, $id) {
        $request->validated();

        $this->userService->toupdateprofile($request, $id);

        return redirect('profile/' . $id);
    }

    public function logout() {
        Auth::logout();

        session()->flash('success', 'Выход из аккаунта успешно выполнен.');

        return redirect('home');
    }
}
