 <section id="client">
        <div class="container">
            <div class="client-inner">
                <div class="title common text-center">
                    <h2>Payment we Accept</h2>
                </div>
                <div class="main our-client">
                    <div class="client-carousel owl-carousel owl-theme" id="client-carousel">
                    @foreach($payment as $pay)
                        <a href="#">
                            <div class="item">
                                <img src="{{ asset('assets/images/paymethod') }}/{{$pay->payment}}" alt="">
                            </div>
                        </a>
                    @endforeach 
                    </div>
                </div>
            </div>
        </div>
    </section>
