
{{-- @extends('layouts.conten') --}}
@extends('layouts.hd')

@section('card-header-extra')
@section('adminlte_css_pre')
{{-- <div class="float-right">
    <a href="{{ route($modul.'.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-plus"></i>
        Tambah Data</a>
</div> --}}
@endsection
@section('card-bb')


<div class="center-block" style="width: 1300px;  ">

    <div class="card-body  center-block  " >

      <div id="myCarousel" class="carousel transbox  slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner transbox  " style="height: 450px" >
            <div class="carousel-item transbox active " style="height: 450px">
              <img class="bd-placeholder-img transbox img-overlay" width="100%" height="100%" src="{{asset('uploads/logo.jpg')}}" role="img" aria-label=" :  " preserveAspectRatio="xMidYMid slice" focusable="false"><title> </title><rect width="100%" height="50%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em"> </text></svg>

              <div class="container ">
                <div class="carousel-caption  text-left">
                  <h1>Example headline.</h1>
                  <p>Some representative placeholder content for the first slide of the carousel.</p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <img class="bd-placeholder-img" width="100%" height="100%" src="{{asset('uploads/latar.jpg')}}" role="img" aria-label=" :  " preserveAspectRatio="xMidYMid slice" focusable="false"><title> </title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em"> </text></svg>

              <div class="container">
                <div class="carousel-caption">
                  <h1>Another example headline.</h1>
                  <p>Some representative placeholder content for the second slide of the carousel.</p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <img class="bd-placeholder-img" width="100%" height="450px" src="{{asset('uploads/wonderful.jpg')}}"role="img" aria-label=" :  " preserveAspectRatio="xMidYMid slice" focusable="false"><title> </title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em"> </text></img>

              <div class="container">
                <div class="carousel-caption text-right">
                  <h1>One more for good measure.</h1>
                  <p>Some representative placeholder content for the third slide of this carousel.</p>
                </div>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>

        </div>
      </div>
      </div>
{{-- <div class="container"> --}}
{{-- <div class="Group center" > --}}
    {{-- <div class="con floating-box"> --}}
        {{-- <a href="{{ route($h.'.list') }}"> --}}
            {{-- <a href="http://localhost/parawisata/public/wisata/list"> --}}

 {{-- <img src="{{asset('uploads/latar.jpg')}}" alt="Avatar" class=" image center "  >
        <div class="overlay">Wisata</div>
    </a>
      </div> --}}
{{-- </div> --}}

{{-- </div> --}}

{{-- <div class="con floating-box" >
    {{-- <a href="{{ route($h.'.list') }}"> --}}
        <a href="http://localhost/parawisata/public/hotel/list">
{{-- <img src="{{asset('uploads/latar.jpg')}}" alt="Avatar" class="image">
    <div class="overlay">Wisata</div>
</a>
  </div>  --}}

{{-- </div> --}}
{{--
<div class="con floating-box">
    {{-- <a href="{{ route($h.'.list') }}"> --}}
        {{-- <a href="http://localhost/parawisata/public/kuliner/list">
<img src="{{asset('uploads/kuliner.jpg')}}" alt="Avatar" class="image">
    <div class="overlay">Wisata</div> --}}
{{-- </a>? --}}
  {{-- </div> --}}
{{-- </div></div> --}}
{{-- @stop --}}
{{-- </form> --}}
{{-- @stop --}}



        <style>
.site-footer
{
  background-color:#26272b;
  padding:45px 0 20px;
  font-size:15px;
  line-height:24px;
  color:#737373;
}
.site-footer hr
{
  border-top-color:#bbb;
  opacity:0.5
}
.site-footer hr.small
{
  margin:20px 0
}
.site-footer h6
{
  color:#fff;
  font-size:16px;
  text-transform:uppercase;
  margin-top:0px;
  letter-spacing:2px
}
.site-footer a
{
  color:#737373;
}
.site-footer a:hover
{
  color:#3366cc;
  text-decoration:none;
}
.footer-links
{
  padding-left:0;
  list-style:none
}
.footer-links li
{
  display:block
}
.footer-links a
{
  color:#737373
}
.footer-links a:active,.footer-links a:focus,.footer-links a:hover
{
  color:#3366cc;
  text-decoration:none;
}
.footer-links.inline li
{
  display:inline-block
}
.site-footer .social-icons
{
  text-align:right
}
.site-footer .social-icons a
{
  width:40px;
  height:40px;
  line-height:40px;
  margin-left:6px;
  margin-right:0;
  border-radius:100%;
  background-color:#33353d
}
.copyright-text
{
  margin:0
}
@media (max-width:991px)
{
  .site-footer [class^=col-]
  {
    margin-bottom:0px
  }
}
@media (max-width:767px)
{
  .site-footer
  {
    padding-bottom:0
  }
  .site-footer .copyright-text,.site-footer .social-icons
  {
    text-align:center
  }
}
.social-icons
{
  padding-left:0;
  margin-bottom:0;
  list-style:none
}
.social-icons li
{
  display:inline-block;
  margin-bottom:4px
}
.social-icons li.title
{
  margin-right:15px;
  text-transform:uppercase;
  color:#96a2b2;
  font-weight:700;
  font-size:13px
}
.social-icons a{
  background-color:#eceeef;
  color:#818a91;
  font-size:16px;
  display:inline-block;
  line-height:44px;
  width:44px;
  height:44px;
  text-align:center;
  margin-right:8px;
  border-radius:100%;
  -webkit-transition:all .2s linear;
  -o-transition:all .2s linear;
  transition:all .2s linear
}
.social-icons a:active,.social-icons a:focus,.social-icons a:hover
{
  color:#fff;
  background-color:#29aafe
}
.social-icons.size-sm a
{
  line-height:34px;
  height:34px;
  width:34px;
  font-size:14px
}
.social-icons a.facebook:hover
{
  background-color:#3b5998
}
.social-icons a.twitter:hover
{
  background-color:#00aced
}
.social-icons a.linkedin:hover
{
  background-color:#007bb6
}
.social-icons a.dribbble:hover
{
  background-color:#ea4c89
}
@media (max-width:767px)
{
  .social-icons li.title
  {
    display:block;
    margin-right:0;
    font-weight:600
  }
}
        </style>

{{-- <body> --}}
      <!-- Site footer -->
      <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
              <h6>About</h6>
            </div>

           @foreach (  $find_count as $f )


                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text" style="color: lightblue">Jumlah Pengunjung Website  {{$f->v}}

                    </p>
                  </div>
                  @endforeach

          <hr>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
              <p class="copyright-text">Copyright &copy; 2021 All Rights

              </p>
            </div>


          </div>
        </div>
  </footer>
{{-- </body> --}}
@endsection

@section('plugins.Datatables', true)
@section('js')
<script>
    let visitCount = document.getElementById('postVisit').value;
    let visitCountPlusOne = parseInt(visitCount) + 1;

    document.getElementById('postVisit').value = visitCountPlusOne;
    $("#myTable").DataTable({
                    "autoWidth": false,
                    "responsive": true
                });
</script>

@endsection
