@extends('layouts.user')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<style type="text/css">
  .bulat{
border-radius:100em;
opacity:1;
width:100px;
height:100px;
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
                      '<img src="images/'+results.foto+' "class="bulat2" style="margin-left:auto;width:30%;"/>';
                    }else{
                      document.getElementById('no_identitas1').innerHTML =
                      '<center><h1><i class="fas fa-times-circle fa-3x"></i></h1></center>'+
                      '<h2>IDENTITAS TIDAK TERSEDIA</h2>';
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
           <div id="gambar" class="img-fluid"></div>
           </div>
           <div class="float-right" style="margin-left: 30px;">
            {{--  --}}
            <div class="row" id="nama">
            <div class="col">
            </div>
            <div class="col">
            </div>
          </div>
          {{--  --}}
        <br>
        {{--  --}}
            <div class="row" id="alamat">
            <div class="col">
            </div>
            <div class="col">
            </div>
          </div>
          {{--  --}}
        <br>
        {{--  --}}
            <div class="row" id="no_identitas">
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

<section id="hotels" class="section-with-bg wow fadeInUp">
  <h1 class="text-center">Kordinasi Wilayah</h1>
  <br>
  <br>
      <div class="container">
    

        <div class="row">
              <?php
                  $korwil = \App\Korwil::all(); 
               ?>
               @foreach($korwil as $key)

          <div class="col-lg-6 col-md-6">
            
              <div class="hotel-img">
<h3><img src="{{ url('images/'.$key->logo)}}" class="bulat">&nbsp;&nbsp;{{$key->nama}}</h3>
              </div>
                <?php
                                    $km = App\Korwilmember::where('idkorwil',$key->id)->get();
                                 ?>
                                 @foreach($km as $ka)
                                <ol style="list-style-type: none;">
                                  <li style="color: black;">
                                    <br>  &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-right"></i> &nbsp;<img src="{{url('images/'.$ka->logo)}}" style="width: 50px;">&nbsp;{{$ka->nama}}&nbsp;({{$ka->kode}})    </li>
                                    </ol>
                                    @endforeach
<br>

          
          </div>



          @endforeach

        </div>
      </div>

    </section>

    </section>
    @endsection