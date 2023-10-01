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
                    <th>القسم</th>
                    <th>النوعية</th>
                    <th>الصنف</th>
                    <th>الكمية المشترية</th>
                    <th>الكمية المتبقية</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $p)
                    <tr>
                        <td>{{ $p->category->name }}</td>
                        <td>{{ $p->brand->name }}</td>
                        <td>{{ $p->product_name }}</td>
                        <td>{{ $p->totalQuantity[0]->totalstock }}</td>
                        <td>{{ $p->totalleftQuantity[0]->totalLeftstock }}</td>

                        <td>
                            {{-- <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                            </form> --}}
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
