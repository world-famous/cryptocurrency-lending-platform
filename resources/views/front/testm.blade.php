<section id="testimonial" style="background: url('{{ asset('assets/images/interface/testm.jpg') }}') no-repeat fixed;">
        <div class="container-fluid">
            <div class="testi-inner">
                <div class="title common text-center">
                    <h2>what people say</h2>
                </div>
                <div class="owl-carousel owl-theme testi-carousel">
            @foreach($testims as $test)
                    <div class="item">
                        <div class="item-top">
                            <div class="item-info">
                                <div class="item-img">
                                    <img  src="{{ asset('assets/images/testimonial') }}/{{$test->photo}}" alt="" class="img-circle">
                                </div>
                                <div class="item-title">
                                    <h4 class="name">{{$test->name}}<small class="post">{{$test->company}}</small></h4>
                                    <div class="item-review">
                                        <ul class="no-style">
                                        @for($i = 0; $i < $test->star ; $i++)
                                           <li><span class="fa fa-star"></span></li>
                                        @endfor
                                        </ul>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="item-main">
                            <div class="quote-icon">
                                <span class="fa fa-quote-left"></span>
                            </div>
                            <div class="main-text">
                                <p>{{$test->comment}}</p>
                            </div>
                        </div>
                    </div>
            @endforeach
                </div>
            </div>
        </div>
    </section>