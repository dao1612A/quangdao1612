@extends('layouts.app_default')
@section('content')
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Book lịch bác sỹ</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">{{ $doctor->name }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="content" style="min-height: 335px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="booking-doc-info">
                                <a href="" class="booking-doc-img">
                                    <img src="{{ pare_url_file($doctor->avatar) }}" alt="{{ $doctor->name }}">
                                </a>
                                <div class="booking-info">
                                    <h4><a href="">{{ $doctor->name }}</a></h4>
                                    @php
                                        $age = render_vote($doctor);
                                    @endphp
                                    <div class="rating">
                                        @for($i = 1 ; $i <= 5; $i ++)
                                            <i class="fas fa-star {{  $i <= $age ? 'filled' : '' }}"></i>
                                        @endfor
                                        <span class="d-inline-block average-rating">({{ $doctor->vote_total }})</span>
                                    </div>
                                    <p class="text-muted mb-0"><i
                                                class="fas fa-map-marker-alt"></i> {{ $doctor->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-sm-3 text-sm-right float-right">
                                <input type="date" name="date" class="form-control" required>
                            </div>
                        </div>
                        <!-- Schedule Widget -->
                        <div class="card booking-schedule schedule-widget">
                            <div class="schedule-cont">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Time Slot -->
                                        <div class="time-slot">
                                            <ul class="clearfix">
                                                @foreach(config('time') as $item)
                                                    <li>
                                                        <a class="timing js-time" href="#" data-key="{{ $item['key'] }}" data-text="{{ $item['text'] }}">
                                                            <span>{{ $item['text'] }}</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <input type="hidden" name="time" id="time" value="">
                                            <input type="hidden" name="time_text" id="time_text" value="">
                                        </div>
                                        <!-- /Time Slot -->
                                    </div>
                                </div>
                            </div>
                            <!-- /Schedule Content -->
                        </div>
                        <!-- /Schedule Widget -->
                        <!-- Submit Section -->
                        <div class="submit-section proceed-btn text-right">
                            <button type="submit" class="btn btn-primary submit-btn">Đặt lịch</button>
                        </div>
                        <!-- /Submit Section -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
