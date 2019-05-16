@extends('layouts.user')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="widget widget-stats" style="margin-bottom: 10px; background: linear-gradient(to right, #455A64, #263238);">
      <div class="stats-info">
        <div class="pull-left icon">
          <h4><img src="{{ asset('assets/images/logo/logo.png') }}" class="pull-left" style="width: 80%; margin-right: 10px; filter:invert(1) opacity(1); margin-top: 10px;"></h4>        
        </div>
        <div class="pull-left" style="margin-top: 27px; margin-left: 25px;">
          <p>Your Balance :<strong style="color: #face5c;"> {{number_format(floatval(Auth::user()->balance) , $gnl->decimal, '.', '')}}</strong> {{$gnl->cursym}}</p>
          <p class="f-s-20"><strong>1 {{$gnl->cursym}} = {{number_format(floatval($btcrate) , $gnl->decimal, '.', '')}} USD</strong></p>
        </div>
        <div class="pull-right" style="margin-top: 44px; margin-left: 25px;">
         <a href="{{route('invest.coin')}}" class="btn btn-warning pull-right btn-lg" type="button" style="margin-top: 12px;">
          <i class="fa fa-angle-double-right fa-lg"></i>
          {{$gnl->cursym}} LENDING
          <i class="fa fa-angle-double-right fa-lg"></i>
        </a>
      </div> 
    </div>
  </div>
</div>
</div>
<div class="row">
  <div class="col-md-6 col-sm-6">

      <div class="thumbnail m-b-10">
        <h4>
          BitCoin Wallet ID
        </h4>
        <div class="form-group">
          <div class="input-group">
            <input id="rurl" class="form-control input-lg" value="{{Auth::user()->wallet}}" readonly>
            <span class="btn btn-success input-group-addon" id="cbtn">Copy</span>
          </div>
        </div>
        <!--Copy Data -->
        <script type="text/javascript">
          document.getElementById("cbtn").onclick = function() 
          {
            document.getElementById('rurl').select();
            document.execCommand('copy');
          }
        </script>
      </div>

  </div>
    <div class="col-md-6 col-xs-6">
    <div class="thumbnail m-b-10" >
          <h4>
         Referal Link
        </h4>
      <div class="form-group">
        <div class="input-group">
            <input type="text" class="form-control input-lg" id="rlink" value="{{url('/')}}/register/{{Auth::user()->username}}" readonly>
            <span class="input-group-addon btn btn-success" id="copybtn">Copy</span>
        </div>
         <script type="text/javascript">
          document.getElementById("copybtn").onclick = function() 
          {
            document.getElementById('rlink').select();
            document.execCommand('copy');
          }
        </script>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-3 col-xs-6">
    <div class="thumbnail m-b-10" id="total-investment" style="background: linear-gradient(to right, #f77d00, #bc2b09); border: none; border-radius: 10px;">
      
      <p class="text-center text-white f-s-17"><strong>Active Lending Amount</strong></p>
      <p class="text-center text-white f-s-22 text-inverse"><strong>{{$gnl->cursym}} @if($actinv != null) {{$actinv->amount}} @else 0 @endif</strong></p>
    </div>
  </div>
  <div class="col-md-3 col-xs-6">
    <div class="thumbnail m-b-10" id="active-investment" style="background: linear-gradient(to right, #fec128, #c99106); border: none; border-radius: 10px;">
      <p class="text-center text-white f-s-17"><strong>Every Return Amount</strong></p>
      <p class="text-center text-white f-s-22 text-inverse"><strong>{{$gnl->cursym}} @if($actinv != null) {{$actinv->package->ret*($actinv->amount/100)}}  @else 0 @endif</strong></p>
    </div>
  </div>
  <div class="col-md-3 col-xs-6">
    <div class="thumbnail m-b-10" id="total-investment" style="background: linear-gradient(to right, #f77d00, #bc2b09); border: none; border-radius: 10px;">
      
      <p class="text-center text-white f-s-17"><strong>Returned</strong></p>
      <p class="text-center text-white f-s-22 text-inverse"><strong>@if($actinv != null) {{$actinv->returned}}  @else 0 @endif</strong> Times</p>
    </div>
  </div>
  <div class="col-md-3 col-xs-6">
    <div class="thumbnail m-b-10" id="active-investment" style="background: linear-gradient(to right, #fec128, #c99106); border: none; border-radius: 10px;">
      <p class="text-center text-white f-s-17"><strong>Returned Amount</strong></p>
      <p class="text-center text-white f-s-22 text-inverse"><strong>{{$gnl->cursym}} @if($actinv != null) {{($actinv->package->ret*$actinv->amount/100)*$actinv->returned}}  @else 0 @endif</strong></p>
    </div>
  </div>
</div>
<div class="row">

  <div class="col-md-6 col-xs-6">
    <div class="thumbnail m-b-10" id="total-capital-released" style="background: linear-gradient(to right, #11d202, #0c8603); border: none; border-radius: 10px;">
      <p class="text-center text-white f-s-17"><strong>Next Return Time </strong></p>
      <p class="text-center text-white f-s-22 text-inverse"><strong>@if($actinv != null) {{$actinv->next}}  @else No Lending @endif</strong></p>
    </div>
  </div>

  <div class="col-md-6 col-xs-6">
    <div class="thumbnail m-b-10" id="total-earned" style="background: linear-gradient(to right, #117dd8, #044479); border: none; border-radius: 10px;">
      <p class="text-center text-white f-s-17"><strong>Total Returning Amount</strong></p>
      <p class="text-center text-white f-s-22 text-inverse"><strong>{{$gnl->cursym}} @if($actinv != null){{$actinv->package->total*$actinv->amount/100}}  @else 0 @endif </strong></p>
    </div>
  </div>
</div>

@endsection
