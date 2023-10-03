@extends('layouts.management')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/bs-select.css') }}">
@endsection

@section('content')
    <form action="{{ route('maintenance.store') }}" method="post">
        @csrf
        <div class="card m-0">

            <div class="card-body">
                <div class="row gutters">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <h4>الشاحنة</h4>
                            <select class="form-control selectpicker" name="vehicle_id" data-live-search="true">
                                @foreach ($vehicle as $b)
                                    <option data-tokens="{{ $b->name }},{{ $b->name }}" value="{{ $b->id }}">{{ $b->name }},{{ $b->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <h4>السائق</h4>
                            <select class="form-control selectpicker" name="driver_id" data-live-search="true">
                                @foreach ($driver as $c)
                                    <option data-tokens="{{ $c->name }}" value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row gutters">
                    <div class="col">
                        <div class="form-group">
                            <h4>توقيت الدخول</h4>
                            <input type="datetime-local" id="cal" class="form-control" name="entry_time" placeholder="تاريخ الدخول" required="">
                        </div>
                    </div>


                </div>

                <button type="submit" class="btn btn-primary float-right">إضافة</button>

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
