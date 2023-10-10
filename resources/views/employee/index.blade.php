@extends('tables')
@section('tablesstyles')
@endsection

@section('tablecontent')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#customModalTwo">
        {{ __('messages.add_new') }}
    </button>
    <div class="table-container">

        <!-- Modal -->
        <div class="modal fade" id="customModalTwo" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ isset($edit) ? route('employee.update', $edit->id) : route('employee.store') }}" method="post">
                        @csrf
                        @if (isset($edit))
                            @method('PUT')
                        @endif
                        <div class="modal-header">
                            <h5 class="modal-title" id="customModalTwoLabel">{{ __('messages.add_employee') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="row">

                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('messages.garage') }}</label>
                                        <select class="form-control selectpicker" id="garage_id" name="garage_id" data-live-search="true">
                                            @foreach ($garages as $d)
                                                <option data-tokens="{{ $d->{'name' . localePrefix()} }}" value="{{ $d->id }}">{{ $d->{'name' . localePrefix()} }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('messages.service') }}</label>
                                        <select class="form-control selectpicker" id="service_id" name="service_id" data-live-search="true">
                                            @foreach ($service as $d)
                                                <option data-tokens="{{ $d->{'name' . localePrefix()} }}" value="{{ $d->id }}">{{ $d->{'name' . localePrefix()} }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('messages.name_ar') }}</label>
                                        <input type="text" class="form-control" name="name_ar">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('messages.name_en') }}</label>
                                        <input type="text" class="form-control" name="name_en">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('messages.phone') }}</label>
                                        <input type="text" class="form-control" name="phone">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('messages.cin') }}</label>
                                        <input type="number" class="form-control" name="cin">
                                    </div>
                                </div>
                            </div>


                            <div class="modal-footer custom">

                                <div class="left-side">
                                    <button type="button" class="btn btn-link danger" data-dismiss="modal">{{ __('messages.cancel') }}</button>
                                </div>
                                <div class="divider"></div>
                                <div class="right-side">
                                    <button type="submit" class="btn btn-link success">{{ __('messages.save') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="t-header">{{ __('messages.emloyee_management') }}</div>
        <div class="table-responsive">
            <table id="copy-print-csv" class="table custom-table">
                <thead>
                    <tr>
                        <th>{{ __('messages.garage') }}</th>
                        <th>{{ __('messages.service') }}</th>
                        <th>{{ __('messages.name') }}</th>
                        <th>{{ __('messages.phone') }}</th>
                        <th>{{ __('messages.cin') }}</th>

                        <th>{{ __('messages.edit') }}</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td>{{ $d->garage->{'name' . localePrefix()} }}</td>
                            <td>{{ $d->service->{'name' . localePrefix()} }}</td>
                            <td>{{ $d->{'name' . localePrefix()} }}</td>
                            <td>{{ $d->phone }}</td>
                            <td>{{ $d->cin }}</td>




                            <td><a href="#" class="btn btn-primary btn-sm edit-garage" data-toggle="modal" data-target="#customModalTwo" data-id="{{ $d->id }}">{{ __('messages.edit') }}</a>

                                <form action="{{ route('employee.destroy', $d->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('messages.Are_you_sure') }}')">{{ __('messages.delete') }}</button>
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
                var id = $(this).data('id');

                // Make an AJAX request to fetch garage details
                $.ajax({
                    url: '/employee/' + id + '/edit',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        // Populate the modal with garage details
                        $('#customModalTwoLabel').html('{{ __('messages.edit_employee') }}');
                        $('form').attr('action', '/employee/' + id);
                        $('form').append('<input type="hidden" name="_method" value="PUT">');
                        $('input[name="garage_id"]').val(data.garages_id);
                        $('input[name="service_id"]').val(data.service_id);
                        $('input[name="name_ar"]').val(data.name_ar);
                        $('input[name="name_en"]').val(data.name_en);
                        $('input[name="cin"]').val(data.cin);
                        $('input[name="phone"]').val(data.phone);



                    },
                    error: function() {
                        // Handle error if necessary
                        alert('Error fetching details.');
                    }
                });
            });
        });
    </script>
@endsection
