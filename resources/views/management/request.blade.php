@extends('layouts.management')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/bs-select.css') }}">
    <style>
        h4 {
            text-align: right !important
        }
    </style>
@endsection

@section('content')
    <form action="{{ route('stock.request.store') }}" method="post">
        @csrf
        <div class="card m-0">

            <div class="card-body">
                <div class="row gutters">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <h4>الصنف</h4>
                            <select class="form-control selectpicker" name="product_id" data-live-search="true">
                                @foreach ($product as $b)
                                    <option data-tokens="{{ $b->product_name }}" value="{{ $b->id }}">{{ $b->product_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <h4>المزود</h4>
                            <select class="form-control selectpicker" name="supplier_id" data-live-search="true">
                                @foreach ($supplier as $s)
                                    <option data-tokens="{{ $s->supplier_name }}" value="{{ $s->id }}">{{ $s->supplier_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <div class="row gutters">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <h4>الكمية المطلوبة</h4>
                            <input type="number" class="form-control" name="quantity_requested" placeholder="الكمية" required="">
                        </div>
                    </div>

                </div>



            </div>

            <button type="submit" name="submit" class="btn btn-primary float-right">إضافة</button>

        </div>
    </form>
@endsection
@section('script')
    <script src="{{ asset('js/bs-select.min.js') }}"></script>
@endsection
