<?php

namespace App\Livewire\Auth;

use App\Models\{Channel, User};
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Str;


class RegisterComponent extends Component
{
    use LivewireAlert;
    public $name, $password, $email, $channel_name;

    public $rules = [
        'name' => 'required',
        'password' => 'required',
        'email' => 'required',
        'channel_name' => ['required','string','min:4'],

    ];

    public $messages = [
        'name.required' => 'campo obrigatorio',
        'email.required' => 'campo obrigatorio',
        'password.required' => 'campo obrigatorio',
        'channel_name.required' => 'campo obrigatorio',


    ];

    public function render()
    {
        return view('livewire.auth.register-component')->layout('layouts.site.app');
    }

    public function save()
    {

        $this->validate($this->rules, $this->messages);

        try {

            $user = User::Create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
            ]);

            
            
            Channel::create([
                'name'=>$this->channel_name,
                'slug'=>Str::slug($this->channel_name, '-'),
                'uid'=>uniqid(true),
                'user_id'=>$user->id
            ]);
            $this->alert('success', 'SUCESSO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Operação Realizada Com Sucesso.'
            ]);
            if(Auth::attempt(['email' => $this->email, 'password' => $this->password])){

                redirect()->route('site.index');
            }

        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
