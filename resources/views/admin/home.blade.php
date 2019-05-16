@extends('admin.layout.master')

@section('content')

@php
    $tuser = \App\User::where('status','1')->count();
    $tinvest = \App\Investment::sum('amount');
    $tlend = \App\Investment::count();
    $deposit = \App\Deposit::where('status', 1)->sum('amount');
    $complt = \App\Investment::where('status', 2)->count();
    $withd = \App\Withdraw::where('status', 1)->sum('amount')
@endphp
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Dashboard</span>
        </li>
    </ul>

</div>

<h3 class="page-title"> Dashboard 
    <small>dashboard & statistics </small>
</h3>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12">

        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-users"></i> USERS STATISTICS </div>
                </div>
                <div class="portlet-body text-center">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="dashboard-stat blue">
                                <div class="visual">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{$tuser}}">{{$tuser}}</span>
                                    </div>
                                    <div class="desc"> Total User </div>
                                </div>
                                <a class="more" href="{{route('users')}}"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="dashboard-stat blue">
                                <div class="visual">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" 
                                        data-value="{{$tlend}}">{{$tlend}}</span>
                                    </div>
                                    <div class="desc"> Total Lendings</div>
                                </div>
                                <a class="more" href="{{route('user.lendings')}}"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="dashboard-stat blue">
                                <div class="visual">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{$complt}}">{{$complt}}</span>
                                    </div>
                                    <div class="desc"> Return Complete </div>
                                </div>
                                <a class="more" href="{{route('user.lendings')}}"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-users"></i>Fund Statistics</div>
                    </div>
                    <div class="portlet-body text-center">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="dashboard-stat green">
                                    <div class="visual">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="{{$tinvest}} {{$gnl->cursym}}">{{$tinvest}} {{$gnl->cursym}}</span>
                                        </div>
                                        <div class="desc">Total Lending Amount</div>
                                    </div>
                                    <a class="more" href="{{route('user.lendings')}}"> View more
                                        <i class="m-icon-swapright m-icon-white"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="dashboard-stat green">
                                    <div class="visual">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" 
                                            data-value="{{$deposit}} {{$gnl->cursym}}">{{$deposit}} {{$gnl->cursym}}</span>
                                        </div>
                                        <div class="desc"> Total Deposit Amount </div>
                                    </div>
                                    <a class="more" href="{{route('deposits')}}"> View more
                                        <i class="m-icon-swapright m-icon-white"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="dashboard-stat green">
                                    <div class="visual">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="{{$withd}} {{$gnl->cursym}}">{{$withd}} {{$gnl->cursym}}</span>
                                        </div>
                                        <div class="desc"> Total Withdraw Amount </div>
                                    </div>
                                    <a class="more" href="{{route('withdraw')}}"> View more
                                        <i class="m-icon-swapright m-icon-white"></i>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

@endsection
