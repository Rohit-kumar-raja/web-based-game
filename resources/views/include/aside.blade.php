@auth
<style>
    @media(max-width:992){
    .d-lg-inline-block{
    display: inline-block!important;
    }
    }


    @media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}



/* sidebar */
.sidebar1 {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar1 a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidebar1 a:hover {
  color: #f1f1f1;
}

.sidebar1 .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
    border: 2px solid #000!important;
    font-size: 20px;
    cursor: pointer;
    font-weight: 900;
    color: black;
    padding: 2px 10px;
}

.openbtn:hover {
  background-color: #444;
}

#main1 {
  transition: margin-left .5s;
  padding: 16px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar1 {padding-top: 15px;}
  .sidebar1 a {font-size: 18px;}



}

@media(min-width:786px){
    .openbtn{
    display: none;
}
.closebtn{
    display: none!important;
}
}

@media(max-width:900px){
    .nav-link span{
    font-size: 22px!important;
    color: #767676!important;
    padding-left: 20px!important;
}

}
</style>



<div id="mySidebar1" class="sidebar1">
    

    <ul class="nav flex-column pt-3 pt-md-0">
       
        <li class="nav-item">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        </li>
        <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link d-flex align-items-center"><span
                    class="sidebar-icon">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </span><span class="mt-1 sidebar-text"></span></a>
            </li>

        <li class="nav-item active"><a href="{{ route('dashboard') }}" class="nav-link"><span
                    class="sidebar-icon"> </span><span
                    class="sidebar-text">Dashboard</span></a>
        </li>

        {{-- home start --}}
        <li class="nav-item"><span class="nav-link collapsed d-flex justify-content-between align-items-center"
                data-bs-toggle="collapse" data-bs-target="#submenu-app1"><span><span class="sidebar-icon"> </span><span class="sidebar-text">Home</span>
                </span><span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg></span></span>
            <div class="multi-level collapse" role="list" id="submenu-app1" aria-expanded="false">
                <ul class="flex-column nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('slider') }}">
                            <span class="sidebar-text">Slider</span></a></li>

                </ul>
            </div>
        </li>

        {{-- home end --}}



        <li class="nav-item"><span class="nav-link collapsed d-flex justify-content-between align-items-center"
                data-bs-toggle="collapse" data-bs-target="#submenu-app"><span><span class="sidebar-icon"><i
                            class="far fa-hand-holding-box"></i> </span><span class="sidebar-text">Game</span>
                </span><span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg></span></span>
            <div class="multi-level collapse" role="list" id="submenu-app" aria-expanded="false">
                <ul class="flex-column nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('matches') }}">
                            <span class="sidebar-text">Matches</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contest') }}"> <span class="sidebar-text">All
                                Contest</span></a></li>
                </ul>
            </div>
        </li>


        <li class="nav-item"><span class="nav-link collapsed d-flex justify-content-between align-items-center"
                data-bs-toggle="collapse" data-bs-target="#wallet"><span><span class="sidebar-icon"><i
                            class="far fa-gift"></i> </span><span class="sidebar-text">Wallet</span>
                </span><span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg></span></span>
            <div class="multi-level collapse" role="list" id="wallet" aria-expanded="false">
                <ul class="flex-column nav">
                    <li class="nav-item"><a href="{{ route('withdraw.request') }}" class="nav-link"> <span class="sidebar-text">
                                Withdraw Request's</span></a></li>
                    <li class="nav-item"><a href="{{ route('wallet') }}" class="nav-link"> <span class="sidebar-text">
                                Transaction's</span></a></li>

                    <li class="nav-item"><a class="nav-link" href="{{ route('wallet.debit') }}"> <span class="sidebar-text">
                                Debit's</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wallet.credit') }}"> <span class="sidebar-text">
                                Credit's</span></a></li>
                </ul>
            </div>
        </li>


        <li class="nav-item"><a href="{{ route('allusers') }}" class="nav-link"><span class="sidebar-icon"><i
                        class="far fa-users"></i> </span><span class="sidebar-text">Users List</span></a>
        </li>
        <li class="nav-item"><a href="{{ route('participate.user') }}" class="nav-link"><span
                    class="sidebar-icon"> </span><span
                    class="sidebar-text">Participated Users List</span></a>
        </li>

        <li class="nav-item"><a href="{{ route('siteinfo') }}" class="nav-link"><span class="sidebar-icon"><i
                        class="fa fa-info-circle"></i></span><span class="sidebar-text">Site Info</span></a>
        </li>

        <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700">

        </li>

        <li class="nav-item"><a href="{{ route('contactus') }}" class="nav-link"><span class="sidebar-icon"><i
                        class="far fa-address-book"></i> </span><span class="sidebar-text">Contact us</span></a>
        </li>
        <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700">

        </li>

    </ul>







   
  </div>
  
  {{-- <div id="main1">
    <button class="openbtn" onclick="openNav()">☰ Open Sidebar</button>      
  </div> --}}
  

  <script>
  function openNav() {
    document.getElementById("mySidebar1").style.width = "350px";
    document.getElementById("main1").style.marginLeft = "350px";
  }
  
  function closeNav() {
    document.getElementById("mySidebar1").style.width = "0";
    document.getElementById("main1").style.marginLeft= "0";
  }
  </script>


  
