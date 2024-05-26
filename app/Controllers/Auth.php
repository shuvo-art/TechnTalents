<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController {
    public function login() {
        return view('login');
    }

    public function loginCheck() {
        $model = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user && $user['password'] === $password) {
            session()->set('user', $user);
            return redirect()->to('/questions');
        } else {
            return redirect()->back()->with('error', 'Invalid login details');
        }
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/login');
    }
}