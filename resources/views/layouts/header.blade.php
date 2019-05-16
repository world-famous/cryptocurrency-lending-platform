        <div id="header" class="header navbar navbar-default navbar-fixed-top">
            <!-- begin container-fluid -->
            <div class="container-fluid">
                <!-- begin mobile sidebar expand / collapse button -->
                <div class="navbar-header">
                    <a href="{{route('home')}}" class="navbar-brand">
                        <img class="img-responsive" src="{{ asset('assets/images/logo/logo.png') }}" style="max-width: 280px; max-height: 44px;">
                    </a>
                    <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                       <a href="#" style="font-size: 20px; color:#fff; margin-right: 20px;">1 BTC = {{number_format(floatval($btcrate) , $gnl->decimal, '.', '')}} USD</a>
                    </li>
                </ul>
                
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end #header -->



