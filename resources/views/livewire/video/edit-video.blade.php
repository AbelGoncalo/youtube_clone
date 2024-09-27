<div class="container">
    <div class="modal-body ">
        <div class="card">
            <div class="card-header">
                Dashboard
            </div>

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <img src="{{asset($this->video->thumbnail_image)}}" alt="thumbnail" class="img-thumbnail">
                </div>
            </div>
            <div class="card-body ">

                <form wire:submit='update' method="POST">
                    @method('POST')
                    @csrf
                    <div class="row gy-2 overflow-hidden">

                        <div class="col-8">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" wire:model='title' name="title"
                                    id="title" placeholder="">
                                <label for="title" class="form-label">Title</label>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-8">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="description" cols="3" wire:model='description' rows="4"
                                    name="description"></textarea>
                                <label for="description" class="form-label">Description</label>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-8">
                            <div class="form-floating mb-3">

                                <select class="form-control" wire:model="visibility" name="visibility"
                                    id="visibility">
                                    <option selected>--selecionar--</option>
                                    <option value="public">Public</option>
                                    <option value="private">Private</option>
                                    <option value="unlisted">Unlisted</option>
                                </select>
                                @error('visibility')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <button class="btn btn-primary " type="submit">Update</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
