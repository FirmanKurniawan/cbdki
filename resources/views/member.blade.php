@extends('layouts.user')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
 <section id="subscribe">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h2>Cari Member</h2>
        </div>

          <div class="form-row justify-content-center">
            <div class="col-auto">
              <input type="text" class="form-control" placeholder="Masukkan No Identitas" name="nama" id="data">
            </div>
            <div class="col-auto">
              <button class="btn btn-primary" id="submit" data-toggle="modal" data-target="#exampleModal">Cari</button>
            </div>
          </div>
      </div>
    </section>

    {{-- AWAL JAVASCRIPT --}}
    <script type="text/javascript">
	   $(document).ready(function() {
	    $('#submit').click(function() {
	        $.ajaxSetup({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            }
	        });
	        var id = document.getElementById('data').value;
	        $.ajax({
	             type:"GET",
	             url:"search2/" + id,
	             success : function(results) {
	              if (results.no_identitas) {
	                  document.getElementById('nama').innerHTML =
	                    '<label>Nama : </label>' +
	                    '<input class="form-control" type="text" readonly style="background-color:#fff;" value="'+results.nama+'">';
	                  document.getElementById('alamat').innerHTML =
	                    '<label>Alamat : </label>' +
	                    '<input class="form-control" type="text" readonly style="background-color:#fff;" value="'+results.alamat+'">';
	                  document.getElementById('no_identitas').innerHTML =
	                    '<label>No Identitas : </label>' +
	                    '<input class="form-control" type="text" readonly style="background-color:#fff;" value="'+results.no_identitas+'">';
	                  $('#no_identitas').val(results.no_identitas)
	                  document.getElementById('gambar').innerHTML = 
	                    '<img src="images/'+results.foto+' "class="bulat2" style="margin-left:30px;"/>';
	                  }else{
	                    document.getElementById('no_identitas1').innerHTML =
	                    '<center><h1><i class="fas fa-times-circle fa-6x" style="color:red;margin-bottom:50px;margin-left:30px;"></i></h1></center>'+
	                    '<h2 style="margin-left:30px;">IDENTITAS TIDAK TERSEDIA</h2>';
	                  }
	             }
	        }); 
	    });
	}); 
	</script>
    {{-- AKHIR JAVASCRIPT --}}

    {{-- AWAL MODAL --}}
    <!-- Modal -->
	<div class="modal fade" id="exampleModal">
	  <div>
	    <div class="modal-content" style="width: 500px;height: auto;margin-left: auto;margin-right: auto;margin-top: 7%;">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Cari Anggota</h5>
	        <form action="{{url('/member')}}">
	        <button type="submit" class="close" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	        </form>
	      </div>
	      <div class="modal-body">
	      <div class="row">
	        <div class="float-left">
	          <br>
	         <div id="gambar" class="img-fluid">
	         </div>
	         </div>
	         <div class="float-right" style="margin-left: 30px;">  
	          <div id="nama"></div>
	      <br>
	      <div id="alamat"></div>
	      <br>
	      <div id="no_identitas"></div>
	      <div id="no_identitas1"></div>
	          <!-- {{-- <img src="{{url('images/'.$foto)}}"> --}} -->

			</div>
		</div>
	      </div>
	    </div>
	  </div>
	</div>
    {{-- AKHIR MODAL --}}

<section id="schedule" class="section-with-bg">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h2>Kordinasi Wilayah</h2>
        </div>
        	<?php
                $i = 1;
               	$kiwil = App\Korwil::all();
             ?>
        @foreach($kiwil as $k)
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" href="#day-{{$k->id}}" role="tab" data-toggle="tab">{{$k->nama}}</a>
          </li>
        </ul>
        @endforeach
        <?php
        	$km = App\Korwilmember::where('idkorwil',$k->id)->get();
        ?>
        <h3 class="sub-heading">Voluptatem nulla veniam soluta et corrupti consequatur neque eveniet officia. Eius
          necessitatibus voluptatem quis labore perspiciatis quia.</h3>

        <div class="tab-content row justify-content-center">

          <!-- Schdule Day 1 -->
          <div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">

            <div class="row schedule-item">
              <div class="col-md-2"><time>09:30 AM</time></div>
              <div class="col-md-10">
                <h4>Registration</h4>
                <p>Fugit voluptas iusto maiores temporibus autem numquam magnam.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>10:00 AM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="{{asset('u/img/speakers/1.jpg')}}" alt="Brenden Legros">
                </div>
                <h4>Keynote <span>Brenden Legros</span></h4>
                <p>Facere provident incidunt quos voluptas.</p>
              </div>
            </div>

          </div>
          <!-- End Schdule Day 1 -->
        </div>

      </div>

    </section>
    @endsection