<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <style>
        body {

            background-color: #000;
        }

        .padding {

            padding: 2rem !important;
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
    <button class="btn btn-primary" onclick="printInvoices()">Print All Invoices</button>
    @foreach ($data as $d)
        @if (!$d->requestItems->isEmpty())
            <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
                <div class="card">
                    <div class="card-header p-4">
                        <a class="pt-2 d-inline-block">{{ _('company_name') }}</a>
                        <div class="float-right">
                            <h3 class="mb-0">{{ __('Invoice') }} </h3>
                            Date: {{ now()->toDateTimeString() }}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <h5 class="mb-3">{{ __('to_garage') }}</h5>
                                <h3 class="text-dark mb-1">{{ $d->{'name' . localePrefix()} }}</h3>
                                <div>{{ $d->{'address' . localePrefix()} }}</div>

                            </div>

                        </div>
                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>{{ __('product') }}</th>
                                        <th>{{ __('supplier') }}</th>
                                        <th>{{ __('price') }}</th>
                                        <th>{{ __('quantity') }}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($d->requestItems as $r)
                                        <tr>
                                            <td class="center"></td>
                                            <td class="left strong">{{ $r->product->{'product_name' . localePrefix()} }}</td>
                                            <td class="left">{{ $r->supplier->{'supplier_name' . localePrefix()} }}-{{ $r->supplier->{'address' . localePrefix()} }}</td>
                                            <td class="right">{{ $r->product->price }}</td>
                                            <td class="center">{{ $r->quantity_requested }}</td>
                                        </tr>
                                    @endforeach


                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-5">
                            </div>

                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <p class="mb-0">BBBootstrap.com, Sounth Block, New delhi, 110034</p>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
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
