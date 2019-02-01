@extends('layouts.user')
@section('content')
 <!--==========================
      Speakers Section
    ============================-->
    <br>
    <section id="subscribe">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h2>Berita Kami</h2>
        </div>


      </div>
    </section>
    <section id="speakers" class="wow fadeInUp">
      <div class="container">

        <div class="row">
            <?php
           $berita = \App\Berita::latest()->paginate(env('PER_PAGE'));

        ?>
        @foreach($berita as $br)
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="{{asset('images/'.$br->foto)}}" alt="Speaker 1" class="img-fluid" style="width: 350px; height: 350px;">
              <div class="details">
                <h3><a href="{{url('berita-detail/'.$br->id)}}">{!!str_limit(strip_tags($br->judul), 10) !!}</a></h3>
                <p>{!!str_limit(strip_tags($br->isi), 100) !!}</p>
              </div>
            </div>
          </div>
          <!-- END FOREACH BERITA  -->

         
         @endforeach

        </div>
       
        {!! $s->render() !!}
      </div>

    </section>
	
			<!-- End blog-posts Area -->
			
@endsection

