@extends('layouts.management')
@section('styles')
    <!-- Data Tables -->

    <link rel="stylesheet" href="{{ asset('css/bs-select.css') }}">
    <link rel="stylesheet" href="{{ asset('gallery/gallery.css') }}">
@endsection

@section('content')
    <form action="{{ route('products.update', $data->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        @method('PUT')
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{ __('messages.garage') }}</label>
                        <input class="form-control" disabled value="{{ $data->garage->{'name' . localePrefix()} }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{ __('messages.product') }}</label>
                        <input class="form-control" disabled value="{{ $data->product->{'product_name' . localePrefix()} }}">

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{ __('messages.supplier') }}</label>
                        <select class="form-control selectpicker" name="supplier_id" data-live-search="true">
                            @foreach ($supplier as $d)
                                <option data-tokens="{{ $d->{'supplier_name' . localePrefix()} }}" value="{{ $d->id }}" @if ($data->id == $d->id) selected @endif>{{ $d->{'supplier_name' . localePrefix()} }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{ __('messages.quantity_requested') }}</label>
                        <input type="number" class="form-control" id="editedNumber" name="quantity_requested" value="{{ $data->quantity_requested }}" min="0" max="{{ $data->quantity_requested }}">

                        <input type="number" hidden id="actualNumber" value="{{ $data->quantity_requested }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{ __('messages.quantity_given') }}</label>
                        <input class="form-control" disabled value="{{ $data->quantity_given }}">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{ __('messages.manager_decision') }}</label>
                        <input class="form-control" disabled value="{{ $data->manager_decision }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{ __('messages.accounts_decision') }}</label>
                        <input class="form-control" disabled value="{{ $data->manager_decision }}">
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success">{{ __('messages.save') }}</button>

            </div>
        </div>
    </form>
@endsection

@section('script')
    <script src="{{ asset('js/bs-select.min.js') }}"></script>

    <script>
        let actual = $("#actualNumber").val();
        $(function() {
            $("#editedNumber").keydown(function() {
                // Save old value.
                if (!$(this).val() || (parseInt($(this).val()) <= actual && parseInt($(this).val()) >= 0))
                    $(this).data("old", $(this).val());
            });
            $("#editedNumber").keyup(function() {
                // Check correct, else revert back to old value.
                if (!$(this).val() || (parseInt($(this).val()) <= actual && parseInt($(this).val()) >= 0))
                ;
                else
                    $(this).val($(this).data("old"));
            });
        });
    </script>
@endsection
