@extends('layouts.layouts-admin')
@section('title')
Admin - Profile
@endsection
@section('content')

            <!-- Breadcome End-->
            <!-- Order Form Start-->
            <div class="login-form">
                <div class="container-fluid">
                    <div class="row">
                        <form action="{{url('admin/profile/update/{id}')}}" method="POST" id="adminpro-order-form" class="adminpro-form" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-12">
                                <div class="login-bg">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="login-title">
                                                <h1>Profile</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $profile = \App\Profile::all()->where('id', 1);
                                    ?>
                                    @foreach($profile as $p)
                                    <form>
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="inputEmail4">Nama</label>
                                          <input type="hidden" name="id" value="{{$p->id}}">
                                          <input type="text" class="form-control" id="inputEmail4" placeholder="Nama" name="nama" value="{{$p->nama}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="inputPassword4">Email</label>
                                          <input type="email" class="form-control" id="inputPassword4" placeholder="Email" name="email" value="{{$p->email}}">
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="inputEmail4">Alamat</label>
                                          <textarea type="text" class="form-control" id="inputEmail4" placeholder="Alamat" name="alamat" value="">{{$p->alamat}}</textarea>
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="inputPassword4">Telepon</label>
                                          <input type="number" class="form-control" id="inputCity" name="telepon" placeholder="62...." value="{{$p->telepon}}">
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="inputCity">Link You Tube</label>
                                          <input type="text" class="form-control" id="inputCity" name="linkyt" placeholder="Input URL in here" value="{{$p->linkyt}}">
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="inputCity">Facebook</label>
                                          <input type="text" class="form-control" id="inputCity" name="facebook" placeholder="Input URL in here" value="{{$p->facebook}}">
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="inputCity">Twitter</label>
                                          <input type="text" class="form-control" id="inputCity" name="twitter" placeholder="Input URL in here" value="{{$p->twitter}}">
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="inputCity">Instagram</label>
                                          <input type="text" class="form-control" id="inputCity" name="instagram" placeholder="Input URL in here" value="{{$p->instagram}}">
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="inputCity">Pengantar 1</label>
                                          <textarea id="ckeditor1" type="text" class="form-control" id="inputCity" name="pengantar1" placeholder="Pengantar 1" value="">{{$p->pengantar1}}</textarea>
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="inputCity">Pengantar 2</label>
                                          <textarea id="ckeditor2" type="text" class="form-control" id="inputCity" name="pengantar2" placeholder="Pengantar 2" value="">{{$p->pengantar2}}</textarea>
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="inputCity">Pengantar 3</label>
                                          <textarea id="ckeditor3" type="text" class="form-control" id="inputCity" name="pengantar3" placeholder="Pengantar 3" value="">{{$p->pengantar3}}</textarea>
                                        </div>
                                      </div>
                                      {{-- <div class="form-row">
                                          <div class="form-group col-md-4">
                                            <img src="{{asset('images/201901221517025c4733ee8e39a.png')}}" alt="Nature" class="responsive">
                                            <center>
                                            <label>afas</label>
                                            </center>
                                          </div>
                                          <div class="form-group col-md-4">
                                            <img src="{{asset('images/201901221517025c4733ee8e39a.png')}}" alt="Nature" class="responsive">
                                          </div>
                                          <div class="form-group col-md-4">
                                            <img src="{{asset('images/201901221517025c4733ee8e39a.png')}}" alt="Nature" class="responsive">
                                          </div>
                                      </div> --}}
                                      <div class="form-row">
                                        <center>
                                          <div class="form-group col-md-4">
                                            <img src="{{url('images/'. $p->gambar_depan)}}" alt="Nature" class="responsive" id="blah1" style="width: 200px;height: 200px;">
                                            <center>
                                            <label>Gambar Depan</label>
                                            </center>
                                          </div>
                                          </center>
                                          <center>
                                          <div class="form-group col-md-4">
                                            <img src="{{url('images/'. $p->gambar_about)}}" alt="Nature" class="responsive" id="blah2" style="width: 200px;height: 200px;">
                                            <center>
                                            <label>Gambar About</label>
                                            </center>
                                          </div>
                                          </center>
                                          <center>
                                          <div class="form-group col-md-4">
                                            <img src="{{url('images/'. $p->gambar_bawah)}}" alt="Nature" class="responsive" id="blah3" style="width: 200px;height: 200px;">
                                            <center>
                                            <label>Gambar Bawah</label>
                                            </center>
                                          </div>
                                          </center>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-4">
                                          <input id="ckeditor3" type="file" class="form-control" id="inputCity" name="gambar_depan" onchange="readURL1(this);">
                                        </div>
                                        <div class="form-group col-md-4">
                                          <input id="ckeditor3" type="file" class="form-control" id="inputCity" name="gambar_about" onchange="readURL2(this);">
                                        </div>
                                        <div class="form-group col-md-4">
                                          <input id="ckeditor3" type="file" class="form-control" id="inputCity" name="gambar_bawah" onchange="readURL3(this);">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" style="margin-left: 3%;"><i class="fa fa-edit"></i></button>
                                        </div>
                                      </div>
                                </form>
                                    @endforeach
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
            <script type="text/javascript">
                         function readURL2(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah2')
                            .attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>
            <script type="text/javascript">
                         function readURL3(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah3')
                            .attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>
            @endsection