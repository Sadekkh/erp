@extends('layouts.management')
@section('styles')
    <!-- Data Tables -->

    <link rel="stylesheet" href="{{ asset('css/bs-select.css') }}">
@endsection

@section('content')
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

            <form action="{{ route('maintenancetask.update', $data->id) }}" method="post">
                @csrf
                @method('PUT')


                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">{{ __('messages.service') }}</label>

                            <select class="form-control selectpicker" id="service_id" name="service_id" data-live-search="true">
                                @foreach ($service as $d)
                                    <option data-tokens="{{ $d->{'name' . localePrefix()} }}" value="{{ $d->id }}" @if ($task->service_id == $d->id) selected @endif>
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
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">{{ __('messages.state') }}</label>

                            <select class="form-control selectpicker" name="status" data-live-search="true">
                                <option @if ($task->status == 'pending') selected @endif value="pending">{{ __('messages.pending') }}</option>
                                <option @if ($task->status == 'in_progress') selected @endif value="in_progress">{{ __('messages.in_progress') }}</option>
                                <option @if ($task->status == 'completed') selected @endif value="completed">{{ __('messages.completed') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">{{ __('messages.description') }}</label>
                            <input type="text" value="{{ $task->description }}" name="description" class="form-control">
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
    @endsection

    @section('script')
        <script src="{{ asset('js/bs-select.min.js') }}"></script>
        <script>
            var worker = {!! json_encode($task->worker_id) !!};
            var locale = '{{ app()->getLocale() }}';
            $(window).on('load', function() {
                let id = $('#service_id').val();
                $.ajax({
                    type: 'GET',
                    url: '/getemployee/' + id,
                    success: function(data) {

                        $('#subcategorySelect').empty();

                        $.each(data, function(index, value) {
                            $('#subcategorySelect').append('<option value="' + value.id + '">' + (locale === 'ar' ? value.name_ar : value.name_en) + '</option>');

                        });
                        $('#subcategorySelect').val(worker);
                        // Refresh the Bootstrap Select plugin to reflect the changes
                        $('#subcategorySelect').selectpicker('refresh');
                    }
                });


            })
        </script>
    @endsection
