<?php

namespace App\Livewire\Videos;

use App\Models\{Channel, Video};
use Livewire\Component;

class EditVideo extends Component
{
    public Channel $channel;
    public Video $video;

    public $title,$visibility, $description;

    protected $rules = [
        'title'=>'required|max:255',
        'description'=>'required|max:1000',
        'visibility'=>'required|in:private,public,unlisted',
    ];

    protected $messages =[
        'title.required'=>'Campo obrigatorio',
        'description.required'=>'Campo obrigatorio',
        'visibility.required'=>'Campo obrigatorio',
    ];

    public function mount($channel, $video)
    {
        $this->channel = $channel;
        $this->video = $video;
    }

    public function render()
    {
        return view('livewire.video.edit-video')->layout('layouts.site.app');
    }

    public function update()
    
    {
       
        $this->validate($this->rules,$this->messages);
      
        $this->video->update([
            'title'=>$this->title,
            'description'=>$this->description,
            'visibility'=>$this->visibility 
        ]);

        session()->flash('message','video was update');
    }
}
