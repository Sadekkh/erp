@extends('layouts.management')
@section('styles')
    <!-- Data Tables -->
    <link rel="stylesheet" href="{{ asset('datatables/dataTables.bs4.css') }}" />
    <link rel="stylesheet" href="{{ asset('datatables/dataTables.bs4-custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('datatables/buttons.bs.css') }}" />

    <style type="text/css" media="print">
        @page {
            size: auto;
            margin: .5rem 0;
        }
    </style>
@endsection

@section('content')
    <div class="container">



        <table id="copy-print-csv" class="table custom-table">
            <thead>
                <tr>
                    <th>القسم</th>
                    <th>النوعية</th>
                    <th>الصنف</th>
                    <th>الثمن</th>
                    <th>الرقم التسلسلي</th>
                    <th>الكمية المشترات</th>
                    <th>الكمية المتبقية</th>
                    <th>مكان التخزين</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $p)
                    @if (!$p->stock->isEmpty())
                        @foreach ($p->stock as $s)
                            <tr>
                                <td>{{ $p->category->name }}</td>
                                <td>{{ $p->brand->name }}</td>
                                <td>{{ $p->product_name }}</td>
                                <td> {{ $s->price }} </td>
                                <td> {{ $s->serial_num }} </td>
                                <td> {{ $s->stocked_quantity }} </td>
                                <td> {{ $s->used_quantity }} </td>
                                <td> {{ $s->location }} </td>


                                <td>
                                    <button data-product-id="{{ $s->id }}" class="btn btn-primary generateQRCodeButton">QR Code</button>


                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>{{ $p->category->name }}</td>
                            <td>{{ $p->brand->name }}</td>
                            <td>{{ $p->product_name }}</td>
                            <td>غير محدد </td>
                            <td>غير محدد</td>
                            <td>غير محدد</td>
                            <td>غير محدد</td>
                            <td>غير محدد</td>
                            <td></td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script src="{{ asset('datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('datatables/custom/custom-datatables.js') }}"></script>
    <script src="{{ asset('datatables/custom/fixedHeader.js') }}"></script>
    <script src="{{ asset('datatables/buttons.min.js') }}"></script>
    <script src="{{ asset('datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('datatables/html5.min.js') }}"></script>
    <script src="{{ asset('datatables/buttons.print.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".generateQRCodeButton").click(function() {
                var productId = $(this).data("product-id");

                $.ajax({
                    url: "/product/qrcode/" + productId,
                    type: "GET",
                    success: function(data) {
                        var popup = window.open();
                        popup.document.write('<img src="data:image/svg+xml;base64,' + btoa(data) + '" style="width:100%;height:100%;">');
                        popup.document.close();
                        popup.onbeforeunload = function() {
                            popup.close();
                        };
                        popup.onafterprint = function() {
                            popup.close();
                        };
                        popup.focus(); // Required for IE
                        popup.print();

                    },
                    error: function(xhr, status, error) {
                        console.error("Error generating QR code: " + error);
                    }
                });
            });

            // Close the modal when the close button is clicked
            $(".close").click(function() {
                $("#qrCodeModal").hide();
            });

            // Close the modal when clicking outside of it
            $(window).click(function(event) {
                if (event.target == $("#qrCodeModal")[0]) {
                    $("#qrCodeModal").hide();
                }
            });
        });
    </script>
@endsection
