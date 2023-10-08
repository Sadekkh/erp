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

        @media (min-width: 1200px) {
            .offset-xl-2 {
                margin-left: 0%;
                max-width: 100%
            }
        }

        @page {
            size: landscape;
        }
    </style>
</head>

<body>
    <button class="btn btn-primary" onclick="printInvoices()">Print All Invoices</button>

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
                    <table class="table table-striped" style="width: 100% !important">
                        <thead>
                            <tr>
                                <th>{{ __('messages.garage') }}</th>
                                <th>{{ __('messages.product') }}</th>
                                <th>{{ __('messages.supplier') }}</th>
                                <th>{{ __('messages.stocked_quantity') }}</th>
                                <th>{{ __('messages.left_quantity') }}</th>
                                <th>{{ __('messages.rows') }}</th>
                                <th>{{ __('messages.columns') }}</th>
                                <th>{{ __('messages.serial_num') }}</th>
                                <th>{{ __('messages.reference') }}</th>
                                <th>{{ __('messages.price') }}</th>
                                <th>{{ __('messages.tax') }}</th>
                                <th>{{ __('messages.puchase_date') }}</th>
                                <th>{{ __('messages.expiry_date') }}</th>



                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->garage->{'name' . localePrefix()} }} </td>
                                    <td>{{ $d->product->{'product_name' . localePrefix()} }} </td>
                                    <td>{{ $d->supplier->{'supplier_name' . localePrefix()} }} </td>
                                    <td>{{ $d->stocked_quantity }} </td>
                                    <td>{{ $d->used_quantity }} </td>
                                    <td>{{ $d->rows }} </td>
                                    <td>{{ $d->columns }} </td>
                                    <td>{{ $d->serial_num }} </td>
                                    <td>{{ $d->reference }} </td>
                                    <td>{{ $d->price }} </td>
                                    <td>{{ $d->tax }} </td>
                                    <td>{{ $d->purchase_date }} </td>
                                    <td>{{ $d->expiry_date }} </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">
                    </div>

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
