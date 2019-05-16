<nav id="navigation" class="navbar navbar-inverse navbar-custom" data-spy="affix" data-offset-top="35">
            <div class="container">

                <!-- === NAVBAR-HEADER ===  -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle hamburger" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                    <a href="{{url('/')}}" class="navbar-brand logo-1"><img src="{{ asset('assets/images/logo/logo.png') }}" alt=" logo" style="max-width: 280px; max-height: 44px;"></a>
                </div>

                <!-- ===MAIN-NAVBAR=== -->
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#header">home</a></li>
                        <li><a href="#about-us">About us</a></li>
                        <li><a href="#our-service">How IT Works</a></li>
                        <li><a href="#other-blog">Story</a></li>
                        <li><a href="#counter">counter</a></li>
                        <li><a href="#counter">Transactions</a></li>
                        
                        <li class="dropdown top">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @auth
                                <li><a href="{{ url('/home') }}">Home</a></li>
                                @else
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                                @endauth
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>