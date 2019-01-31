@extends('layouts.layouts-admin')
@section('title')
Admin - Berita
@endsection
@section('content')
  <div class="data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="adminpro-order-form" class="adminpro-form">
                                @csrf
                            <div class="sparkline13-list shadow-reset">
                                <div class="sparkline13-hd">
                                    <div class="main-sparkline13-hd">
                                        <h1>Berita<span class="table-project-n"></span></h1>
                                        <div class="sparkline13-outline-icon">
                                            <span class="sparkline13-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span class="sparkline13-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline13-graph">
                                    <div class="datatable-dashv1-list custom-datatable-overright">
                                        <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="false" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar">
                                            <thead>
                                                <tr>
                                                    <th data-field="No">No</th>
                                                    <th data-field="Nama">Judul</th>
                                                    <th data-field="tanggal">Tanggal</th>
                                                    <th data-field="isi">Isi</th>
                                                    <th data-field="penulis">Penulis</th>
                                                    <th data-field="foto">Foto</th>
                                                    <th colspan="2" data-field="action">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $berita = \App\Berita::all();  
                                                ?>
                                                @foreach ($berita as $m)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$m->judul}}</td>
                                                    <td>{{$m->tanggal}}</td>
                                                    <td>{!!$m->isi!!}</td>
                                                    <td>{{$m->penulis}}</td>
                                                    <td><img src="{{ url('images/'.$m->foto) }}" style="width: 70px; height: 70px"></td>
                                                    <td class="datatable-ct"><a href="{{url('admin/berita/edit/'.$m->id)}}"><i class="fa fa-edit"></i></a>
                                                    </td>
                                                    <td class="datatable-ct"><a href="{{url('admin/berita/delete/'.$m->id)}}"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>     
                        </form>
                        </div>
                    </div>
                  <div class="login-bg">
                    <div class="row">
                        <form action="{{url('admin/berita/save')}}" method="POST" id="adminpro-order-form" class="adminpro-form" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-12">
                                
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="login-title">
                                                <center>
                                                <h1>Tambah Berita</h1>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="form-group col-md-12">
                                          <label for="inputEmail4">Judul</label>
                                          <input type="text" class="form-control" id="inputEmail4" placeholder="Judul" name="judul">
                                        </div>   
                                        <div class="form-group col-md-12">
                                          <label for="inputPassword4" hidden="true">Penulis</label>
                                          <input type="hidden" class="form-control" id="inputPassword4" placeholder="Penulis" name="penulis" value="{{ Auth::user()->name }}" readonly>
                                        </div>            
                                        <div class="form-group col-md-12">
                                          <label for="inputCity">Isi</label>
                                          <textarea id="ckeditor1" type="text" class="form-control" id="inputCity" name="isi" placeholder="isi"></textarea>
                                        </div>
                                      <div class="form-row">
                                        <center>
                                          <div class="form-group col-md-12">
                                            <img src="{{asset('images/no-image.png')}}" alt="Nature" class="responsive" id="blah1" style="width: 200px;height: 200px;">
                                            <center>
                                            <label>Foto</label>
                                            </center>
                                          </div>
                                          </center>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <input type="file" class="form-control" id="inputCity" name="foto" onchange="readURL1(this);">
                                        </div>
                                        
                                      </div>
                                      <div class="form-group">
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" style="float: right;"><i class="fa fa-plus"></i></button>
                                        </div>
                                      </div>
                                </form>
                                </div>
                            </div>
                        </form>
                        <div class="col-lg-3"></div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                         function readURL1(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah1')
                            .attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>
            </div>
@endsection