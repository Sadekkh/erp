@extends('layouts.management')
@section('styles')
    <!-- Data Tables -->

    <link rel="stylesheet" href="{{ asset('css/bs-select.css') }}">
@endsection

@section('content')
    <label for="recipient-name" class="col-form-label"></label>
    <a href="{{ route('print-maintenance', $data->id) }}"> <button class="btn btn-success">{{ __('messages.print') }}</button></a>
    <div class="row">

        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
            <table class="table">
                <thead>
                    <tr>
                        <td>{{ __('messages.code') }}</td>
                        <td>{{ $data->id }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('messages.model') }}</td>
                        <td>{{ $data->vehicle->model }}</td>
                    </tr>
                </thead>
                <tr>
                    <td>{{ __('messages.year') }}</td>
                    <td>{{ $data->vehicle->year }}</td>
                </tr>
                <tr>
                    <td>{{ __('messages.number_wheels') }}</td>
                    <td>{{ $data->vehicle->number_wheels }}</td>
                </tr>
                <tr>
                    <td>{{ __('messages.oil_change') }}</td>
                    <td>{{ $data->vehicle->oil_change }}</td>
                </tr>
                <tr>
                    <td>{{ __('messages.mileage') }}</td>
                    <td>{{ $data->vehicle->mileage }}</td>
                </tr>
                <tr>
                    <td>{{ __('messages.vin') }}</td>
                    <td>{{ $data->vehicle->vin }}</td>
                </tr>

            </table>
        </div>

        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">

            <form action="{{ route('maintenance.update', $data->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">{{ __('messages.mileage') }}</label>

                            <input type="text" class="form-control" name="mileage" value="{{ $data->vehicle->mileage }}" required="">

                        </div>
                    </div>
                    <div class="col">

                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">{{ __('messages.service') }}</label>

                            <select class="form-control selectpicker" id="service_id" name="service_id" data-live-search="true">
                                @foreach ($service as $d)
                                    <option data-tokens="{{ $d->{'name' . localePrefix()} }}" value="{{ $d->id }}">
                                        {{ $d->{'name' . localePrefix()} }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">{{ __('messages.employee') }}</label>
                            <select class="form-control selectpicker" name="employee_id" id="subcategorySelect" data-live-search="true">
                                <option value="" disabled></option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-success">{{ __('messages.save') }}</button>

                    </div>
                </div>




            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>{{ __('messages.service') }}</th>
                        <th>{{ __('messages.worker') }}</th>
                        <th>{{ __('messages.state') }}</th>
                        <th>{{ __('messages.used_products') }}</th>
                        <th>{{ __('messages.edit') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data->maintenanceTasks as $d)
                        <tr>
                            <td>{{ $d->service->{'name' . localePrefix()} }}</td>
                            <td>{{ $d->worker->{'name' . localePrefix()} }}</td>
                            <td>
                                @if ($d->status === 'pending')
                                    <button class="btn btn-warning btn-rounded">{{ __('messages.pending') }}</button>
                                @elseif ($d->status === 'in_progress')
                                    <button class="btn btn-primary btn-rounded">{{ __('messages.in_progress') }}</button>
                                @elseif ($d->status === 'completed')
                                    <button class="btn btn-primary btn-rounded">{{ __('messages.completed') }}</button>
                                @endif
                            </td>
                            <td></td>
                            <td><a href="{{ route('maintenancetask.edit', $d->id) }}" class="btn btn-primary btn-sm edit-garage">{{ __('messages.edit') }}</a>

                                <form action="{{ route('maintenancetask.destroy', $d->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('messages.Are_you_sure_you_want_to_delete_this_item?') }}')">{{ __('messages.delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection

    @section('script')
        <script src="{{ asset('js/bs-select.min.js') }}"></script>
        <script>
            var locale = '{{ app()->getLocale() }}';
            $(document).ready(function() {
                $('#service_id').on('change', function() {
                    var id = $(this).val();

                    $.ajax({
                        type: 'GET',
                        url: '/getemployee/' + id,
                        success: function(data) {

                            $('#subcategorySelect').empty();

                            $.each(data, function(index, value) {
                                $('#subcategorySelect').append('<option value="' + value.id + '">' + (locale === 'ar' ? value.name_ar : value.name_en) + '</option>');

                            });

                            // Refresh the Bootstrap Select plugin to reflect the changes
                            $('#subcategorySelect').selectpicker('refresh');
                        }
                    });

                });
            });
        </script>
    @endsection
