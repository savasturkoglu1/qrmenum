@extends('admin.app')
@section('content')

<div class="content">
    <div class="row  justify-content-center">
        <div class="col-md-8">
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand">Restaurantlar</a>
                <a class="btn btn-primary" href="/panel/menu/create">Restaurant Ekle</a>
            </nav>
            <div class="li-wrap">
                <ul class="list-group list-group-flush">
                    @foreach($menu as $mn)
                        <li class="list-group-item">{{$mn->res_name}}   <a class="btn btn-light float-right" href="{{url('/')}}/panel/menu/ {{$mn->id}}/edit"> düzenle  </a> </li>
                    @endforeach

                </ul>

                {{ $menu->links() }}
            </div>
        </div>

    </div>
</div>
<script>

</script>

@endsection
