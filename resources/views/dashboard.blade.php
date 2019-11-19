@extends('adminlte::page')

@section('title', 'Dashboard - MembershipCTL')

@section('content_header')
    <h1>{{ __('Dashboard') }} <small>{{ __('Version') }} 2.0</small></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fas fa-fw fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">{{ __('Associates') }}</span>
                    <span class="info-box-number">{{ $associatesCount }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="far fa-fw fa-calendar-check"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">{{ __('Events') }}</span>
                    <span class="info-box-number">{{ $eventsCount }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fas fa-fw fa-clipboard-list"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">{{ __('Reservations') }}</span>
                    <span class="info-box-number">{{ $reservationsCount }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-orange"><i class="fas fa-fw fa-fire-alt"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">{{ __('Attractions') }}</span>
                    <span class="info-box-number">{{ $attractionsCount }}</span>
                </div>
            </div>
        </div>
    </div>
@stop
