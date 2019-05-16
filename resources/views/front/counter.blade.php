<div id="counter" style="background: url('{{ asset('assets/images/interface/story.jpg') }}') no-repeat center fixed;">
        <div class="container">
            <div class="counter-inner">
                <div class="row">
            @foreach($stats as $stat)
                    <div class="col-md-3  col-sm-6">
                        <div class="item">
                            <span class="icon fa fa-{{$stat->image}}"></span>
                            <span class="count">{{$stat->large}}</span>
                            <span class="text">{{$stat->small}}</span>
                        </div>
                    </div>
            @endforeach   
                </div>
            </div>
        </div>
    </div>