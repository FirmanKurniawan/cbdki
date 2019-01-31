@extends('layouts.user')
@section('content')
<!-- start banner Area -->

<?php
	$q = \App\Profile::where('id', 1)->first();

?>
<section id="intro">
    <div class="intro-container wow fadeIn">
      <h1 class="mb-4 pb-0">The Annual<br><span>Marketing</span> Conference</h1>
      <p class="mb-4 pb-0">10-12 December, Downtown Conference Center, New York</p>
      <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video"
        data-autoplay="true"></a>
      <a href="#about" class="about-btn scrollto">About The Event</a>
    </div>
  </section>

  <main id="main">

    <!--==========================
      About Section
    ============================-->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2>About The Event</h2>
            <p>Sed nam ut dolor qui repellendus iusto odit. Possimus inventore eveniet accusamus error amet eius aut
              accusantium et. Non odit consequatur repudiandae sequi ea odio molestiae. Enim possimus sunt inventore in
              est ut optio sequi unde.</p>
          </div>
          <div class="col-lg-3">
            <h3>Where</h3>
            <p>Downtown Conference Center, New York</p>
          </div>
          <div class="col-lg-3">
            <h3>When</h3>
            <p>Monday to Wednesday<br>10-12 December</p>
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

      <div class="owl-carousel gallery-carousel">
        <a href="{{asset('u/img/gallery/1.jpg')}}" class="venobox" data-gall="gallery-carousel"><img src="{{asset('u/img/gallery/1.jpg')}}" alt=""></a>
        <a href="{{asset('u/img/gallery/2.jpg')}}" class="venobox" data-gall="gallery-carousel"><img src="{{asset('u/img/gallery/2.jpg')}}" alt=""></a>
        <a href="{{asset('u/img/gallery/3.jpg')}}" class="venobox" data-gall="gallery-carousel"><img src="{{asset('u/img/gallery/3.jpg')}}" alt=""></a>
        <a href="{{asset('u/img/gallery/4.jpg')}}" class="venobox" data-gall="gallery-carousel"><img src="{{asset('u/img/gallery/4.jpg')}}" alt=""></a>
        <a href="{{asset('u/img/gallery/5.jpg')}}" class="venobox" data-gall="gallery-carousel"><img src="{{asset('u/img/gallery/5.jpg')}}" alt=""></a>
        <a href="{{asset('u/img/gallery/6.jpg')}}" class="venobox" data-gall="gallery-carousel"><img src="{{asset('u/img/gallery/6.jpg')}}" alt=""></a>
        <a href="{{asset('u/img/gallery/7.jpg')}}" class="venobox" data-gall="gallery-carousel"><img src="{{asset('u/img/gallery/7.jpg')}}" alt=""></a>
        <a href="{{asset('u/img/gallery/8.jpg')}}" class="venobox" data-gall="gallery-carousel"><img src="{{asset('u/img/gallery/8.jpg')}}" alt=""></a>
      </div>

    </section>
    <section id="subscribe">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h2>Newsletter</h2>
          <p>Rerum numquam illum recusandae quia mollitia consequatur.</p>
        </div>

        <form method="POST" action="#">
          <div class="form-row justify-content-center">
            <div class="col-auto">
              <input type="text" class="form-control" placeholder="Enter your Email">
            </div>
            <div class="col-auto">
              <button type="submit">Subscribe</button>
            </div>
          </div>
        </form>

      </div>
    </section>\
			<!-- End latest-blog Area -->		

			<!-- Start gallery Area -->
		
@endsection