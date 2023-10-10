@extends('layouts.management')
@section('styles')
    <!-- Data Tables -->

    <link rel="stylesheet" href="{{ asset('css/bs-select.css') }}">
@endsection

@section('content')
    <label for="recipient-name" class="col-form-label"></label>
    <div class="row">

        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">

            <form action="{{ route('stocktransaction.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <div id="scanner-container">

                            <div id="camera-preview"></div>
                            <div id="result"></div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">{{ __('messages.maintenance_order') }}</label>

                                <select class="form-control selectpicker" id="maintenance_orders_id" name="maintenance_orders_id" data-live-search="true">
                                    @foreach ($maintenance as $d)
                                        <option data-tokens="{{ $d->id }}" value="{{ $d->id }}">
                                            {{ $d->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">

                                <label for="recipient-name" class="col-form-label">{{ __('messages.product') }}</label>

                                <select class="form-control selectpicker" id="products_id" name="products_id" data-live-search="true">
                                    @foreach ($product as $d)
                                        <option data-tokens="{{ $d->{'product_name' . localePrefix()} }}" value="{{ $d->id }}">
                                            {{ $d->{'product_name' . localePrefix()} }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-success">{{ __('messages.save') }}</button>

                    </div>
                </div>




            </form>
        </div>
    @endsection

    @section('script')
        <script src="{{ asset('js/bs-select.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
        <script>
            Quagga.init({
                inputStream: {
                    name: "Live",
                    type: "LiveStream",
                    target: document.querySelector("#camera-preview"),
                },
                decoder: {
                    readers: ["code_128_reader", "ean_reader", "ean_8_reader", "code_39_reader", "code_39_vin_reader", "codabar_reader", "upc_reader", "upc_e_reader", "i2of5_reader"],
                },
            });

            Quagga.onDetected(result => {
                const code = result.codeResult.code;
                document.querySelector("#result").textContent = code;

                // Handle the QR code content (e.g., update select elements or send to the server)
            });



            // let scanner = new Instascan.Scanner({
            //     video: document.getElementById('scanner')
            // });
            // scanner.addListener('scan', function(content) {
            //     console.log(content);
            // });
            // Instascan.Camera.getCameras().then(function(cameras) {
            //     if (cameras.length > 0) {
            //         scanner.start(cameras[0]);
            //     } else {
            //         console.error('No cameras found.');
            //     }
            // }).catch(function(e) {
            //     console.error(e);
            // });
            // const scanner = new Instascan.Scanner({
            //     video: document.getElementById('scanner')
            // });

            // scanner.addListener('scan', function(content) {
            //     const [type, id] = content.split(':');

            //     if (type === 'Product_id') {
            //         // Populate the product select with the scanned product ID
            //         document.getElementById('product_id').value = id;
            //         console.log(type);
            //     } else if (type === 'maintenanceOrder') {
            //         // Populate the invoice select with the scanned invoice ID
            //         document.getElementById('maintenance_orders_id').value = id;
            //     }
            // });

            // Instascan.Camera.getCameras()
            //     .then(cameras => {
            //         if (cameras.length > 0) {
            //             scanner.start(cameras[0]);
            //         } else {
            //             console.error('No cameras found.');
            //         }
            //     })
            //     .catch(error => {
            //         console.error(error);
            //     });
        </script>
    @endsection
