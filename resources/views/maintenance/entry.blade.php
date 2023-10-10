@extends('layouts.management')
@section('styles')
    <!-- Data Tables -->

    <link rel="stylesheet" href="{{ asset('css/bs-select.css') }}">
@endsection

@section('content')
    <form action="{{ route('maintenance.entry.store') }}" method="post">
        @csrf


        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">{{ __('messages.vehicle') }}</label>

                    <select class="form-control selectpicker" name="vehicle_id" data-live-search="true">
                        @foreach ($vehicle as $d)
                            <option data-tokens="{{ $d->model}},{{$d->vin}}" value="{{ $d->id }}">{{ $d->model}},{{$d->vin}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">{{ __('messages.driver') }}</label>
                    <select class="form-control selectpicker" name="driver_id" data-live-search="true">
                        @foreach ($driver as $d)
                            <option data-tokens="{{ $d->{'name' . localePrefix()} }},{{$d->cin}}" value="{{ $d->id }}">{{ $d->{'name' . localePrefix()} }},{{$d->cin}}</option>
                        @endforeach
                    </select>                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">{{ __('messages.entry_time') }}</label>
                    <input type="datetime-local" id="cal" class="form-control" name="entry_time"  required="">
                </div>
            </div>
            <div class="col">

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
        window.addEventListener('load', () => {
            var now = new Date();
            now.setMinutes(now.getMinutes() - now.getTimezoneOffset());

            /* remove second/millisecond if needed - credit ref. https://stackoverflow.com/questions/24468518/html5-input-datetime-local-default-value-of-today-and-current-time#comment112871765_60884408 */
            now.setMilliseconds(null)
            now.setSeconds(null)

            document.getElementById('cal').value = now.toISOString().slice(0, -1);
        });
    </script>
@endsection