<div id="mySidebar1" class="sidebar1">
    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <div class="user-card d-flex d-md-none justify-content-between justify-content-md-center pb-4">

            </div>

            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <ul class="nav flex-column pt-3 pt-md-0">
                <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link d-flex align-items-center"><span
                            class="sidebar-icon">
                            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                        </span><span class="mt-1 sidebar-text"></span></a>
                    </li>

                <li class="nav-item active"><a href="{{ route('dashboard') }}" class="nav-link"><span
                            class="sidebar-icon"> </span><span
                            class="sidebar-text">Dashboard</span></a>
                </li>

                {{-- home start --}}
                <li class="nav-item"><span class="nav-link collapsed d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#submenu-app1"><span><span class="sidebar-icon"><i
                                    class="far fa-home-alt"></i> </span><span class="sidebar-text">Home</span>
                        </span><span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg></span></span>
                    <div class="multi-level collapse" role="list" id="submenu-app1" aria-expanded="false">
                        <ul class="flex-column nav">
                            <li class="nav-item"><a class="nav-link" href="{{ route('slider') }}">
                                    <span class="sidebar-text">Slider</span></a></li>

                        </ul>
                    </div>
                </li>

                {{-- home end --}}



                <li class="nav-item"><span class="nav-link collapsed d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#submenu-app"><span><span class="sidebar-icon"><i
                                    class="far fa-hand-holding-box"></i> </span><span class="sidebar-text">Game</span>
                        </span><span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg></span></span>
                    <div class="multi-level collapse" role="list" id="submenu-app" aria-expanded="false">
                        <ul class="flex-column nav">
                            <li class="nav-item"><a class="nav-link" href="{{ route('matches') }}">
                                    <span class="sidebar-text">Matches</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('contest') }}"> <span class="sidebar-text">All
                                        Contest</span></a></li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item"><span class="nav-link collapsed d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#wallet"><span><span class="sidebar-icon"><i
                                    class="far fa-gift"></i> </span><span class="sidebar-text">Wallet</span>
                        </span><span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg></span></span>
                    <div class="multi-level collapse" role="list" id="wallet" aria-expanded="false">
                        <ul class="flex-column nav">
                            <li class="nav-item"><a href="{{ route('withdraw.request') }}" class="nav-link"> <span class="sidebar-text">
                                        Withdraw Request's</span></a></li>
                            <li class="nav-item"><a href="{{ route('wallet') }}" class="nav-link"> <span class="sidebar-text">
                                        Transaction's</span></a></li>

                            <li class="nav-item"><a class="nav-link" href="{{ route('wallet.debit') }}"> <span class="sidebar-text">
                                        Debit's</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('wallet.credit') }}"> <span class="sidebar-text">
                                        Credit's</span></a></li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item"><a href="{{ route('allusers') }}" class="nav-link"><span class="sidebar-icon"><i
                                class="far fa-users"></i> </span><span class="sidebar-text">Users List</span></a>
                </li>
                <li class="nav-item"><a href="{{ route('participate.user') }}" class="nav-link"><span
                            class="sidebar-icon"> </span><span
                            class="sidebar-text">Participated Users List</span></a>
                </li>

                <li class="nav-item"><a href="{{ route('siteinfo') }}" class="nav-link"><span class="sidebar-icon"><i
                                class="fa fa-info-circle"></i></span><span class="sidebar-text">Site Info</span></a>
                </li>

                <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700">

                </li>

                <li class="nav-item"><a href="{{ route('contactus') }}" class="nav-link"><span class="sidebar-icon"><i
                                class="far fa-address-book"></i> </span><span class="sidebar-text">Contact us</span></a>
                </li>
                <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700">

                </li>

            </ul>
        </div>
    </nav>
</div>
@endauth


       