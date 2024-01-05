@extends('layout.layout')

@section('content')
<div>
    <div style="margin: auto;width: 50%;">
        <section class="d-md-flex py-4 py-xl-5">
            <div class="container">
                <div class="text-center p-4 p-lg-5">
                    <h1 class="fw-bold mb-4">Thank you {{$name}} for getting in touch, we&#39;ll get back you on on {{$email}}!</h1>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

