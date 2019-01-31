@extends('layouts.layouts-admin')
@section('title')
Edit - Merchandise
@endsection
@section('content')

            <!-- Breadcome End-->
            <!-- Order Form Start-->
            <div class="login-form-area mg-t-30 mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <form action="{{url('admin/merchandise/update')}}" method="POST" id="adminpro-order-form" class="adminpro-form" enctype="multipart/form-data">
                            <div class="col-lg-12">
                                <div class="login-bg">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="login-title">
                                                <h1>Merchandise</h1>
                                            </div>
                                        </div>
                                    
                                    <form>
                                      <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="inputEmail4">Nama</label>
                                          <input type="hidden" name="id" value="{{$merchandise->id}}">
                                          <input type="text" class="form-control" id="inputEmail4" placeholder="Nama" name="nama" value="{{$merchandise->nama}}">
                                        </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="inputCity">Deskripsi</label>
                                          <textarea id="ckeditor1" type="text" class="form-control" id="inputCity" name="deskripsi" placeholder="Deskripsi" value="">{!!$merchandise->deskripsi!!}</textarea>
                                        </div>
                                 
                                        <br>
                                        <center>
                                          <div class="form-group col-md-4">
                                            <center>
                                                <div class="container">        
                                                  <img src="{{url('picture1/'. $merchandise->logo)}}" alt="Nature" class="responsive" id="blah1" style="width: 300px;height: 300px; margin-left: auto; margin-right: auto;">                                    
                                                    <input name="logo" type="file" class="" style="" onchange="readURL1(this);" >
                                                </div>

                                            </center>
                                          </div>
                                  
                                 
                                      <br>
                                      </div>
                                        <div class="col-lg-12">
                                          <div class="login-input-area">
                                            <button type="submit" class="btn btn-primary" style="float: left; "><i class="fa fa-edit"></i></button>
                                      </div>
                                      </div>
                                      <br>
                                      </div>
                                </form>
                            @csrf
                                </div>
                            </div>
                        </form>
                        <div class="col-lg-3"></div>
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
