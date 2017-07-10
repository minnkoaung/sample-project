 <!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">sample-project</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse pull-right">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
                    <ul class="dropdown-menu">

 @if (Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                           data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><img class="circ img-responsive img-ci" src="{{ Gravatar::get(Auth::user()->email)  }}"></li>
                        <li>
                                <a href="/logout"
                                   onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>

                @else
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>

                @endif


                        <li role="separator" class="divider"></li>

                        <li><a href="#">Another action</a></li>

                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>