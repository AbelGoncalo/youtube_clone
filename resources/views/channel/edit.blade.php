<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="../node_modules"> --}}
    {{-- <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.js"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Clone Youtube</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">Laravel</a>

            <div class="">

                @auth
                    @livewire('auth.logout-component')
                @endauth

                @guest

                    <a href="{{ route('site.login') }}" class="btn btn-outline-success aut">Login</a>
                    <a href="{{ route('site.register') }}" class="btn btn-outline-success">Register</a>
                @endguest
            </div>

        </div>
    </nav>

    <div class="container">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>
                <div class="card-body">

                    <form wire:submit='login' method="POST">
                        @method('POST')
                        @csrf
                        <div class="row gy-2 overflow-hidden">


                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" wire:model='channel.name' name="name"
                                        id="name" placeholder="name@example.com" required>
                                    <label for="name" class="form-label">Name</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" wire:model='channel.slug' name="slug"
                                        id="slug" value="" placeholder="Password" required>
                                    <label for="slug" class="form-label">Slug</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                   <textarea class="form-control" id="description" cols="3" wire:model='channel.description'  rows="4" name="description"></textarea>
                                   <label for="description" class="form-label">Description</label>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    {{-- <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> --}}

    @livewireScripts

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
</body>

</html>
