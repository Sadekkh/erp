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
        <h2>أنواع الشاحنات/السيارات </h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#customModalTwo">
            إضافة نوع
        </button>

        <!-- Modal -->
        <div class="modal fade" id="customModalTwo" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('vehicletype.store') }}" method="post">
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
                    <th>#</th>
                    <th>التسمية</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->name }}</td>
                        <td>
                            {{-- <form action="{{ route('categories.destroy', $p->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">حذف</button>
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
