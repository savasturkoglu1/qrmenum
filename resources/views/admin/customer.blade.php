@extends('admin.app')
@section('content')

    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8 top-60">
                <h1>{{$menu->res_name}}</h1>
            </div>
            <div class="col-md-8 form-cont">

                <nav class="navbar navbar-light bg-light">
                    <a href="/panel">Geri</a>
                    <button class="btn btn-denger" onclick="sil({{$menu->id}})">Sil</button>
                </nav>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link " href="#aa"  data-toggle="pill" role="tab" aria-controls="v-pills-home" aria-selected="true">Retourant Bilgileri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#bb"   data-toggle="pill" role="tab" aria-controls="v-pills-home" aria-selected="true">Menü Görselleri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="#qq"   data-toggle="pill" role="tab" aria-controls="v-pills-home" aria-selected="true">QR Code</a>
                    </li>
                </ul>
                <div class="tab-content" id="v-pills-tabContent">

                    <div class="tab-pane fade" id="qq" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <button class="btn btn-primary" id="indir">İndir</button>
                        <div id="qr">
                            {!! QrCode::size(650)->generate(url('/').'/menu/'.$menu->res_slug); !!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="aa" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <form id="re-form" enctype='multipart/form-data' action="{{url('/')}}/panel/menu/{{$menu->id}}" method="POST">

                            {{ csrf_field() }}
                            {{method_field('patch')}}
                            <div class="form-group">
                                <label >Restaurant adı</label>
                                <input type="text" name="res_name" class="form-control" value="{{$menu->res_name}}" >
                            </div>
                            <div class="form-group">
                                <label >Yetkili adı</label>
                                <input type="text" name="res_contact" class="form-control"  value="{{$menu->res_contact}}" >
                            </div>
                            <div class="form-group">
                                <label >Telefon</label>
                                <input type="text" name="res_tel" class="form-control"   value="{{$menu->res_tel}}" >
                            </div>
                            <div class="form-group">
                                <label >Eposta</label>
                                <input type="text" name="res_eposta" class="form-control"   value="{{$menu->res_eposta}}" >
                            </div>
                            <div class="form-group">
                                <label>adres</label>
                                <input type="text" name="res_adres" class="form-control"   value="{{$menu->res_adres}}" >
                            </div>
                            <div class="form-group">
                                <label >Not</label>
                                <input type="text" name="res_not" class="form-control"   value="{{$menu->res_not}}" >
                            </div>


                            <div class="form-group form-check">
                                <div>
                                    <input type="radio" name="res_status" @if($menu->res_status==1) checked @endif class="form-check-input" value="1"> Aktif
                                </div>
                                <div>
                                    <input type="radio" name="res_status"  @if($menu->res_status==0) checked @endif class="form-check-input" value="0"> Pasif
                                </div>

                            </div>
                            <button type="submit" class="btn btn-block btn-warning">Kaydet</button>
                        </form>
                    </div>
                    <div class="tab-pane fade  show active" id="bb" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <form id="re-form" enctype='multipart/form-data' action="{{url('/')}}/panel/image" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="img_menu_id" value="{{$menu->id}}">


                            <div class="form-group">
                                <label for="exampleFormControlFile1">Menu Başlığı</label>
                                <input type="text" class="form-control" placeholder="Aparatifler, kids menu ..." name="img_tag"  multiple="multiple">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Menu resimleri</label>
                                <input type="file" class="form-control-file" placeholder="Resim Seç" name="image[]"  multiple="multiple">
                            </div>

                            <button type="submit" class="btn btn-block btn-warning">Ekle</button>
                        </form>
                        <div class="imge-content">
                            <div class="row" id="yukres">
                                @foreach($images as $img)
                                    <div class="col-md-6 yukluresim"  id="res{{$img->id}}"  data-id="{{$img->id}}" data-num="{{$img->img_sira}}">
                                        <div class="img-cont">
                                             <div class="img-info">
                                                 {{$img->img_tag}}
                                                 <button class="btn btn-sm float-right" onclick="imgSil({{$img->id}})">Sil</button>
                                             </div>
                                            <img class="menu-img" src=" {{$img->img_url}} " alt="" onclick="lightBox()">
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <script>


        $('#indir').click(function () {
            domtoimage.toJpeg(document.getElementById('qr'), {
                    quality: 0.95
                })
                .then(function (dataUrl) {
                    let link = document.createElement('a')
                    link.download = 'imageQR.jpeg'
                    link.href = dataUrl
                    link.click()
                })
        })

          function sil(i) {
              let url = '{{url('/')}}/panel/menusil/'+i;
              Swal.fire({
                  title: 'Emin misinizz?',
                  text: "Bu kaydı silmek istediğinizden emin misin ilker abi ?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Sil kardeşim!'
              }).then((result) => {
                  if (result.value) {
                      window.location.href = url;
                  }
              })
          }

          function imgSil(i) {
              let url = '{{url('/')}}/panel/image/'+i;
              Swal.fire({
                  title: 'Emin misinizz?',
                  text: "Bu kaydı silmek istediğinizden emin misin ilker abi ?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Sil kardeşim!'
              }).then((result) => {
                    $.ajax({
                        type:'delete',
                        method:'delete',
                        url:url,
                        success:function (a) {
                            location.reload();
                        }
                    })
              })
          }

    </script>

    <script>
        $(function() {
            $( "#yukres" ).sortable({
                stop:function () {
                    $('.yukluresim').each(function (e) {
                        $(this).attr({'data-num':e});
                    });
                    sira();
                }
            });
        } );


        function sira() {
            $('.yukluresim').each(function () {
                var id=$(this).attr('data-id');
                var num=$(this).attr('data-num');

                $.ajax({
                    type:'get',
                    url:'/panel/resimsirala',
                    data:{
                        'id':id,
                        'num':num,
                    },
                    success:function () {

                    }

                });
            });
        }
    </script>

@endsection
