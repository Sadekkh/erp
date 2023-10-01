@extends('layouts.management') <!-- Use your layout as needed -->

@section('content')
    <div class="container">
        <h1>Product QR Code</h1>
        <div class="row">
            <div class="col-md-6">
                {!! $qrCode !!}

            </div>
        </div>
    </div>
@endsection
