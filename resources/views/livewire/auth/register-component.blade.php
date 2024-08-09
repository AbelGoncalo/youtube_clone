<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Criar Conta
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
                                        register</h2>
                                    <form action="#!" wire:submit='save' method="POST">
                                        @method('POST')
                                        @csrf
                                        <div class="row gy-2 overflow-hidden">
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" wire:model="name" name="name"
                                                        id="name" placeholder="First Name" >
                                                    <label for="name" class="form-label">Name</label>
                                                </div>
                                                @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            </div>

                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control" wire:model="email" name="email"
                                                        id="email" placeholder="name@example.com" >
                                                    <label for="email" class="form-label">Email</label>
                                                </div>
                                                @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            </div>

                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" wire:model="channel_name" name="channel_name"
                                                        id="channel_name" placeholder="" >
                                                    <label for="channel_name" class="form-label">Channel</label>
                                                </div>

                                                @error('channel_name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control" wire:model="password" name="password"
                                                        id="password" value="" placeholder="Password" >
                                                    <label for="password" class="form-label">Password</label>
                                                </div>
                                                @error('password')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        name="iAgree" id="iAgree" required>
                                                    <label class="form-check-label text-secondary" for="iAgree">
                                                        I agree to the <a href="#!"
                                                            class="link-primary text-decoration-none">terms and
                                                            conditions</a>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid my-3">
                                                    <button class="btn btn-primary btn-lg" type="submit">Sign
                                                        up</button>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <p class="m-0 text-secondary text-center">Already have an account? <a
                                                        href="{{route('site.login')}}" class="link-primary text-decoration-none">Sign
                                                        in</a></p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
