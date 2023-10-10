@extends('layouts.management')
@section('styles')
    <!-- Data Tables -->

    <link rel="stylesheet" href="{{ asset('css/bs-select.css') }}">
@endsection

@section('content')
    <form action="{{ route('stock.update', $data->id) }}" method="post">
        @csrf
        @method('PUT')
        <input type="number" name="request_id" value="{{ $data->id }}" hidden>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{ __('messages.garage') }}</label>
                        <select class="form-control selectpicker" name="garage_id">
                            @foreach ($garage as $d)
                                <option value="{{ $d->id }}" @if ($data->garage_id == $d->id) selected @endif>{{ $d->{'name' . localePrefix()} }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{ __('messages.product') }}</label>
                        <select class="form-control selectpicker" name="product_id">
                            @foreach ($product as $d)
                                <option value="{{ $d->id }}" @if ($data->product_id == $d->id) selected @endif>{{ $d->{'product_name' . localePrefix()} }}</option>
                            @endforeach
                        </select>
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
                        <label for="recipient-name" class="col-form-label">{{ __('messages.quantity') }}</label>
                        <input type="number" disabled class="form-control" name="stocked_quantity" value="{{ $data->stocked_quantity }}" min="0" max="{{ $data->quantity_requested }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{ __('messages.quantity_left') }}</label>
                        <input type="number" class="form-control" name="used_quantity" value="{{ $data->used_quantity }}">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{ __('messages.price') }}</label>
                        <input type="number" class="form-control" name="price" value="{{ $data->price }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{ __('messages.serial_number') }}</label>
                        <input type="text" class="form-control" name="serial_num" value="{{ $data->serial_num }}">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{ __('messages.located_row') }}</label>
                        <input type="number" class="form-control" name="rows" value="{{ $data->rows }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{ __('messages.located_column') }}</label>
                        <input type="text" class="form-control" name="columns" value="{{ $data->columns }}">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{ __('messages.purchase_date') }}</label>
                        <input type="date" class="form-control" name="purchase_date" value="{{ $data->purchase_date }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{ __('messages.expiry_date') }}</label>
                        <input type="date" class="form-control" name="expiry_date" value="{{ $data->expiry_date }}">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{ __('messages.reference') }}</label>
                        <input type="text" class="form-control" name="reference" value="{{ $data->reference }}">
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
