<section id="other-services">
        <div class="container">
            <div class="os-inner">
                <div class="title common text-center">
                    <h2>MOST RECENT TRANSACTIONS</h2>
                </div>
                <div class="main">
                    <div class="row">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Type</th>
        <th>Time</th>
        <th>Wallet Address</th>
        <th>Lending Amount</th>
        <th>Time Left</th>
        <th>Payout Amount</th>
      </tr>
    </thead>
    <tbody>
      @foreach($lends as $lend)
      <tr>
        <td><span class="btn btn-{{$lend->status == 2 ? 'success' : 'warning'}}">{{$lend->status == 2 ? 'Payout' : 'Lending'}}</span></td>
        <td>{{$lend->updated_at}}</td>
        <td>{{$lend->user->wallet}}</td>
        <td>{{$lend->amount}} {{$gnl->cursym}}</td>
        <td>
          @php
            $left = ($lend->package->times - $lend->returned);
            $edate = Carbon\Carbon::parse()->addHours($lend->package->period * $left);
            $now = Carbon\Carbon::now();
            $coutd = $edate->diffInSeconds($now);
            $iid = "tsk".$lend->id;
            echo "<script>
                  $(function () {
                      var etm = $coutd;
                      var $iid = $('#$iid'),
                     ts = (new Date()).getTime() + etm * 1000;

                      $('#countdown').countdown({
                          timestamp: ts,
                          callback: function (days, hours, minutes, seconds) {

                              var message = \"\";
                              if (days>0) {
                              message += days + \" Days\" + \" \";
                          }
                              message += hours + \" Hrs\" + \" \";
                              message += minutes + \" Mins\" + \" \";
                              message += seconds + \" Secs\" + \" \";


                              $iid.html(message);
                          }
                      });

                  });


              </script>";

            echo  $lend->status == 2 ? "<span class=\"btn btn-success\"> Complete</span>" : "<span class=\"btn btn-warning\" id=\"tsk$lend->id\"></span>";

          @endphp
        </td>
        <td>{{$lend->status == 2 ? $lend->package->total*$lend->amount/100 : ($lend->package->ret*$lend->amount/100)*$lend->returned }} {{$gnl->cursym}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
    </div>
                </div>
            </div>
        </div>
    </section>