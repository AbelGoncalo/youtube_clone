<div>
    <div class="container">

      
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" 
                    x-data="{ uploading: false, progress: 0 }"
                    x-on:livewire-upload-start="uploading = true"
                    x-on:livewire-upload-finish="uploading = false, $wire.fileCompleted()"
                    x-on:livewire-upload-cancel="uploading = false"
                    x-on:livewire-upload-error="uploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">

                    <div class="card-body">
                        <div class="progress my-4" x-show="isUploading">
                            <div class="progress-bar" :style=" `width:${progress}%`"></div>
                        </div>

                        <form action="" x-hidden="isUploading">
                            <input type="file" wire:model='videoFile'>
                        </form>

                        @error('videoFile')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
