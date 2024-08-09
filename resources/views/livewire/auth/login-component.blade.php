<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Login
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
                                        login</h2>
                                    <form wire:submit='login' method="POST">
                                        @method('POST')
                                        @csrf
                                        <div class="row gy-2 overflow-hidden">


                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control" wire:model='email' name="email"
                                                        id="email" placeholder="name@example.com" required>
                                                    <label for="email" class="form-label">Email</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control"  wire:model='password' name="password"
                                                        id="password" value="" placeholder="Password" required>
                                                    <label for="password" class="form-label">Password</label>
                                                </div>
                                            </div>



                                            <div class="col-12">
                                                <div class="d-grid my-3">
                                                    <button class="btn btn-primary btn-lg" type="submit">login</button>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <p class="m-0 text-secondary text-center">dont have an account? <a
                                                        href="{{ route('site.register') }}"
                                                        class="link-primary text-decoration-none">Sign up</a></p>
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
