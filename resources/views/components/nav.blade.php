<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

<!-- vendor css -->
<nav class="pcoded-navbar  ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div ">
            <div class="">
                <div class="main-menu-header">
                    <div class="user-details">
                        <div id="more-details">{{ auth()->user()->name }}</div>
                    </div>
                </div>
            </div>

            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Navigation</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('homePage') }}" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="{{ route('viewproducts') }}" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-layout"></i></span><span class="pcoded-mtext">My Ticket</span></a>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="{{ route('viewconfirmticket') }}" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-layout"></i></span><span class="pcoded-mtext">Confirm Ticket</span></a>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="{{ route('viewcancelticket') }}" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-layout"></i></span><span class="pcoded-mtext">Canceled Ticket</span></a>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="{{ route('traintime') }}" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-layout"></i></span><span class="pcoded-mtext">Time Table</span></a>
                </li>

            </ul>
        </div>
    </div>
</nav>
