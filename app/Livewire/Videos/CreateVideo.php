<?php

namespace App\Livewire\Videos;

use App\Jobs\ConvertVideoForStreaming;
use App\Jobs\CreateThumbnailFromVideo;
use App\Models\{Channel, Video};
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateVideo extends Component
{

    use WithFileUploads;
    public $isUploading = false;
    public Channel $channel;
    public Video $video;
    public $videoFile;

    protected $rules = [
        'videoFile'=>'required|mimes:mp4|max:12288'//12mb
    ];

    public function amount(Channel $channel)
    {
        $this->channel =$channel;
    }
    public function render()
    {
        return view('livewire.video.create-video')->layout('layouts.site.app');
    }

    public function fileCompleted()
    {
        $this->validate();

        //save the file
        $path = $this->videoFile->store('videos-temp');
             
        //create video record in sb
        $this->video = Video::create([
            'title'=>'untitle',
            'description'=>'none',
            'uid'=>uniqid(true),
            'thumbnail_image'=>'none',
            'visibility'=>'private',
            'channel_id' => $this->channel->id,
            'path'=>explode('/',$path)[1]
        ]);

        //dispach jobs
        CreateThumbnailFromVideo::dispatch($this->video);
        ConvertVideoForStreaming::dispatch($this->video);


        // redirect to edit route
        return redirect()->route("video.edit",[
            'channel'=>$this->channel,
            'video'=>$this->video
        ]);
    }

    public function upload()
    {
       
        $this->validate([
        'videofile'=>'required|mimes:mp4|max:102400',
        ]);
    }

    
}
