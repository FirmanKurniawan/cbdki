@extends('layouts.user')
@section('content')
  <section id="subscribe">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h2>Detail Berita</h2>
        </div>


      </div>
    </section>
    <section id="speakers-details" class="wow fadeIn">
      <div class="container">
       
        <div class="row">
          <div class="col-md-6">
            <img src="{{asset('images/'.$baca->foto)}}" alt="Speaker 1" class="img-fluid">
          </div>

          <div class="col-md-6">
            <div class="details">
              <h2>{{$baca->judul}}</h2>
              <p> {!!$baca->isi!!}</p>
 
           
            </div>
          </div>
          
        </div>
      </div>

    </section>
            <!-- End blog-posts Area -->
            
@endsection

