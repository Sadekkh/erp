@extends('tables')
@section('tablesstyles')
@endsection

@section('tablecontent')
    <div class="table-container">


        <div class="t-header">{{ __('garage_management') }}</div>
        <div class="table-responsive">
            <table id="copy-print-csv" class="table custom-table">
                <thead>
                    <tr>
                        <th>{{ __('messages.garage') }}</th>
                        <th>{{ __('messages.product') }}</th>
                        <th>{{ __('messages.supplier') }}</th>
                        <th>{{ __('messages.stocked_quantity') }}</th>
                        <th>{{ __('messages.left_quantity') }}</th>
                        <th>{{ __('messages.rows') }}</th>
                        <th>{{ __('messages.columns') }}</th>
                        <th>{{ __('messages.serial_num') }}</th>
                        <th>{{ __('messages.reference') }}</th>
                        <th>{{ __('messages.price') }}</th>
                        <th>{{ __('messages.tax') }}</th>
                        <th>{{ __('messages.puchase_date') }}</th>
                        <th>{{ __('messages.expiry_date') }}</th>

                        <th>{{ __('messages.edit') }}</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td>{{ $d->garage->{'name' . localePrefix()} }} </td>
                            <td>{{ $d->product->{'product_name' . localePrefix()} }} </td>
                            <td>{{ $d->supplier->{'supplier_name' . localePrefix()} }} </td>
                            <td>{{ $d->stocked_quantity }} </td>
                            <td>{{ $d->used_quantity }} </td>
                            <td>{{ $d->rows }} </td>
                            <td>{{ $d->columns }} </td>
                            <td>{{ $d->serial_num }} </td>
                            <td>{{ $d->reference }} </td>
                            <td>{{ $d->price }} </td>
                            <td>{{ $d->tax }} </td>
                            <td>{{ $d->puchase_date }} </td>
                            <td>{{ $d->expiry_date }} </td>
                            <td><a href="{{ route('stock.edit', $d->id) }}" class="btn btn-primary btn-sm ">{{ __('edit') }}</a>

                                <form action="{{ route('stock.destroy', $d->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('Are_you_sure_you_want_to_delete_this_item?') }}')">{{ __('delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
    <a href="print/stock">
        <button type="button" class="btn btn-primary">
            {{ __('print') }}
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
