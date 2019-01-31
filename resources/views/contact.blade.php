@extends('layouts.user')

@section('content')

<?php
  $q = \App\Profile::where('id', 1)->first();

?>

<section id="subscribe">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h2>Contact</h2>
        </div>


      </div>
    </section>
<!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">

      <div class="container">

        <div class="section-header">
       
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>{{$q->alamat}}</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+155895548855">{{$q->telepon}}</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">{{$q->email}}</a></p>
            </div>
          </div>

        </div>

        <div class="form">
          <form action="{{url('/admin/contact/save')}}" method="POST" role="form">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="nama" class="form-control" id="name" placeholder="Your Name"  />
 
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" />

              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"  />

            </div>
            <div class="form-group">
              <textarea class="form-control" name="pesan" placeholder="Message"></textarea>

            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->
			<!-- End contact-page Area -->
@endsection