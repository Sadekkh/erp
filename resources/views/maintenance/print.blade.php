<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" @if (app()->isLocale('ar')) dir="rtl" @endif>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <style>
        body {

            background-color: #000;
        }


        .card {
            margin-bottom: 30px;
            border: none;
            -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
            -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
            box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #e6e6f2;
        }

        h3 {
            font-size: 20px;
        }

        h5 {
            font-size: 15px;
            line-height: 26px;
            color: #3d405c;
            margin: 0px 0px 15px 0px;
            font-family: 'Circular Std Medium';
        }

        .text-dark {
            color: #3d405c !important;
        }
    </style>
</head>

<body>
    <button class="btn btn-primary" onclick="printInvoices()">{{ __('messages.print') }}</button>

    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
        <div class="card">
            <div class="card-header p-4">
                <a class="pt-2 d-inline-block"> {{ __('messages.company_name') }}</a>
                <div class="float-right">
                    <h3 class="mb-0">{{ __('messages.stock_state') }} </h3>
                    {{ __('messages.Date:') }} {{ now()->toDateTimeString() }}
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive-sm">
                    <div class="row">
                        <div class="col-9">
                            <table class="table">
                                <thead>
                                    <td>{{ __('messages.model') }}</td>
                                    <td>{{ $data->vehicle->model }}</td>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>{{ __('messages.year') }}</td>
                                    <td>{{ $data->vehicle->year }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('messages.number_wheels') }}</td>
                                    <td>{{ $data->vehicle->number_wheels }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('messages.oil_change') }}</td>
                                    <td>{{ $data->vehicle->oil_change }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('messages.mileage') }}</td>
                                    <td>{{ $data->vehicle->mileage }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('messages.vin') }}</td>
                                    <td>{{ $data->vehicle->vin }}</td>
                                </tr>

                            </table>
                        </div>
                        <div class="col-3">
                            <img src="data:image/svg+xml;base64,{{ base64_encode($qr) }}" alt="QR Code">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>{{ __('messages.service') }}</th>
                                <th>{{ __('messages.worker') }}</th>
                                <th colspan="4">{{ __('messages.notes') }}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->maintenanceTasks as $d)
                                <tr>
                                    <td>{{ $d->service->{'name' . localePrefix()} }}</td>
                                    <td>{{ $d->worker->{'name' . localePrefix()} }}</td>

                                    <td colspan="4"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script>
        function printInvoices() {
            var cards = document.querySelectorAll('.card'); // Select all elements with class 'card'
            var originalContents = document.body.innerHTML;

            // Loop through each card and print it
            cards.forEach(function(card) {
                var printContents = card.innerHTML;
                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
            });
        }
    </script>
</body>

</html>
