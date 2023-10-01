@extends('layouts.management')
@section('styles')
@endsection

<!-- Data Tables -->
<link rel="stylesheet" href="{{ asset('datatables/dataTables.bs4.css') }}" />
<link rel="stylesheet" href="{{ asset('datatables/dataTables.bs4-custom.css') }}" />
<link rel="stylesheet" href="{{ asset('datatables/buttons.bs.css') }}" />
<style>
    h2 {
        text-align: right
    }
</style>


@section('content')
    <div class="container">
        <h2>الأقسام </h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#customModalTwo">
            إضافة قسم
        </button>

        <!-- Modal -->
        <div class="modal fade" id="customModalTwo" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('categories.store') }}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="customModalTwoLabel">إضافة قسم</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">التسمية</label>
                                <input type="text" class="form-control" name="name">
                            </div>


                        </div>
                        <div class="modal-footer custom">

                            <div class="left-side">
                                <button type="button" class="btn btn-link danger" data-dismiss="modal">إلغاء</button>
                            </div>
                            <div class="divider"></div>
                            <div class="right-side">
                                <button type="submit" class="btn btn-link success">حفظ</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <table id="copy-print-csv" class="table custom-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm">تحيين</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="container">
        <h2>الأنواع </h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#customModalTwo1">
            إضافة نوع
        </button>

        <!-- Modal -->
        <div class="modal fade" id="customModalTwo1" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('brands.store') }}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="customModalTwoLabel">إضافة نوع</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">التسمية</label>
                                <input type="text" class="form-control" name="name">
                            </div>


                        </div>
                        <div class="modal-footer custom">

                            <div class="left-side">
                                <button type="button" class="btn btn-link danger" data-dismiss="modal">إلغاء</button>
                            </div>
                            <div class="divider"></div>
                            <div class="right-side">
                                <button type="submit" class="btn btn-link success">حفظ</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <table id="copy-print-csv" class="table custom-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                    <tr>
                        <td>{{ $brand->id }}</td>
                        <td>{{ $brand->name }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $brand->id) }}" class="btn btn-primary btn-sm">تحيين</a>
                            <form action="{{ route('categories.destroy', $brand->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">حذف</button>
                            </form>
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
