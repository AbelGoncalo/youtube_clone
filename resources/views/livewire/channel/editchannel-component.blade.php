<div>
    <div class="container">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>
                <div class="card-body">

                    <form wire:submit='update' method="POST">
                        @method('POST')
                        @csrf
                        <div class="row gy-2 overflow-hidden">


                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" wire:model='name' name="name"
                                        id="name" placeholder="name@example.com">
                                    <label for="name" class="form-label">Name</label>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" wire:model='slug' name="slug"
                                        id="slug" value="" placeholder="Password">
                                    <label for="slug" class="form-label">Slug</label>
                                    @error('slug')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="description" cols="3" wire:model='description' rows="4"
                                        name="description"></textarea>
                                    <label for="description" class="form-label">Description</label>
                                    @error('description')
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

</div>
