@extends('layouts.user')

@section('content')
<div class="row">
<div class="col-md-12">
  <div class="panel panel-inverse" data-sortable-id="index-1">
    <div class="panel-heading">
      <h4 class="panel-title">{{$gnl->cur}} Deposit Log</h4>
    </div>
    <div class="panel-body table-responsive">
     <table class="table table-striped">
      <thead>
                    <tr>
                        <th>
                            Deposit ID 
                        </th>
                        <th>
                            Amount
                        </th>
                        <th>
                            Processed on
                        </th>
                     </tr>
                </thead>
                <tbody>
            @foreach($depos as $dep)
                     <tr>
                        <td>
                            {{$dep->trxid}}     
                        </td>
                        <td>
                             {{$dep->amount}} {{$gnl->cursym}}
                        </td>
                        <td>
                            {{$dep->updated_at}}
                        </td>
                      </tr>
            @endforeach 
            <tbody>
     </table>
     <?php echo $depos->render(); ?>
   </div>
 </div>
</div>   
</div>


@endsection
