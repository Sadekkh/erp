@extends('layouts.management')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/bs-select.css') }}">
@endsection

@section('content')
    <form action="{{ route('product.store') }}" method="post">
        @csrf
        <div class="card m-0">

            <div class="card-body">
                <div class="row gutters">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <h4>النوع</h4>
                            <select class="form-control selectpicker" name="brand_id" data-live-search="true">
                                @foreach ($brand as $b)
                                    <option data-tokens="{{ $b->name }}" value="{{ $b->id }}">{{ $b->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <h4>القسم</h4>
                            <select class="form-control selectpicker" name="category_id" data-live-search="true">
                                @foreach ($category as $c)
                                    <option data-tokens="{{ $c->name }}" value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row gutters">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="product_name" placeholder="إسم الصنف" required="">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <textarea class="form-control" name="description" placeholder="معلومات إضافية" maxlength="140" rows="3"></textarea>
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary float-right">إضافة</button>

            </div>
        </div>
    </form>
@endsection
@section('script')
    <script src="{{ asset('js/bs-select.min.js') }}"></script>
@endsection
