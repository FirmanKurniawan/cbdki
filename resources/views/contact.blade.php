@extends('layouts.user')

@section('content')

<?php
  $q = \App\Profile::where('id', 1)->first();

?>
<style type="text/css">
  .map-responsive{
    overflow:hidden;
    padding-bottom:56.25%;
    position:relative;
    height:0;
}
.map-responsive iframe{
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
}
</style>
<section id="subscribe">
         <div class="container wow fadeInUp">
        <br>
        <br>
        <br>
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
          <div class="map-responsive">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.9355507996365!2d106.87425431431072!3d-6.272205663145545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f2f204247387%3A0xe8cb2385f17660a!2sJl.+Teratai+No.47%2C+RT.13%2FRW.2%2C+Makasar%2C+Kota+Jakarta+Timur%2C+Daerah+Khusus+Ibukota+Jakarta+13570!5e0!3m2!1sid!2sid!4v1549003889455" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
       
        </div>

        
        <div class="row contact-info">


          <div class="col-md-4">

            <div class="contact-address">

              <i class="ion-ios-location-outline"></i>
              <h3>Alamat</h3>
              <address>{{$q->alamat}}</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Nomor Telepon</h3>
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
                <input type="text" name="nama" class="form-control" id="name" placeholder="Nama Kamu"  />
 
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" />

              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subyek"  />

            </div>
            <div class="form-group">
              <textarea class="form-control" name="pesan" placeholder="Pesan"></textarea>

            </div>
            <div class="text-center"><button type="submit">Kirim</button></div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->
			<!-- End contact-page Area -->
@endsection