@extends('layouts.management')
@section('styles')
    <style>
        .button-78 {
            width: 90%;
            align-items: center;
            appearance: none;
            background-clip: padding-box;
            background-color: initial;
            background-image: none;
            border-style: none;
            box-sizing: border-box;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            flex-direction: row;
            flex-shrink: 0;
            font-family: Eina01, sans-serif;
            font-size: 16px;
            font-weight: 800;
            justify-content: center;
            line-height: 24px;
            margin: 0;
            min-height: 64px;
            outline: none;
            overflow: visible;
            padding: 19px 26px;
            pointer-events: auto;
            position: relative;
            text-align: center;
            text-decoration: none;
            text-transform: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: middle;

            word-break: keep-all;
            z-index: 0;
        }

        @media (min-width: 768px) {
            .button-78 {
                padding: 19px 32px;
            }
        }

        .button-78:before,
        .button-78:after {
            border-radius: 80px;
        }

        .button-78:before {
            background-image: linear-gradient(92.83deg, #ff7426 0, #f93a13 100%);
            content: "";
            display: block;
            height: 100%;
            left: 0;
            overflow: hidden;
            position: absolute;
            top: 0;
            width: 100%;
            z-index: -2;
        }

        .button-78:after {
            background-color: initial;
            background-image: linear-gradient(#541a0f 0, #0c0d0d 100%);
            bottom: 4px;
            content: "";
            display: block;
            left: 4px;
            overflow: hidden;
            position: absolute;
            right: 4px;
            top: 4px;
            transition: all 100ms ease-out;
            z-index: -1;
        }

        .button-78:hover:not(:disabled):before {
            background: linear-gradient(92.83deg, rgb(255, 116, 38) 0%, rgb(249, 58, 19) 100%);
        }

        .button-78:hover:not(:disabled):after {
            bottom: 0;
            left: 0;
            right: 0;
            top: 0;
            transition-timing-function: ease-in;
            opacity: 0;
        }

        .button-78:active:not(:disabled) {
            color: #ccc;
        }

        .button-78:active:not(:disabled):before {
            background-image: linear-gradient(0deg, rgba(0, 0, 0, .2), rgba(0, 0, 0, .2)), linear-gradient(92.83deg, #ff7426 0, #f93a13 100%);
        }

        .button-78:active:not(:disabled):after {
            background-image: linear-gradient(#541a0f 0, #0c0d0d 100%);
            bottom: 4px;
            left: 4px;
            right: 4px;
            top: 4px;
        }

        .button-78:disabled {
            cursor: default;
            opacity: .24;
        }

        .col {
            padding: 1rem
        }
    </style>
@endsection

@section('content')
    <!-- HTML !-->

    <!-- HTML !-->




    <div class="row ">
        <div class="col"><a href="/vehiclelist"><button class="button-78" role="button">إدارة الشاحنات</button></a></div>
        <div class="col"><a href="/service_employee"><button class="button-78" role="button">الحرفيين والخدمات</button></a></div>
        <div class="col"><a href="{{ route('maintenance') }}"><button class="button-78" role="button">تسجيل دخول/خروج</button></a></div>
    </div>
    <div class="row ">
        <div class="col"><a href="{{ route('maintenance.create') }}"><button class="button-78" role="button">الفحص الفني</button></a></div>
        <div class="col"><a href="{{ route('stock.request.List') }}"><button class="button-78" role="button">متابعة طلبات الشراء</button></a></div>
        <div class="col"><a href="{{ route('product') }}"><button class="button-78" role="button">جرد كافة المخزون</button></a></div>

    </div>
    <div class="row ">
        <div class="col"><a href=""><button class="button-78" role="button">سحب من المخزون</button></a></div>
        <div class="col"><button class="button-78" role="button">متابعة عمليات السحب</button></div>
        <div class="col"></div>

    </div>
    <div class="row ">
        <div class="col"></div>
        <div class="col"><a href="{{ route('categories') }}"><button class="button-78" role="button">الأقسام والأنواع</button></a></div>
        <div class="col"><a href="{{ route('seller.create') }}"><button class="button-78" role="button">المزودين</button></a></div>
        <div class="col"></div>

    </div>
@endsection
