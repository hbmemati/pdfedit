@extends('app')
@section('title')
    Anasayfa
@endsection
@section('content')


    <div class="row d-flex justify-content-center  col-mb-50 mb-0">


        <div class=" col-lg-10">
            <h2 class=" mt-5 text-uppercase text-center mb-5">Hoşgeldin, {{\Illuminate\Support\Facades\Auth::user()->name}}</h2>
            @if(\Illuminate\Support\Facades\Auth::user()->admin)
            <form method="post" action="{{route('pdf.upload')}}" enctype="multipart/form-data">
                @csrf
            <div class="input-group">
                <label class="input-group-text" for="inputGroupFile01">PDF Değiştir</label>
                <input type="file" class="form-control" name="pdf" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04"
                       aria-label="Upload" />
                <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">
                    Değiştir
                </button>
            </div>
            </form>
            <section class="pb-4">
                <div class="bg-white border rounded-5">

                    <section class="w-100 p-4 text-center">


                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ad</th>
                                <th scope="col">Mail</th>
                                <th scope="col">Durum</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>@if(!$user->admin) @if(!$user->active)<a href="{{route('active', ['id'=>$user->id])}}">Aktif yap</a>  @else
                                            <a href="{{route('passive', ['id'=>$user->id])}}">Pasif yap</a>  @endif
                                        <br><a
                                            href="{{route('delete', ['id'=>$user->id])}}">Sil</a> @else <p class="text-danger">Admin </p> @endif</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </section>

                </div>
            </section>
            @endif
        </div>



        <div class=" col-lg-5">
            <form method="post" action="{{route('pdf.download')}}" >
                @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Ad Soyad"
                       name="name"
                       aria-label="Recipient's username"
                       aria-describedby="button-addon2"/>
                <button class="btn btn-outline-primary" type="submit" id="button-addon2" data-mdb-ripple-color="dark">
                    PDF İndir
                </button>
            </div>
            </form>
        </div>

    </div>

@endsection

@section('js')


@endsection
