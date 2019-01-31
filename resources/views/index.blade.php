@extends('layouts.user')
@section('content')
<!-- start banner Area -->

<?php
  $q = \App\Profile::where('id', 1)->first();

?>
<section id="intro">
    <div class="intro-container wow fadeIn">
      <h1 class="mb-4 pb-0">{!!$q->pengantar1!!}</h1>
      <p class="mb-4 pb-0">
                    {!!$q->pengantar2!!}
                    {!!$q->pengantar3!!}
      </p>
      <a href="{{$q->linkyt}}" class="venobox play-btn mb-4" data-vbtype="video"
        data-autoplay="true"></a>
      <a href="#about" class="about-btn scrollto">About</a>
    </div>
  </section>

  <main id="main">

    <!--==========================
      About Section
    ============================-->
    <section id="about">
<?php
  $q = \App\About::where('id', 1)->first();

?>  
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2>About Us</h2>
            <p>{!!$q->pengantar1!!}</p>
          </div>
          <div class="col-lg-3">
            <h1 hidden="true">Where</h1>
            <p>{!!$q->pengantar2!!}</p>
          </div>
          <div class="col-lg-3">
            <h1 hidden="true">When</h1>
            <p>{!!$q->pengantar3!!}</p>
          </div>
        </div>
      </div>
    </section>





       <section id="gallery" class="wow fadeInUp">

      <div class="container">
        <div class="section-header">
          <h2>Gallery</h2>
          <p>Check our gallery from the recent events</p>
        </div>
      </div>
      <?php
      $gallery = \App\Gallery::all();  
      ?>                               
      <div class="owl-carousel gallery-carousel">
         @foreach ($gallery as $n)
        <a href="{{ asset('images/'.$n->gambar) }}" class="venobox" data-gall="gallery-carousel"><img src="{{ asset('images/'.$n->gambar) }}" alt=""></a>
        @endforeach
      </div>
    </section>
    <section id="subscribe">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h2>Newsletter</h2>
          <p>You can trust us. we only send  offers, not a single spam.</p>
        </div>
        <form action="{{url('/admin/newsletter/save')}}" method="POST" action="#">
          @csrf
          <div class="form-row justify-content-center">
            <div class="col-auto">
              <input type="email" name="email" class="form-control" placeholder="Enter your Email">
            </div>
            <div class="col-auto">
              <button type="submit">Subscribe</button>
            </div>
          </div>
        </form>

      </div>
    </section>
      <!-- End latest-blog Area -->   

      <!-- Start gallery Area -->
    
@endsection