<header id="header" class="sub-page">
        <nav id="navigation" class="navbar navbar-inverse navbar-custom" data-spy="affix">
            <div class="container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle hamburger" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                    <a href="{{url('/')}}" class="navbar-brand logo-1"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="logo" style="max-width: 280px; max-height: 44px;"></a>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        @auth
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <div class="page-header" style="background: url('{{ asset('assets/images/logo/bc.jpg') }}') no-repeat center;">
            <div class="container">

            </div>
        </div>
    </header>