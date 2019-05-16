@extends('layouts.user')
@section('content')

<div class="row">
  <div class="panel panel-inverse">
    <div class="panel-heading text-center">
      <h4 class="panel-title">My {{$gnl->cur}} Investment Returns</h4>
    </div>
    <div class="panel-body">
     <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-body">
          <table class="table table-responsive table-striped">
            <thead>
              <tr>
                <th>
                  Transaction ID
                </th>
                <th>
                  Transaction Time
                </th>
                <th>
                 Return Amount
                </th>
              </tr>
            </thead>
            <tbody>
             @foreach($rlogs as $rlog)
             <tr>
              <td>
                {{ $rlog->trxid }} 
              </td>
              <td>
                {{$rlog->trxtime }}
              </td>
              <td>
                {{$rlog->amount}} {{$gnl->cursym}}
              </td>
           </tr>
           @endforeach
         </tbody>
       </table>

     </div>
   </div>
 </div>

</div>

</div>

</div>
@endsection
