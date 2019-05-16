@extends('layouts.user')
@section('content')

<div class="row">
  <div class="panel panel-inverse" style="background: linear-gradient(to right, #40a5e5, #196391); padding-top: 25px; padding-left: 15px; padding-right: 17px; padding-bottom: 25px;">
    <div class="panel-heading text-center">
      <h4 class="panel-title">My {{$gnl->cur}} Investments</h4>
    </div>
    <div class="panel-body">
     <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-body">
          <table class="table table-responsive table-striped">
            <thead>
              <tr>
                <th>
                  Amount
                </th>
                <th>
                 Every Return Amount
                </th>
                <th>
                 Return Times
                </th>
                <th>
                 Total Return
                </th>
                <th>
                 Status
                </th>
              </tr>
            </thead>
            <tbody>
             @foreach($myinvests as $inv)
             <tr>
              <td>
                {{$inv->amount }} {{$gnl->cursym}}
              </td>
              <td>
                {{$inv->package->ret*$inv->amount/100}} {{$gnl->cursym}}
              </td>
              <td>
                {{$inv->package->times}}
              </td>
              <td>
                {{$inv->package->total*$inv->amount/100}} {{$gnl->cursym}}
              </td>
               <td>
                <span class="btn {{$inv->status == 1 ? 'btn-success' : 'btn-warning'}}">{{$inv->status == 1 ? 'Active' : 'Completed'}}</span>
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
