@extends('admin.app')
@section('content')

<div class="content">
    <div class="row justify-content-center">

        <div class="col-md-8 form-cont">
            <ul class="nav  nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#aa"  data-toggle="pill" role="tab" aria-controls="v-pills-home" aria-selected="true">Retourant Bilgileri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#bb"   data-toggle="pill" role="tab" aria-controls="v-pills-home" aria-selected="true">Menü Görselleri</a>
                </li>
            </ul>
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="aa" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <form id="re-form" enctype='multipart/form-data' action="{{url('/')}}/panel/menu" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label >Restaurant adı</label>
                            <input type="text" name="res_name" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label >Yetkili adı</label>
                            <input type="text" name="res_contact" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label >Telefon</label>
                            <input type="text" name="res_tel" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label >Eposta</label>
                            <input type="text" name="res_eposta" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>adres</label>
                            <input type="text" name="res_adres" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label >Not</label>
                            <input type="text" name="res_not" class="form-control" >
                        </div>


                        <div class="form-group form-check">
                            <div>
                                <input type="radio" name="res_status" checked class="form-check-input" value="1"> Aktif
                            </div>
                            <div>
                                <input type="radio" name="res_status" class="form-check-input" value="0"> Pasif
                            </div>

                        </div>
                        <button type="submit" class="btn btn-block btn-warning">Ekle</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="bb" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <form id="re-form" enctype='multipart/form-data' action="{{url('/')}}/panel/image" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="res_menu_id" value="00">

                        <div class="form-group">
                            <label for="exampleFormControlFile1">Menu resimleri</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" placeholder="Resim Seç" name="res_menu"  multiple="multiple">
                        </div>

                        <button type="submit" class="btn btn-block btn-warning">Ekle</button>
                    </form>
               </div>

            </div>

        </div>
    </div>
</div>
<script>

</script>

@endsection
