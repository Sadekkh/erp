@extends('layouts.management')
@section('styles')
@endsection

<!-- Data Tables -->
<link rel="stylesheet" href="{{ asset('datatables/dataTables.bs4.css') }}" />
<link rel="stylesheet" href="{{ asset('datatables/dataTables.bs4-custom.css') }}" />
<link rel="stylesheet" href="{{ asset('datatables/buttons.bs.css') }}" />



@section('content')
    <div class="container">



        <table id="copy-print-csv" class="table custom-table">
            <thead>
                <tr>
                    <th>الصنف</th>
                    <th>المزود</th>
                    <th>الكمية</th>
                    <th>تاريخ الطلب</th>
                    <th>الحالة</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $p)
                    <tr>
                        <td>{{ $p->product->product_name }}</td>
                        <td>{{ $p->supplier->supplier_name }}</td>
                        <td>{{ $p->quantity_requested }}</td>
                        <td>{{ $p->created_at }}</td>
                        <td>
                            @if ($p->state === 'pending')
                                <button class="btn btn-warning btn-rounded">في إنتظار الموافقة</button>
                            @elseif ($p->state === 'confirmed')
                                <button class="btn btn-primary btn-rounded">تمت الموافقة</button>
                            @elseif ($p->state === 'cancelled')
                                <button class="btn btn-danger btn-rounded">ملغى</button>
                            @elseif ($p->state === 'done')
                                <button class="btn btn-info btn-rounded">تمت عملية الشراء</button>
                            @endif
                        </td>


                        <td>

                            @if ($p->state === 'pending')
                                <form action="{{ route('stock.request.accept', $p->id) }}" method="POST" style="display: inline;">
                                    @csrf

                                    <button type="submit" class="btn btn-success btn-rounded">الموافقة</button>
                                </form>
                                <form action="{{ route('stock.request.refuse', $p->id) }}" method="POST" style="display: inline;">
                                    @csrf

                                    <button type="submit" class="btn btn-danger btn-rounded">إلغاء</button>
                                </form>
                            @elseif ($p->state === 'confirmed')
                                <form action="{{ route('stock.request.done', $p->id) }}" method="POST" style="display: inline;">
                                    @csrf

                                    <button type="submit" class="btn btn-info btn-rounded">تم الشراء</button>
                                </form>
                            @endif
                        </td>
                    </tr>
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
@endsection
