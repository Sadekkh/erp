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
                    <form action="{{ route('vehicle.store') }}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="customModalTwoLabel">إضافة شاحنة/سيارة</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="card-body">
                                <div class="row gutters">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <h4>النوع</h4>
                                            <select class="form-control selectpicker" name="vehicle_type_id" data-live-search="true">
                                                @foreach ($vehicletype as $b)
                                                    <option data-tokens="{{ $b->name }}" value="{{ $b->id }}">{{ $b->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <h4>التسمية</h4>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" placeholder="التسمية" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row gutters">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="model" placeholder="الموديل" required="">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <input type="number" min="1900" max="2099" step="1" value="2023" class="form-control" name="year" placeholder="سنة الصنع" required="">
                                        </div>
                                    </div>

                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="number_wheels" placeholder=" عدد العجلات أمامية/خلفية" required="">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="oil_change" placeholder="طاقة إستيعاب الزيت" required="">
                                        </div>
                                    </div>

                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="vin" placeholder="اللوحة المنجمية" required="">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="mileage" placeholder="عدد الأميال" required="">
                                        </div>
                                    </div>

                                </div>


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
                    <th>نوع الشاحنة</th>
                    <th>الشاحنة</th>
                    <th>الموديل</th>
                    <th>تاريخ الصنع</th>
                    <th>عدد العجلات</th>
                    <th>طاقة إستيعاب الزيت</th>
                    <th>عدد الأميال</th>
                    <th>اللوحة المنجمية</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $p)
                    <tr>
                        <td>{{ $p->vehicleType->name }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->model }}</td>
                        <td>{{ $p->year }}</td>
                        <td>{{ $p->number_wheels }}</td>
                        <td>{{ $p->oil_change }}</td>
                        <td>{{ $p->vin }}</td>
                        <td>{{ $p->mileage }}</td>
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
