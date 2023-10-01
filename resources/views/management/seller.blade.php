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
        <h2>المزودين </h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#customModalTwo">
            إضافة مزود
        </button>

        <!-- Modal -->
        <div class="modal fade" id="customModalTwo" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('seller.store') }}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="customModalTwoLabel">إضافة مزود</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">إسم المزود</label>
                                <input type="text" class="form-control" name="supplier_name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">معلومات إضافية</label>
                                <textarea class="form-control" name="contact_info"></textarea>
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
                    <th>إسم المزود</th>
                    <th>معلومات إضافية</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($supplier as $s)
                    <tr>
                        <td>{{ $s->id }}</td>
                        <td>{{ $s->supplier_name }}</td>
                        <td>{{ $s->contact_info }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    <form action="{{ route('seller.store') }}" method="post">
        @csrf
        <div class="card m-0">

            <div class="card-body">


                <div class="row gutters">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="supplier_name" placeholder="إسم المزود" required="">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <textarea class="form-control" name="contact_info" placeholder="معلومات إضافية" maxlength="140" rows="3"></textarea>
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary float-right">إضافة</button>

            </div>
        </div>
    </form>
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
