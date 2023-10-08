@extends('tables')
@section('tablesstyles')
@endsection

@section('tablecontent')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#customModalTwo">
        {{ __('add_new') }}
    </button>
    <div class="table-container">

        <!-- Modal -->
        <div class="modal fade" id="customModalTwo" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('requests.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="modal-header">
                            <h5 class="modal-title" id="customModalTwoLabel">{{ __('add_garage') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('garage') }}</label>

                                        <select class="form-control selectpicker" name="garage_id" data-live-search="true">
                                            @foreach ($garage as $d)
                                                <option data-tokens="{{ $d->{'name' . localePrefix()} }}" value="{{ $d->id }}">{{ $d->{'name' . localePrefix()} }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('product') }}</label>

                                        <select class="form-control selectpicker" id="product_id" name="product_id" data-live-search="true">
                                            @foreach ($product as $d)
                                                <option data-tokens="{{ $d->{'product_name' . localePrefix()} }}" value="{{ $d->id }}">{{ $d->{'product_name' . localePrefix()} }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('supplier_suggestion') }}</label>

                                        <select class="form-control" id="suggestions">

                                        </select>

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('supplier') }}</label>
                                        <select class="form-control selectpicker" name="supplier_id" data-live-search="true">
                                            @foreach ($supplier as $d)
                                                <option data-tokens="{{ $d->{'supplier_name' . localePrefix()} }}" value="{{ $d->id }}">{{ $d->{'supplier_name' . localePrefix()} }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('quantity') }}</label>
                                        <input type="number" class="form-control" name="quantity_requested">
                                    </div>
                                </div>

                            </div>





                        </div>
                        <div class="modal-footer custom">

                            <div class="left-side">
                                <button type="button" class="btn btn-link danger" data-dismiss="modal">{{ __('cancel') }}</button>
                            </div>
                            <div class="divider"></div>
                            <div class="right-side">
                                <button type="submit" class="btn btn-link success">{{ __('save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="t-header">{{ __('garage_management') }}</div>
        <div class="table-responsive">
            <table id="copy-print-csv" class="table custom-table">
                <thead>
                    <tr>
                        <th>{{ __('messages.garage') }}</th>
                        <th>{{ __('messages.product') }}</th>
                        <th>{{ __('messages.supplier') }}</th>
                        <th>{{ __('messages.quantity_requested') }}</th>
                        <th>{{ __('messages.quantity_given') }}</th>
                        <th>{{ __('messages.state') }}</th>

                        <th>{{ __('messages.edit') }}</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td>{{ $d->garage->{'name' . localePrefix()} }} </td>
                            <td>{{ $d->product->{'product_name' . localePrefix()} }} </td>
                            <td>{{ $d->supplier->{'supplier_name' . localePrefix()} }} </td>
                            <td>{{ $d->quantity_requested }} </td>
                            <td>{{ $d->quantity_given }} </td>
                            <td>
                                @if ($d->state === 'pending')
                                    <button class="btn btn-warning btn-rounded">{{ __('messages.pending') }}</button>
                                @elseif ($d->state === 'confirmed')
                                    <button class="btn btn-primary btn-rounded">{{ __('messages.confirmed') }}</button>
                                @elseif ($d->state === 'cancelled')
                                    <button class="btn btn-danger btn-rounded">{{ __('messages.cancelled') }}</button>
                                @elseif ($d->state === 'done')
                                    <button class="btn btn-info btn-rounded">{{ __('messages.done') }}</button>
                                @endif
                            </td>

                            <td><a href="{{ route('requests.edit', $d->id) }}" class="btn btn-primary btn-sm ">{{ __('edit') }}</a>

                                <form action="{{ route('requests.destroy', $d->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('Are_you_sure_you_want_to_delete_this_item?') }}')">{{ __('delete') }}</button>
                                </form>
                                <a href="{{ route('stock.show', $d->id) }}" class="btn btn-primary btn-sm ">{{ __('add_stock') }}</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
    <a href="print/all">
        <button type="button" class="btn btn-primary">
            {{ __('print_confirmed') }}
        </button>
    </a>
@endsection

@section('tablescripts')
    <script>
        $(document).ready(function() {
            $('#product_id').on('change', function() {
                var id = $(this).val();

                $.ajax({
                    type: 'GET',
                    url: '/suggestions/' + id,
                    success: function(data) {
                        console.log(data);
                        $('#suggestions').empty();

                        $.each(data, function(index, value) {
                            $('#suggestions').append('<option disabled value="' + value.id + '">' + value.supplier.supplier_name_en + ',' + value.price + '</option>');
                        });

                        // Refresh the Bootstrap Select plugin to reflect the changes
                        $('#suggestions').selectpicker('refresh');
                    }
                });




            });
        });
    </script>
@endsection
