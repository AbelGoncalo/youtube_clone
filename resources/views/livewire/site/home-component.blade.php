<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            CHANNEL
        </div>
        <div class="card-body">
            <!-- Registration 13 - Bootstrap Brain Component -->
            <section class="bg-light py-3 py-md-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                            <div class="card border border-light-subtle rounded-3 shadow-sm">
                                <div class="card-body p-3 p-md-4 p-xl-5">

                                    <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Enter your details to
                                        CHANNEL</h2>
                                    <form wire:submit='upload' method="POST">
                                        @method('POST')
                                        @csrf
                                        <div class="row gy-2 overflow-hidden">

                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="file" class="form-control" wire:model='email'
                                                        name="email" id="email" placeholder="name@example.com"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid my-3">
                                                    <button class="btn btn-primary btn-lg"
                                                        type="submit">Upload</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <Section class="bg-light py-3 py-md-5">

                <div class="card">
                    <div class="card-header fw-bold">
                        Channels
                    </div>

                    <div class="card-body">



                        @if (isset($channels) and $channels->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Imagem</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Description</th>
                                        <th>Ações</th>
                                    </tr>

                                </thead>
                                <tbody>


                                    @foreach ($channels as $item)
                                        <tr>
                                            <td style="width:10%">
                                                <img class="img-fluid rounded-full"
                                                    style="width: 3rem;height:3rem; border-radius: 100%"
                                                    src="{{ $item->image != null ? asset('/storage/image/' . $item->image) : asset('/not-found.png') }}"
                                                    alt="Imagem da categoria {{ $item->description }}">
                                            </td>

                                            <td>{{ $item->name ?? '' }}</td>
                                            <td>{{ $item->slug ?? '' }}</td>
                                            <td>{{ $item->description ?? '' }}</td>


                                            <td>
                                                <!-- Button trigger modal -->
                                                <button wire:click='editItem({{ $item->id }})' type="button"
                                                    class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">
                                                    Editar
                                                </button>
                                                <button wire:click='confirm({{ $item->id }})' type="button"
                                                    class="btn btn-danger" data-bs-toggle="modal" data-bs-target="">
                                                    Eliminar
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-info text-center">
                                <p>Nenhum Channels encontrafo!</p>
                            </div>
                        @endif
                    </div>

                </div>

            </Section>
        </div>
    </div>
    <div wire:ignore class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                                                id="name" placeholder="">
                                            <label for="name" class="form-label">Name</label>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" wire:model='slug' name="slug"
                                                id="slug" value="" placeholder="">
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
                                        <div class="form-floating mb-3">
                                            <input type="file" class="form-control" wire:model='image'
                                                name="image" id="image" value="" placeholder="">
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3">
                                            @if ($image)
                                                <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail">
                                            @endif
                                        </div>

                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary " type="submit">Update</button>
                                        </div>
                                    </div>
                                </div>

                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{session('message')}}
                                    </div> 
                                @endif
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
