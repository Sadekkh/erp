@extends('layouts.management')
@section('styles')
    <style>
        .button-63 {
            align-items: center;
            background-image: linear-gradient(144deg, #AF40FF, #5B42F3 50%, #00DDEB);
            border: 0;
            border-radius: 8px;
            box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
            box-sizing: border-box;
            color: #FFFFFF;
            display: flex;
            font-family: Phantomsans, sans-serif;
            font-size: 20px;
            justify-content: center;
            line-height: 1em;
            width: 100%;
            height: 100%;
            padding: 19px 24px;
            text-decoration: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            white-space: nowrap;
            cursor: pointer;
        }

        .button-63:active,
        .button-63:hover {
            outline: 0;
        }

        @media (min-width: 768px) {
            .button-63 {
                font-size: 24px;
                min-width: 196px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">


        <a class="ml-1 underline ml-2 mr-2" href="{{ route('change_locale', 'ar') }}">
            <span>arabic</span>
        </a>
        <a class="ml-1 underline ml-2 mr-2" href="{{ route('change_locale', 'en') }}">
            <span>english</span>
        </a>

    </div>
    <!-- HTML !-->
    <div class="row" style="height: 15rem">
        <div class="col"><a href="/stocks"><button class="button-63" role="button">{{ __('messages.garage_manager') }}</button></a></div>
        <div class="col"><a href="/service"><button class="button-63" role="button">إدارة المستودع</button></a>
        </div>
    </div>
@endsection
