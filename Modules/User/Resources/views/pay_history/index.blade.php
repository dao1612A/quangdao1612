@extends('layouts.app_user')
@section('css')
    <style>
        .sg ins {
            margin: auto;
        }
        <?php $style = file_get_contents('assets/css/user.min.css');echo $style;?>
    </style>
@stop
@section('content-fluid')
    <section class="breadcrumb" style="padding: 0">
        <div class="container breadcrumb-content">
            <ul>
                <li><a href="/" title="Conha.vn">Trang chủ <i class="fa fa-angle-right"></i></a></li>
                <li><span>Quản lý vé đặt</span></li>
            </ul>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="users">
                {{--               @include('user::components._inc_nav_user')--}}
                <div class="users-sidebars">
                    @include('guest::components._inc_guest_sidebar')
                </div>
                <div class="users-content">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th >#</th>
                                <th style="width: 15%">Volatility</th>
                                <th class="text-center">Total Money</th>
                                <th class="text-center">Time</th>
                                <th class="text-center">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payHistories as $pay)
                                <tr>
                                    <th scope="row">#{{ $pay->id }}</th>
                                    @if ($pay->ph_credit)
                                        <th class="text-center">
                                            <span class="manage-money">
                                                <i class="fa fa-long-arrow-up"></i>{{ number_format($pay->ph_credit,0,',','.') }} <sup>đ</sup>
                                            </span>
                                        </th>
                                    @else
                                        <th class="text-center">
                                            <span class="manage-money">
                                                <i class="fa fa-long-arrow-down"></i>{{ number_format($pay->ph_debit,0,',','.') }} <sup>đ</sup>
                                            </span>
                                        </th>
                                    @endif
                                    <th>
                                        {{ number_format($pay->ph_balance,0,',','.') }} đ
                                    </th>
                                    <th>{{  $pay->created_at }}</th>
                                    <th>
                                        <span><i class="fa fa-circle"></i> Success</span>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $payHistories->links('vendor/pagination/default') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop