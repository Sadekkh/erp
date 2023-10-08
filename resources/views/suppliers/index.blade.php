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
                    <form action="{{ isset($edit) ? route('suppliers.update', $edit->id) : route('suppliers.store') }}" method="post">
                        @csrf
                        @if (isset($edit))
                            @method('PUT')
                        @endif
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
                                        <label for="recipient-name" class="col-form-label">{{ __('name_ar') }}</label>
                                        <input type="text" class="form-control" name="supplier_name_ar">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('name_en') }}</label>
                                        <input type="text" class="form-control" name="supplier_name_en">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('address_ar') }}</label>
                                        <input type="text" class="form-control" name="address_ar">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('address_en') }}</label>
                                        <input type="text" class="form-control" name="address_en">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('phone') }}</label>
                                        <input type="text" class="form-control" name="phone">
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
                        <th>{{ 'name' }}</th>
                        <th>{{ 'phone' }}</th>
                        <th>{{ 'address' }}</th>

                        <th>{{ 'edit' }}</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td>{{ $d->{'supplier_name' . localePrefix()} }}</td>
                            <td>{{ $d->phone }}</td>
                            <td>{{ $d->{'address' . localePrefix()} }}</td>

                            <td><a href="#" class="btn btn-primary btn-sm edit-garage" data-toggle="modal" data-target="#customModalTwo" data-id="{{ $d->id }}">{{ __('edit') }}</a>

                                <form action="{{ route('suppliers.destroy', $d->id) }}" method="POST" style="display: inline;">
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
@endsection

@section('tablescripts')
    <!-- Add this script to your view -->

    <script>
        $(document).ready(function() {
            // Handle click event on "Edit" button
            $('.edit-garage').click(function(e) {
                e.preventDefault();

                // Get the garage ID from the data-id attribute
                var garageId = $(this).data('id');

                // Make an AJAX request to fetch garage details
                $.ajax({
                    url: '/suppliers/' + garageId + '/edit',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Populate the modal with garage details
                        $('#customModalTwoLabel').html('{{ __('edit_garage') }}');
                        $('form').attr('action', '/garages/' + garageId);
                        $('form').append('<input type="hidden" name="_method" value="PUT">');
                        $('input[name="supplier_name_ar"]').val(data.supplier_name_ar);
                        $('input[name="supplier_name_en"]').val(data.supplier_name_en);
                        $('input[name="address_ar"]').val(data.address_ar);
                        $('input[name="address_en"]').val(data.address_en);
                        $('input[name="phone"]').val(data.phone);
                    },
                    error: function() {
                        // Handle error if necessary
                        alert('Error fetching garage details.');
                    }
                });
            });
        });
    </script>
@endsection
