@extends('layouts.user')
@section('content')

			<!-- Start training Area -->
		<!--==========================
      Hotels Section
    ============================-->
    <section id="subscribe">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h2>Merchandise Kami</h2>
        </div>


      </div>
    </section>
    <section id="hotels" class="section-with-bg wow fadeInUp">

      <div class="container">
    

        <div class="row">
              <?php
                  $merchandise = \App\Merchandise::all(); 
               ?>
               @foreach($merchandise as $q)

          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="{{ url('images/'.$q->logo)}}" alt="Hotel 1" class="img-fluid" style="width: 382px; height: 309px;">
              </div>
              <h3><a href="#">{{$q->nama}}</a></h3>

              <p>{!!$q->deskripsi!!}</p>
            </div>
          </div>



          @endforeach

        </div>
      </div>

    </section>




			<!-- End training Area -->
									
			
			
@endsection