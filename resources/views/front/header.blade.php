<header id="header">
@include('front.nav')
        <div id="slider">
            <div class="container-fluid">
                <div class="slider-inner">
                    <div id="header-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                @php $i =1; @endphp
                @foreach($sliders as $slider)
                            <div class="item {{$i == 1 ? 'active': ''}}
                             {{$slider->id}}" 
                             style="background: url('{{ asset('assets/images/slider') }}/{{$slider->image}}');">
                                <div class="carousel-caption">
                                    <h1 data-animation="animated fadeInUp">
                                       {{$slider->large}}
                                    </h1>
                                    <h2 data-animation="animated fadeInDown">
                                       {{$slider->small}}
                                    </h2>
                                </div>
                            </div>
                    @php $i++; @endphp 
                @endforeach
                        </div>
                        <a class="left carousel-control" href="#header-carousel" role="button" data-slide="prev">
                            <span class="fa fa-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#header-carousel" role="button" data-slide="next">
                            <span class="fa fa-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>