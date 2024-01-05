@extends('layout.layout')

@section('content')
    <div>
        <div>
            <h1 style="text-align: center;">Welcome! Please enter your details below!</h1>
        </div>
        <div>
            <section class="position-relative py-4 py-xl-5">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                            <div class="card mb-5">
                                <div class="card-body p-sm-5">
                                    <form method="post" action="/submit">
                                        @csrf
                                        <div class="mb-3"><input id="name" class="form-control" type="text" name="name" placeholder="Name" required /></div>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="mb-3"><input id="email" class="form-control" type="email" name="email" placeholder="Email" required inputmode="email" /></div>
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="mb-3"><textarea id="message" class="form-control" name="message" rows="6" placeholder="Message"></textarea></div>
                                        @error('message')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div><button class="btn btn-primary d-block w-100" type="submit">Send </button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
