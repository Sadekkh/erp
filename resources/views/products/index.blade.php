@extends('tables')
@section('tablesstyles')
    <style>
        @page {
            size: 10cm 10cm;
            scale: 188;
        }
    </style>
@endsection

@section('tablecontent')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#customModalTwo">
        {{ __('messages.add_new') }}
    </button>
    <div class="table-container">

        <!-- Modal -->
        <div class="modal fade" id="customModalTwo" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="modal-header">
                            <h5 class="modal-title" id="customModalTwoLabel">{{ __('messages.add_product') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('messages.category') }}</label>

                                        <select class="form-control selectpicker" name="category_id" data-live-search="true">
                                            @foreach ($category as $d)
                                                <option data-tokens="{{ $d->{'name' . localePrefix()} }}" value="{{ $d->id }}">{{ $d->{'name' . localePrefix()} }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('messages.price') }}</label>
                                        <input type="number" class="form-control" name="price">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('messages.name_ar') }}</label>
                                        <input type="text" class="form-control" name="product_name_ar">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('messages.name_en') }}</label>
                                        <input type="text" class="form-control" name="product_name_en">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('messages.description_ar') }}</label>
                                        <input type="text" class="form-control" name="description_ar">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('messages.description_en') }}</label>
                                        <input type="text" class="form-control" name="description_en">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="garageImages">{{ __('messages.Product_Images') }}</label>
                                    <input type="file" class="form-control-file" name="image[]" multiple>
                                </div>
                            </div>




                        </div>
                        <div class="modal-footer custom">

                            <div class="left-side">
                                <button type="button" class="btn btn-link danger" data-dismiss="modal">{{ __('messages.cancel') }}</button>
                            </div>
                            <div class="divider"></div>
                            <div class="right-side">
                                <button type="submit" class="btn btn-link success">{{ __('messages.save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="t-header">{{ __('messages.product_management') }}</div>
        <div class="table-responsive">
            <table id="copy-print-csv" class="table custom-table">
                <thead>
                    <tr>
                        <th>{{ __('messages.image') }}</th>
                        <th>{{ __('messages.name') }}</th>
                        <th>{{ __('messages.category') }}</th>
                        <th>{{ __('messages.description') }}</th>
                        <th>{{ __('messages.price') }}</th>
                        <th>{{ __('messages.tax') }}</th>
                        <th>{{ __('messages.total_price') }}</th>
                        <th>{{ __('messages.edit') }}</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td>
                                @if (!$d->media->isEmpty())
                                    <img src="{{ asset('images/products/' . $d->media[0]->file_name) }}" style="width: 4rem">
                                @endif
                            </td>
                            <td>{{ $d->{'product_name' . localePrefix()} }}</td>
                            <td>{{ $d->category->{'name' . localePrefix()} }}</td>
                            <td>{{ $d->{'description' . localePrefix()} }}</td>
                            <td>{{ $d->price }}</td>
                            <td>{{ $d->tax }}</td>
                            <td>
                                {{ $d->price + ($d->price * $d->tax) / 100 }}

                            </td>
                            <td><a href="{{ route('products.edit', $d->id) }}" class="btn btn-primary btn-sm ">{{ __('messages.edit') }}</a>

                                <form action="{{ route('products.destroy', $d->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('messages.Are_you_sure_you_want_to_delete_this_item?') }}')">{{ __('messages.delete') }}</button>
                                </form>
                                <button data-product-id="{{ $d->id }}" class="btn btn-primary generateQRCodeButton">QR Code</button>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
    <a href="print/products">
        <button type="button" class="btn btn-primary">
            {{ __('print') }}
        </button>
    </a>
    <div id="qrcodeDiv" hidden>

    </div>
@endsection

@section('tablescripts')
    <script>
        $(document).ready(function() {
            $(".generateQRCodeButton").click(function() {
                var productId = $(this).data("product-id");

                $.ajax({
                    url: "/products/qrcode/" + productId,
                    type: "GET",
                    success: function(data) {
                        let data2 = data.slice(42);
                        console.log(data)
                        console.log(data2)
                        var img = new Image();

                        // Set the source of the image to the SVG data
                        img.src = 'data:image/svg+xml,' + encodeURIComponent(data2);

                        // Get the div where you want to display the image
                        var qrcodeDiv = document.getElementById('qrcodeDiv');
                        qrcodeDiv.innerHTML = ''; // Clear the div before appending

                        // Append the image to the div
                        qrcodeDiv.appendChild(img);

                        var mywindow = window.open('', 'PRINT', 'height=400,width=600');

                        mywindow.document.write('<html><head><title></title>');
                        mywindow.document.write('<style>');
                        mywindow.document.write('@page { size:4.5cm 4.5cm;scale: 178; }'); // Set the page size to 'auto'
                        mywindow.document.write('</style>');
                        mywindow.document.write('</head><body >');
                        mywindow.document.write(qrcodeDiv.innerHTML);
                        mywindow.document.write('</body></html>');

                        mywindow.document.close();
                        mywindow.focus();

                        mywindow.print();
                        mywindow.close();

                        return true;

                    }

                });
            });

        });
    </script>
@endsection
