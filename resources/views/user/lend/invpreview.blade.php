@extends('layouts.user')
@section('content')
<div class="row">
<div class="col-md-8">
<div class="panel panel-inverse">
	<div class="panel-heading">
		<h3 class="panel-title">Confirm Lending {{$gnl->cur}}</h3>
	</div>
	<div class="panel-body">

		<div class="row">
		<div  class="col-md-8 col-md-offset-2 text-center">
			<ul class="list-group">
                <li class="list-group-item list-group-item-success"><h4>Lend amount: <b>{{$amount}}</b> {{$gnl->cursym}}</h4></li>
                <li class="list-group-item list-group-item-warning"><h4>Every Time Return amount: <b>{{$every}}</b> {{$gnl->cursym}}</h4></li>
                <li class="list-group-item list-group-item-info"><h4>Total Return in {{$pack->times}} Times: <b>{{$total}}</b> {{$gnl->cursym}}</h4></li>
            </ul>

			<form method="POST" action="{{route('invest.now')}}">
				{{ csrf_field() }}
				<input type="hidden" name="amount" value="{{$amount}}">
				<button type="submit" class="btn btn-lg btn-primary btn-block">
				Lend Now
				</button>
			</form>
		
		</div>
		</div>
		

	</div>
</div>
</div>
</div>

@endsection