<?php

namespace App\Livewire\Auth;

use App\Models\{User};

use Illuminate\Support\Facades\Auth;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class LoginComponent extends Component
{
    use LivewireAlert;

    public $email, $password;

    public $rules = [
        'email'=>'required', 
        'password'=>'required'
    ];
    public $messages = ['email.required'=>'campo obriagatorio', 'password.required'=>'campo obrigatorio'];

    public function render()
    {
        return view('livewire.auth.login-component')->layout('layouts.site.app');
    }

    public function login(){

        // $this->validate($this->rules,$this->messages);
        try {
          
            $user = User::where('email', '=',$this->email)->first();

            if(!$user){
                $this->alert('error', 'ERRO', [
                    'toast'=>false,
                    'position'=>'center',
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'OK',
                    'text'=>'Não existe uma conta com este e-mail!!!'
                ]);

                return;
            }

            if(Auth::attempt(['email' => $this->email, 'password' => $this->password])){

                redirect()->route('site.index');
            }else{

                $this->alert('error', 'ERRO', [
                    'toast' => false,
                    'position' => 'center',
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'OK',
                    'text' => 'Credências Inválidas!!!'
                ]);
            }

           
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
