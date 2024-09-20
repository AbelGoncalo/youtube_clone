<?php

namespace App\Livewire\Channel;

use App\Models\Channel;

use Livewire\Component;

class EditchannelComponent extends Component
{
    public $name, $slug, $description, $edit;

    // protected function rules()
    // {
    //     return [
    //         'name' => 'required|max:255|unique:channel.name.' . $this->id,
    //         'slug' => 'required|max:255',
    //         'description' => 'nullable|max:255'

    //     ];
    // }

    protected $rules = [
        'name' => 'required|max:255|unique:channel.name',
        'slug' => 'required|max:255',
        'description' => 'nullable|max:255'
    ];

    protected $messages = [
        'name.required' => 'obrigatorio',
        'slug.required' => 'obrigatorio',

    ];


    public function render()
    {
        return view('livewire.channel.editchannel-component')->layout('layouts.site.app');
    }

    public function update()
    {
        //$this->validate();
        Channel::
        dd('');
        session()->flash('message', 'Channel update');
        return back();
    }
}
