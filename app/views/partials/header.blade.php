<header id="header">
    <div id="stuck_container">
        <div class="container">
            <div class="row">
                <div class="col-md-12 h66">
                    <nav class="navbar navbar-default navbar-fixed-top">
                        <div class="container">
                            <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                        <a class="navbar-brand" href="#"><img src="{{asset('images/logo_new1.png')}}"></a>
                                    </div>
                            @if(Auth::user())
                                @if(Auth::user()->role == 'Administrator')
                                    @include('includes.administratorNav')
                                @elseif(Auth::user()->role == "Accountant")
                                    @include('includes.accountantNav')
                                @elseif(Auth::user()->role=='Doctor')
                                    @include('includes.doctorNav')
                                @elseif(Auth::user()->role=='Lab Manager')
                                    @include('includes.labManagerNav')
                                @elseif(Auth::user()->role=='Receptionist')
                                    @include('includes.receptionistNav')
                                @elseif(Auth::user()->role=='Super User')
                                    @include('includes.superUserNav')
                                @endif
                            @else
                                @include('includes.webNav')
                            @endif
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>