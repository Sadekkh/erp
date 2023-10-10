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
                    <form action="{{ route('vehicle.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="modal-header">
                            <h5 class="modal-title" id="customModalTwoLabel">{{ __('messages.add_vehicle') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('messages.vehicle_type') }}</label>
                                        <select class="form-control selectpicker" id="vehicle_type_id" name="vehicle_type_id" data-live-search="true">
                                            @foreach ($vehicleTypes as $d)
                                                <option data-tokens="{{ $d->{'name' . localePrefix()} }}" value="{{ $d->id }}">{{ $d->{'name' . localePrefix()} }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('messages.model') }}</label>
                                        <input type="text" class="form-control" name="model">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('messages.year') }}</label>
                                        <input type="number" min="1900" max="2099" step="1" value="2023" class="form-control" name="year" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('messages.number_wheels') }}</label>
                                        <input type="text" class="form-control" name="number_wheels">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('messages.oil_change') }}</label>
                                        <input type="number" class="form-control" name="oil_change">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('messages.vin') }}</label>
                                        <input type="text" class="form-control" name="vin">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">{{ __('messages.mileage') }}</label>
                                        <input type="number" class="form-control" name="mileage">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="garageImages">{{ __('messages.image') }}</label>
                                    <input type="file" class="form-control-file" name="image[]" multiple>
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
        <div class="t-header">{{ __('messages.vehicle_management') }}</div>
        <div class="table-responsive">
            <table id="copy-print-csv" class="table custom-table">
                <thead>
                    <tr>
                        <th>{{ __('messages.vehicle_type') }}</th>
                        <th>{{ __('messages.model') }}</th>
                        <th>{{ __('messages.year') }}</th>
                        <th>{{ __('messages.number_wheels') }}</th>
                        <th>{{ __('messages.oil_change') }}</th>
                        <th>{{ __('messages.vin') }}</th>
                        <th>{{ __('messages.mileage') }}</th>
                        <th>{{ 'edit' }}</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td>{{ $d->vehicleType->{'name' . localePrefix()} }}</td>
                            <td>{{ $d->model }}</td>
                            <td>{{ $d->year }}</td>
                            <td>{{ $d->number_wheels }}</td>
                            <td>{{ $d->oil_change }}</td>
                            <td>{{ $d->vin }}</td>
                            <td>{{ $d->mileage }}</td>



                            <td><a href="{{ route('vehicle.edit', $d->id) }}" class="btn btn-primary btn-sm" >{{ __('messages.edit') }}</a>

                                <form action="{{ route('vehicle.destroy', $d->id) }}" method="POST" style="display: inline;">
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
    </div>
@endsection

@section('tablescripts')

@endsection
