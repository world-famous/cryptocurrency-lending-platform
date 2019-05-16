@extends('admin.layout.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-list font-dark"></i>
                    <span class="caption-subject bold uppercase">User Lendings</span>
                </div>

            </div>
            <div class="portlet-body">

                <table class="table table-striped table-bordered table-hover order-column">
                <thead>
                    <tr>
                        <th>
                            User
                        </th>
                        <th>
                             Amount
                        </th>
                        <th>
                            Returned
                        </th>
                        <th>
                            Status
                        </th>
                  	 </tr>
                </thead>
                <tbody>
		 	@foreach($invests as $inv)
                     <tr>
                     	<td>
                        	{{$inv->user->username}}
                        </td>
                        <td>
                            {{$inv->amount}} {{$gnl->cursym}}    
                        </td>
                        <td>
                            {{$inv->returned}} Times    
                        </td> 
                        <td>
                        <span class="btn {{$inv->status == 1 ? 'btn-success' : 'btn-warning'}}">{{$inv->status == 1 ? 'Active' : 'Completed'}}</span>
                        </td>
                     </tr>
 			@endforeach 
 			<tbody>
           </table>
        </div>
			
			</div><!-- row -->
			</div>
		</div>
	</div>		
</div>
@endsection