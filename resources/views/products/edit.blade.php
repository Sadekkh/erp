@extends('layouts.management')
@section('styles')
    <!-- Data Tables -->

    <link rel="stylesheet" href="{{ asset('css/bs-select.css') }}">
    <link rel="stylesheet" href="{{ asset('gallery/gallery.css') }}">
@endsection

@section('content')
    <form action="{{ route('products.update', $data->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        @method('PUT')

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">{{ __('messages.category') }}</label>

                    <select class="form-control selectpicker" name="category_id" data-live-search="true">
                        @foreach ($category as $d)
                            <option @if ($d->id == $data->id) selected @endif data-tokens="{{ $d->{'name' . localePrefix()} }}" value="{{ $d->id }}">{{ $d->{'name' . localePrefix()} }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">{{ __('messages.price') }}</label>
                    <input type="text" class="form-control" value="{{ $data->price }}" name="price">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">{{ __('messages.name_ar') }}</label>
                    <input type="text" class="form-control" value="{{ $data->product_name_ar }}" name="product_name_ar">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">{{ __('messages.name_en') }}</label>
                    <input type="text" class="form-control" value="{{ $data->product_name_en }}" name="product_name_en">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">{{ __('messages.address_ar') }}</label>
                    <input type="text" class="form-control" value="{{ $data->description_ar }}" name="description_ar">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">{{ __('messages.address_en') }}</label>
                    <input type="text" class="form-control" value="{{ $data->description_en }}" name="description_en">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="garageImages">{{ __('messages.Images') }}</label>
                <input type="file" class="form-control-file" name="image[]" multiple>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success">{{ __('messages.save') }}</button>

            </div>
        </div>




    </form>
    <div class="baguetteBoxThree gallery">
        <div class="row gutters">
            @foreach ($images as $i)
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
                    <a href="{{ asset('images/products/' . $i->file_name) }}" class="effects">
                        <img src="{{ asset('images/products/' . $i->file_name) }}" class="img-fluid" alt="Wafi Admin">
                        <div class="overlay">
                            <span class="expand">+</span>
                        </div>
                    </a>
                    <form action="{{ route('products.destroyimages', $i->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('messages.Are_you_sure_you_want_to_delete_this_item?') }}')">{{ __('messages.delete') }}</button>
                    </form>
                </div>
            @endforeach
        </div>
        <!-- Row end -->
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/bs-select.min.js') }}"></script>
    <script src="{{ asset('gallery/baguetteBox.js') }}" async></script>
    <script src="{{ asset('gallery/plugins.js') }}" async></script>
    <script src="{{ asset('gallery/custom-gallery.js') }}" async></script>
@endsection
