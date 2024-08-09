<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LogoutComponent extends Component
{
    public function render()
    {
        return view('livewire.auth.logout-component');
    }

    public function logout()
    {
        try {

            Auth::logout();
          
            return redirect()->route('site.login');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
