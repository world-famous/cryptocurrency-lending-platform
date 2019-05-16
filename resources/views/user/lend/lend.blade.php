@extends('layouts.user')

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="panel panel-inverse">
      <div class="panel-heading">
        <h3 class="panel-title">Lending Package</h3>
      </div>

      <div class="panel-body text-center">
       <ul class="list-group">
        <li class="list-group-item list-group-item-success">Limit: <b> {{$pack->min}} ~  {{$pack->max}}</b> {{$gnl->cursym}}</li>
        <li class="list-group-item list-group-item-info">Return in <b>{{$pack->times}}</b> Times</li>
        <li class="list-group-item list-group-item-warning"><b>{{$pack->ret}}</b> % of investment Return Every Time </li>
        <li class="list-group-item list-group-item-default"><b>{{$pack->total}} %</b> Return of Total  Investment </li>
        <li class="list-group-item list-group-item-success"> Return Period:<b> 
          @if($pack->period == '1') Hourly
          @elseif($pack->period == '24') Daily 
          @elseif($pack->period == '168') Weekly 
          @elseif($pack->period == '720') Monthly 
          @elseif($pack->period == '2880') Quaterly 
          @elseif($pack->period == '8640') Yearly 
          @endif
          ({{$pack->period}} hours)</b>
        </li>
      </ul>
      <form action="{{route('invest.preview')}}" method="POST">
        {{csrf_field()}}

        <div class="form-group">
          <div class="input-group">
            <input placeholder="Enter Lending Amount" type="text" name="amount" class="form-control">
            <span class="input-group-addon">{{$gnl->cursym }}</span>
          </div>
        </div>
        <br/>
        <div class="form-group">
          <button class="btn btn-success btn-block">Lend</button>
        </div>

      </form>
    </div>
  </div>
</div>
<div class="col-md-4">
  <div class="panel panel-inverse">
    <div class="panel-body">
      <h3>Your Baalance: <strong>{{Auth::user()->balance}} {{$gnl->cursym}}</strong></h3>
    </div>
  </div>
</div>
</div>
@endsection
