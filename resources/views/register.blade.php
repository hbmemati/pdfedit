@extends('app')
@section('title')
    Üye ol
@endsection
@section('content')
    <section class="vh-100 bg-image"
             style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Yeni üyelik oluştur</h2>

                                <form method="post" id="form" action="{{route('register.register')}}">
                                    @csrf
                                    <div class="form-outline mb-4">
                                        <input type="text" name="name" id="form3Example1cg"
                                               class="form-control form-control-lg"/>
                                        <label class="form-label" for="form3Example1cg">İsim</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="email" name="email" id="form3Example3cg"
                                               class="form-control form-control-lg"/>
                                        <label class="form-label" for="form3Example3cg">Email</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" name="password" id="form3Example4cg"
                                               class="form-control form-control-lg"/>
                                        <label class="form-label" for="form3Example4cg">Şifre</label>
                                    </div>


                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input
                                            class="form-check-input me-2"
                                            type="checkbox"
                                            value=""
                                            name="check"
                                            id="form2Example3cg"
                                        />
                                        <label class="form-check-label" for="form2Example3g">
                                            <a href="#!" class="text-body"><u>Servis kullanım koşullarını</u></a> kabul
                                            ediyorum
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                                class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">
                                            Üye ol
                                        </button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Üyeliğiniz var mı ? <a
                                            href="{{route('login.index')}}" class="fw-bold text-body"><u>Giriş
                                                yap</u></a></p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script>
        var reply_click = function()
        {
            var aVariable = document.querySelector('#form2Example3cg:checked');
            if(aVariable != null)
            {
                document.getElementById('form2Example3cg').value='checked';
            }
            else
                document.getElementById('form2Example3cg').value='';
        }


        document.getElementById('form2Example3cg').onclick = reply_click;
    </script>
@endsection
