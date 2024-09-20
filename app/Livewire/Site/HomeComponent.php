<?php

namespace App\Livewire\Site;

use App\Models\{Channel};
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\Component;

class HomeComponent extends Component
{

    use LivewireAlert, WithFileUploads;
    use AuthorizesRequests;
    public $name, $slug, $uid, $image, $description, $user_id, $edit;
    protected $listeners = ['close' => 'close', 'delete' => 'delete'];


    protected $rules = [
        'name' => 'required',
        'slug' => 'required',
        'image' => 'required',
        'description' => 'required',
        'uid' => 'required',
        'image' => 'nullable|image|max:1024'
    ];

    protected $messages = [
        'name.required' => 'obrigatorio',
        'slug.required' => 'obrigatorio',
        'image.required' => 'obrigatorio',
        'description.required' => 'obrigatorio',
        'uid.required' => 'obrigatorio'
    ];
    public function render()
    {
        return view('livewire.site.home-component', [
            'channels' => $this->getChannels(),
        ])->layout('layouts.site.app');
    }

    public function getChannels()
    {

        try {

            return Channel::where('user_id', '=', auth()->user()->id)->get();
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function editItem($id)
    {


        try {
            $channel = Channel::where('id', '=', $id)->first();

            $this->edit = $channel->id;
            $this->name = $channel->name;
            $this->slug = $channel->slug;
            $this->uid = $channel->uid;
            $this->description = $channel->description;
        } catch (\Throwable $th) {
            dd($th->getMessage());
            $this->alert('error', 'ERRO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text' => 'Falha ao realizar operação'
            ]);
        }
    }

    public function clear()
    {

        $this->name = null;
        $this->slug = null;
        $this->uid = null;
        $this->image = null;
        $this->description = null;
        $this->edit = null;
    }

    public function update()
    {


        $this->validate($this->rules, $this->messages);
        try {

            $imageString = null;

            if ($this->image) {

                $imageString = md5($this->image->getClientOriginalName()) . '.' .
                    $this->image->getClientOriginalExtension();
                $this->image->storeAs('public/image/', $imageString);
            }

            Channel::find($this->edit)->update([
                'name' => $this->name ?? null,
                'slug' => $this->slug ?? null,
                'uid' => $this->uid ?? null,
                'description' => $this->description ?? null,
                'image' => $imageString ?? null
            ]);

            $this->alert('success', 'SUCESSO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text' => 'Operação Realizada Com Sucesso.'
            ]);

            $this->clear();
        } catch (\Throwable $th) {
            dd($th->getMessage());
            $this->alert('error', 'ERRO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text' => 'Falha ao realizar operação'
            ]);
        }
    }

    public function confirm($id)
    {
        try {
            $this->edit = $id;
            $this->alert('warning', 'Confirmar', [
                'icon' => 'warning',
                'position' => 'center',
                'toast' => false,
                'text' => "Deseja realmente excluir? Não pode reverter a ação",
                'showConfirmButton' => true,
                'showCancelButton' => true,
                'cancelButtonText' => 'Cancelar',
                'confirmButtonText' => 'Excluir',
                'confirmButtonColor' => '#3085d6',
                'cancelButtonColor' => '#d33',
                'onConfirmed' => 'delete'
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function delete()
    {
        try {

            $channel = Channel::find($this->edit);

            // an AuthorizationException will be thrown...
            $this->authorize('delete', $channel);

            $this->alert('success', 'SUCESSO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text' => 'Operação Realizada Com Sucesso.'
            ]);

            $this->clear();
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function upload()
    {
        dd('Leo');
    }
}
