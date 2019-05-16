    <section id="our-service" class="home-page">
        <div class="container">
            <div class="os-inner home-page">
                <div class="title common text-center">
                    <h2>How it Works</h2>
                </div>
                <div class="main text-center">
                    <div class="row">
                   @foreach($services as $service)
                        <div class="col-md-3 col-sm-6">
                            <div class="item">
                                <span class="fa fa-{{$service->image}}"></span>
                                <h3>{{$service->large}}</h3>
                                <p> {{$service->small}}</p>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="get-host">
       <div class="container">
            <div class="get-host-inner">
                <div class="title">
                    <h2 class="pull-left">Step up to get double Bitcoin Today</h2>
                </div>
                <a href="{{route('register')}}" class="btn btn-default pull-right">get Started now</a>
            </div>
        </div>
    </div>