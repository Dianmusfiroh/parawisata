




        <html>
  <head>
      	<title>Bootstrap Navbars</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!-- library CSS fancybox -->
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css">
<!-- library JS -->
<script src="//code.jquery.com/jquery-3.2.0.min.js"></script>
<!-- library JS fancybox -->
<script src="fancybox/jquery.fancybox.js"></script>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
     <style type="text/css">
     /* body {
  padding-top: 77px;
} */
.jumbotron {
  color: #662512;
  background-color: #662512;
}
.navbar-inverse {
  color: #2c3e50;
}
.navbar-inverse .navbar-nav > li > a {
  color: white;
}

.navbar-inverse .navbar-brand {
  color: white;
  font-size: 15px;
}

    /* body { padding-top: 70px; } */
    .jumbotron {
      color: #2c3e50;
      background: #ecf0f1;

    }
    .navbar-inverse {
      background: #2c3e50;
      color: white;
    }
    .navbar-inverse .navbar-brand, .navbar-inverse a{
      color:white;
    }
    .navbar-inverse .navbar-nav>li>a {
      color: white;
    }
    theDiv  {
    display:flex;

}
.flex-container {
  display: flex;
}

.flex-container-tes > div {
  box-flex-group:initial;
  margin: 10px;
  padding: 20px;
  font-size: 30px;
}
.group {
    background-color: #ecf0f1;
    position: auto;
}
.gallery img {
    width: 20%;
    height: auto;
    border-radius: 5px;
    cursor: pointer;
    transition: .3s;
}
* {box-sizing: border-box;}

.con {
  position: relative;
  width: 50%;
  max-width: 300px;
}

.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: static ;
  bottom: 0;
  background: rgb(0, 0, 0);
  background: rgba(0, 0, 0, 0.5); /* Black see-through */
  color: #f1f1f1;
  width: 100%;
  transition: .5s ease;
  opacity:0;
  color: white;
  font-size: 20px;
  padding: 20px;
  text-align: center;
}

.con:hover .overlay {
  opacity: 1;
}
.floating-box {
    float: left;
    /* width: 150px;
    height: 100px; */
    margin: 30px;
}
  </style>

       </head>

    <body>
        <div class="card">
            <div class="card-header bg-header center " >
                <div ></div>
               <h1><center> WEBSITE PARAWISATA</center></h1>
            </div>
            @section('title')
            {{ Str::title(Str::replaceArray('-',[' '],$modul ?? '')) }}
            @stop

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">

                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="http://localhost/parawisata/public/hotel/list">Hotel</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="http://localhost/parawisata/public/kuliner/list">Kuliner</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="http://localhost/parawisata/public/wisata/list">Wisata</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="http://localhost/parawisata/public/galery/">Galeri</a>
                      </li>

                    </ul>
                  </div>
                </div>
              </nav>
      {{-- <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav-demo" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
            <a href="#" class="navbar-brand"><span class="glyphicon glyphicon-picture"></span> IMGS</a>
          </div>
          <div class="collapse navbar-collapse" id="bs-nav-demo">
            <ul class="nav navbar-nav">
              <li><a href="#">About</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Sign Up</a></li>
              <li><a href="#">Login</a></li>
            </ul>
          </div>
        </div>
      </nav> --}}
      @section('back-button',url('/home'))
      {{-- <div class="container">
        <a href="http://localhost/parawisata/public/home"><button class="btn btn-primary" >Kembali</button></a> --}}

     {{-- <div class="container"> --}}
    <div class="jumbotron">
      <h1> <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
        <!-- I can replace the align left with icon span with: <i class="fas fa-camera-retro"></i>  -->
        Image Galery</h1>

    </div>
       <div class="container">
    <div class="col">
        <div class="card" style="background-color: grey;">
            <div class="card-body border-0 text-center  text-white">
                <h2>Wisata</h2>
                <h3></h3>
                {{-- <h2><strong>{{ $item->name }}</strong></h2> --}}
            </div>
        </div>
    </div>
    @foreach ( $wisata as $item )

{{-- <div class=" "> --}}

    <div class="con floating-box">
        <a href="{{ route($w.'.show', $item->id) }}">
 <img src="{{ asset($item->pic) }}" alt="Avatar" class="image">
        <div class="overlay">{{ $item->name }}</div>
    </a>
      </div>
{{-- </div> --}}
@endforeach
</div>
<div class="container">
    <div class="col">
        <div class="card" style="background-color: grey;">
            <div class="card-body border-0 text-center  text-white">
                <h2>Hotel</h2>
                <h3></h3>
                {{-- <h2><strong>{{ $item->name }}</strong></h2> --}}
            </div>
        </div>
    </div>
    @foreach ( $hotel as $item )

{{-- <div class=" "> --}}

    <div class="con floating-box">
        <a href="{{ route($h.'.show', $item->id) }}">
 <img src="{{ asset($item->pic) }}" alt="Avatar" class="image">
        <div class="overlay">{{ $item->name }}</div>
    </a>
      </div>
{{-- </div> --}}
@endforeach
</div>
<div class="container">
    <div class="col">
        <div class="card" style="background-color: grey;">
            <div class="card-body border-0 text-center  text-white">
                <h2>Kuliner</h2>
                <h3></h3>
                {{-- <h2><strong>{{ $item->name }}</strong></h2> --}}
            </div>
        </div>
    </div>
    @foreach ( $kuliner as $item )

{{-- <div class=" "> --}}

    <div class="con floating-box">
        <a href="{{ route($k.'.show', $item->id) }}">
 <img src="{{ asset($item->pic) }}" alt="Avatar" class="image">
        <div class="overlay">{{ $item->name }}</div>
    </a>
      </div>
{{-- </div> --}}
@endforeach
</div>
    {{-- <div class="container ">
        <div class="gallery ">
         <div class="group ">
        {{-- <div class="con"> --}}
            {{-- @foreach ( $wisata as $item )

              <a href="{{ asset($item->pic) }}" data-fancybox="group" data-caption="{{ $item->name }}" >

            <img class="image" src="{{ asset($item->pic) }}" alt="{{ $item->name }}" />
            </a>



                @endforeach --}}
        {{-- </div>

            </div>
        </div>
    </div> --}}


<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
    <script type="text/javascript">
    $("[data-fancybox]").fancybox({ });
</script>
</script>
</body>
</html>

