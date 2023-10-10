@extends('layouts.management')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/bs-select.css') }}">
@endsection

@section('content')
    <form action="{{ route('maintenance.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">

            </div>
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">

                <div class="card m-0">

                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <h4>الشاحنة</h4>
                                    <select class="form-control selectpicker" name="vehicle_id" id="vehicleSelect" data-live-search="true">
                                        @foreach ($vehicle as $b)
                                            <option data-tokens="{{ $b->name }},{{ $b->name }}" value="{{ $b->id }}">{{ $b->name }},{{ $b->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <a href="#" id="viewDetailsButton"><button class="btn btn-info">عرض التفاصيل</button></a>

                            </div>
                        </div>





                    </div>
                    <button type="submit" class="btn btn-primary float-right">إضافة</button>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script src="{{ asset('js/bs-select.min.js') }}"></script>
    <script>
        // Get references to the select and button elements
        var vehicleSelect = document.getElementById('vehicleSelect');
        var viewDetailsButton = document.getElementById('viewDetailsButton');

        // Add a click event listener to the button
        viewDetailsButton.addEventListener('click', function(event) {
            // Prevent the default behavior of the link
            event.preventDefault();
            var selectedId = vehicleSelect.value;

            // Construct the URL with the selected ID
            var url = "{{ route('maintenance.edit', ':id') }}".replace(':id', selectedId);

            // Redirect to the constructed URL
            window.location.href = url;
        });
    </script>
@endsection
