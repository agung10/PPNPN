@if(\Auth::user()->role == "AdminUtama" || \Auth::user()->role == "Administrator")
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
        <span class="float-md-left d-block d-md-inline-block">
            Copyright &copy; 2020 
            <a class="text-bold-800 grey darken-2" href="#" target="_blank"> 
                Agung Mubarok
            </a>
        </span>
        <span class="float-md-right d-none d-lg-block">
            Badan Nasional Penanggulangan Bencana(BNPB)
            <span id="scroll-top"></span>
        </span>
    </p>
</footer>
@elseif(\Auth::user()->role == "User")
<footer class="footer footer-transparent footer-light navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2 container center-layout">
        <span class="float-md-left d-block d-md-inline-block">
            Copyright &copy; 2020 
            <a class="text-bold-800 grey darken-2" href="#" target="_blank"> 
                Agung Mubarok
            </a>
        </span>
        <span class="float-md-right d-none d-lg-block">
            Badan Nasional Penanggulangan Bencana(BNPB)
            <span id="scroll-top"></span>
        </span>
    </p>
</footer>
@endif