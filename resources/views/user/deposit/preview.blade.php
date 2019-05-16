@extends('layouts.user')
@section('content')
<div class="row">
<div class="col-md-8">
<div class="panel panel-inverse">
	<div class="panel-heading">
		<h3 class="panel-title">Confirm Deposit {{$gnl->cur}}</h3>
	</div>
	<div class="panel-body">

		<div class="row">
		<div  class="col-md-8 col-md-offset-2 text-center">
			<ul class="list-group">
				<li class="list-group-item list-group-item-info"><h4>Your Current Balance: {{Auth::user()->balance}} {{$gnl->cursym}}</h4></li>
                <li class="list-group-item list-group-item-success"><h4>Deposit amount: <b>{{$bcoin}}</b> {{$gnl->cursym}}</h4></li>
                 <li class="list-group-item list-group-item-info"><h4>Your Balance After Deposit: {{Auth::user()->balance+$bcoin}} {{$gnl->cursym}}</h4></li>
             
            </ul>

			<p>{!! $form !!}</p>
		
		</div>
		</div>
		

	</div>
</div>
</div>
</div>

@endsection