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
                      '<label>alamat : </label>' +
                      '<input class="form-control" type="text" readonly style="background-color:#fff;" value="'+results.alamat+'">';
                  document.getElementById('no_identitas').innerHTML =
                      '<label>No Identitas : </label>' +
                      '<input class="form-control" type="text" readonly style="background-color:#fff;" value="'+results.no_identitas+'">';
                  document.getElementById('gambar').innerHTML =
                      '<img src="images/'+results.foto+' "class="bulat2" style="width:20%;"/>';
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
  <div class="container" id="modal-kotak">
    <div>
     
      <div class="modal-body">
          <center>
          <div id="gambar"></div>
          </center>
          <center>
          <div class="col-md-6">
          <div id="nama"></div>
          <div id="alamat"></div>
          <div id="no_identitas"></div>
          <div id="bawah">
            <button id="tombol-tutup" class="btn btn-primary">Tutup</button>
          </div>
          </div>
          </center>
      </div>
    </div>
  </div>
  <div id="bg"></div>
  <div class="container" id="modal-kotak2">
    <div id="atas">
      <center>
      <div hidden="true" id="nama23"></div>
      <button id="tombol-tutup2" class="btn btn-primary" aria-label="Close">Data Tidak Ditemukan</button>
      </div>
      </center>
    </div>
  </div>
    {{-- AKHIR MODAL --}}

<section id="hotels" class="section-with-bg wow fadeInUp">
    <h1 class="text-center">Kordinasi Wilayah</h1>

      <div class="container">
    
   
   <br>
   <br>
        <div class="row">
        <?php
          $kiwil = App\Korwil::all();
        ?>
        @foreach($kiwil as $k)

          <div class="col-lg-4 col-md-6">
        
              <div class="hotel-img">
                <img src="{{url('images/'.$k->logo)}}" alt="Hotel 1" class="bulat">
              </div>
              <h3><a href="#">{{$k->nama}}</a></h3>

              <p>{!!$k->keterangan!!}</p>
              <p>Anggota :</p>
              <?php
                  $km = App\Korwilmember::where('idkorwil',$k->id)->get();
              ?>
              @foreach($km as $ka)
                <p> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-right"></i> &nbsp;<img src="{{url('images/'.$ka->logo)}}" class="bulat" style="width: 50px; height: 50px;">&nbsp;&nbsp;{{$ka->nama}}&nbsp;&nbsp;({{$ka->kode}})</p>

                @endforeach
            </div>
         



          @endforeach

        </div>
      </div>

    </section>
<style type="text/css">
  body{
  background: #ecf0f1;
  font-family: sans-serif;
  font-size: 11pt;
}
#modal-kotak{
  position:sticky;
  width: 50%;
  z-index:1002;
  display: none;
  background: white;  
  border-radius: 10px;
}
#modal-kotak2{
  position:sticky;
  width: 70%;
  z-index:1002;
  display: none;
  background: white;
  border-radius: 10px;
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
}
</style>
    </section>
    @endsection