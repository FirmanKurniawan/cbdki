<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Site Title -->
    <?php
  $q = \App\Profile::where('id', 1)->first();

?>
   
  <meta charset="utf-8">
  <title>{{$q->nama}}</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{asset('u/img/favicon.png')}}" rel="icon">
  <link href="{{asset('u/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{asset('../u/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <link href="{{asset('../u/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('../u/lib/animate/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('../u/lib/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('../u/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{('../u/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
    Theme Name: TheEvent
    Theme URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
        <a href="#intro" class="scrollto">
          <img src="{{asset('cbi_user/img/CBI.png')}}" alt="" title="" style=""></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li ><a href="{{url('/')}}">Home</a></li>
          <li><a href="{{url('member')}}">Member</a></li>
          <li><a href="{{url('merchandise')}}">Merchandise</a></li>
          <li><a href="{{url('berita')}}">Berita</a></li>
          <li><a href="{{url('contact')}}">Contact</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->

    

<section>
	@yield('content')
</section>


  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <?php
                $data = \App\Footer::where('id',1)->first();
                ?>
                <h4>Tentang Kami</h4>
                <p>
                  <h5 style="color: white;">{!! $data->pengantar1 !!}</h5>
                  <p style="color: white;">{!! $data->pengantar2 !!}
                  <br>
                  {!! $data->pengantar3 !!}</p>
                </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Buletin</h4>
            <ul>
              <form action="{{url('admin/newsletter/save')}}" method="POST">
                @csrf
              <input type="email" class="form-control" name="email" placeholder="Email" style="border-radius: 50px; border : 0;">
              <br>
              <button type="submit" class="btn" style="background-color: #E0072F; color: #fff; border-radius: 50px;">Kirim</button>
              </form>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Kontak Kami</h4>
            <?php  
            $profile = \App\Profile::all()->where('id', 1);
            ?>
            @foreach($profile as $p)
            <p>
              {{$p->alamat}}<br>
              <strong>Phone : </strong>{{$p->telepon}}<br>
              <strong>Email : </strong>{{$p->email}}<br>
            </p>
            @endforeach

            <div class="social-links">
              <?php  
              $profile = \App\Profile::all()->where('id', 1);
              ?>
              @foreach($profile as $p)
              <a href="{{$p->facebook}}" target="_blank"><i class="fa fa-facebook" style="color: black;"></i></a>
              <a href="{{$p->twitter}}" target="_blank"><i class="fa fa-twitter" style="color: black; margin-left: 8%;"></i></a>
              <a href="{{$p->instagram}}" target="_blank"><i class="fa fa-instagram" style="color: black; margin-left: 8%;"></i></a>
              @endforeach
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>TheEvent</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent
        -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{asset('../u/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('../u/lib/jquery/jquery-migrate.min.js')}}"></script>
  <script src="{{asset('../u/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('../u/lib/easing/easing.min.js')}}"></script>
  <script src="{{asset('../u/lib/superfish/hoverIntent.js')}}"></script>
  <script src="{{asset('../u/lib/superfish/superfish.min.js')}}"></script>
  <script src="{{asset('../u/lib/wow/wow.min.js')}}"></script>
  <script src="{{asset('../u/lib/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('../u/lib/owlcarousel/owl.carousel.min.js')}}"></script>

  <!-- Contact Form JavaScript File -->
  <script src="{{asset('../u/contactform/contactform.js')}}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{asset('../u/js/main.js')}}"></script>
</body>

</html>
