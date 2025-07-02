@extends('admin.layouts.base')




@section('content')

<div class="content">

    <x-admin.content-header :title="__('admin.title.dashboard')" />



    <div class="content-box">

        <div class="dashboard__items">

            <div class="dashboard__item">
                <h4 class="dashboard__item-title">{{ __('admin.dashboard.blockings') }}</h4>
                <div class="dashboard-box">
                    <div class="dashboard-box__item">
                        <span class="dashboard-box__item-text">{{ __('total:') }}</span>
                        <span class="dashboard-box__item-num">{{ $info['blockings'] }}</span>
                    </div>
                </div>
            </div>
            <div class="dashboard__item">
                <h4 class="dashboard__item-title">{{ __('admins') }}</h4>
                <div class="dashboard-box">
                    <div class="dashboard-box__item">
                        <span class="dashboard-box__item-text">{{ __('total:') }}</span>
                        <span class="dashboard-box__item-num">{{ $info['admins'] }}</span>
                    </div>
                </div>
            </div>
            <div class="dashboard__item">
                <h4 class="dashboard__item-title">{{ __('users') }}</h4>
                <div class="dashboard-box">
                    <div class="dashboard-box__item">
                        <span class="dashboard-box__item-text">{{ __('total:') }}</span>
                        <span class="dashboard-box__item-num">{{ $info['users'] }}</span>
                    </div>
                </div>
            </div>

            <div class="dashboard__item">
                <h4 class="dashboard__item-title">{{ __('feedback') }}</h4>
                <div class="dashboard-box">
                    <div class="dashboard-box__item">
                        <span class="dashboard-box__item-text">{{ __('total:') }}</span>
                        <span class="dashboard-box__item-num">{{ $info['feedback'] }}</span>
                    </div>
                </div>
            </div>
            <div class="dashboard__item">
                <h4 class="dashboard__item-title">{{ __('secrets') }}</h4>
                <div class="dashboard-box">
                    <div class="dashboard-box__item">
                        <span class="dashboard-box__item-text">{{ __('total:') }}</span>
                        <span class="dashboard-box__item-num">{{ $info['secrets'] }}</span>
                    </div>               
                    {{-- <div class="dashboard-box__item">
                        <span class="dashboard-box__item-text">{{ __('all total:') }}</span>
                        <span class="dashboard-box__item-num">{{ $info['secrets']['all_total'] }}</span>
                    </div>                --}}
                </div>
            </div>


        </div>


    </div>


</div>

@endsection