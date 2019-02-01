@extends('layouts.user')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<style type="text/css">
  .bulat{
border-radius:100em;
opacity:1;
width:200px;
height:200px;
}
</style>
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
              <button class="btn btn-primary" id="submit">Cari</button>
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
                      '<label>Nama : </label>' +
                      '<input class="form-control" type="text" readonly style="background-color:#fff;" value="'+results.alamat+'">';
                  document.getElementById('no_identitas').innerHTML =
                      '<label>Nama : </label>' +
                      '<input class="form-control" type="text" readonly style="background-color:#fff;" value="'+results.no_identitas+'">';
                  document.getElementById('gambar').innerHTML =
                      '<img src="images/'+results.foto+' "class="bulat2" style="width:30%;"/>';
                    $(document).ready(function(){
                     
                              $('#modal-kotak , #bg').fadeIn("slow");
                               
                          $('#tombol-tutup').click(function(){
                            $('#modal-kotak , #bg').fadeOut("slow");
                          });
                        });
                    }else{
                      document.getElementById('nama23').innerHTML =
                      '<label>Data Tidak Ditemukan</label>';
                        $(document).ready(function(){
                              $('#modal-kotak2 , #bg').fadeIn("slow");
                          $('#tombol-tutup2').click(function(){
                            $('#modal-kotak2 , #bg').fadeOut("slow");
                          });
                        });
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
      <div class="modal-content" style="width: 100%;height: 100%;margin-left: auto;margin-right: auto;">
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
           </div>
           <div class="float-right" style="margin-left: 30px;">
            {{--  --}}
            <div class="col">
            </div>
            <div class="col">
            </div>
          </div>
          {{--  --}}
        <br>
        {{--  --}}
            <div class="col">
            </div>
            <div class="col">
            </div>
          </div>
          {{--  --}}
        <br>
        {{--  --}}
            <div class="col">
            </div>
            <div class="col">
            </div>
          </div>
          {{--  --}}
        <div id="no_identitas1" style="margin-left: auto;margin-right: auto;"></div>
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
        <div style="margin-top: 2%;">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
                  <img src="{{url('images/'.$k->logo)}}" class="bulat">
                  <br>
                  <br>
            <a class="nav-link active" href="#day-1" role="tab" data-toggle="tab">{{$k->nama}}</a>
          </li>
        </ul>
        <h3 class="sub-heading">{!!$k->keterangan!!}</h3>
        <?php
            $km = App\Korwilmember::where('idkorwil',$k->id)->get();
        ?>
        <div class="tab-content row justify-content-center">

          <!-- Schdule Day 1 -->
          <div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">
            <div class="row schedule-item">
              <div class="col-md-2"><time>Kode</time></div>
              <div class="col-md-10">
                <h4>Daftar Member Korwil</h4>
              </div>
            </div>
            @foreach($km as $ka)
            <div class="row schedule-item">
              <div class="col-md-2"><time>{{$ka->kode}}</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="{{asset('u/img/speakers/1.jpg')}}" alt="Brenden Legros">
                </div>
                <h4>{{$ka->nama}}</h4>
                <p>Registrasi : {{$ka->created_at}}</p>
              </div>
            </div>
            @endforeach
          </div>
          <!-- End Schdule Day 1 -->
        </div>
        </div>

    {{-- AWAL MODAL --}}
  <div class="container" id="modal-kotak">
    <div>
     
      <div class="modal-body">
        <div class="row">
          <center>
          <div id="gambar"></div>
          </center>
          <div>
          <div id="nama"></div>
          <div id="alamat"></div>
          <div id="no_identitas"></div>
          <div id="bawah">
            <button id="tombol-tutup" class="btn btn-primary">CLOSE</button>
          </div>
          </div>
          </div>
      </div>
    </div>
  </div>
  <div id="bg"></div>
  <div id="modal-kotak2">
    <div id="atas">
      <center>
      <div hidden="true" id="nama23"></div>
      <button id="tombol-tutup2" class="btn btn-primary" aria-label="Close">Data Tidak Ditemukan</button>
      </div>
      </center>
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
        <div style="margin-top: 2%;">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
                  <img src="{{url('images/'.$k->logo)}}" class="bulat">
                  <br>
                  <br>
            <a class="nav-link active" href="#day-1" role="tab" data-toggle="tab">{{$k->nama}}</a>
          </li>
        </ul>
        <h3 class="sub-heading">{!!$k->keterangan!!}</h3>
        <?php
            $km = App\Korwilmember::where('idkorwil',$k->id)->get();
        ?>
        <div class="tab-content row justify-content-center">

          <!-- Schdule Day 1 -->
          <div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">
            <div class="row schedule-item">
              <div class="col-md-2"><time>Kode</time></div>
              <div class="col-md-10">
                <h4>Daftar Member Korwil</h4>
              </div>
            </div>
            @foreach($km as $ka)
            <div class="row schedule-item">
              <div class="col-md-2"><time>{{$ka->kode}}</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="{{asset('u/img/speakers/1.jpg')}}" alt="Brenden Legros">
                </div>
                <h4>{{$ka->nama}}</h4>
                <p>Registrasi : {{$ka->created_at}}</p>
              </div>
            </div>
            @endforeach
          </div>
          <!-- End Schdule Day 1 -->
        </div>
        </div>

        @endforeach
      </div>
<style type="text/css">
  body{
  background: #ecf0f1;
  font-family: sans-serif;
  font-size: 11pt;
}
#modal-kotak{
  height: auto;
  width: auto;
  position:relative;
  z-index:1002;
  display: none;
  background: white;  
  border-radius: 10px;
}
#modal-kotak2{
  height: auto;
  width: auto;
  position:relative;
  z-index:1002;
  display: none;
  background: white;  
}
#atas{
  font-size: 15pt;
  padding: 20px;  
  height: 80%;
}
#bawah{
  background: #fff;
}
 
#tombol-tutup{
  margin-top: 10px;
}
#tombol-tutup2{
  margin-top: 10px;
  margin-left: 1%;
}
#tombol-tutup,#tombol{
  height: 30px;
  width: 100px;
  color: #fff;
  border: 0px;
}
#bg{
  opacity:.80;
  position: absolute;
  display: none;
  position: fixed;
  top: 0%;
  left: 0%;
  width: 100%;
  height: 100%;
  background-color: #000;
  z-index:1001;
  opacity: 0.8;
}
#tombol{
  background: #e74c3c;        
}


@media screen and (max-width: 960px) {

.container{
  margin-left: 0;
} 
}
}
</style>
    </section>
    @endsection