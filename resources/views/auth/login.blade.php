@extends('layouts.auth')

@section('content')
    <div>
        <div class="text-center logo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="">
        </div>
        <div class="login-main">
            <div class="text-center">
                <h3>ENTRAR N0 REI DA BLAZE</h3>
            </div>
            <div>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
                    </div>
                    <div class="form-group my-3">
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                            placeholder="Senha">
                    </div>
                    <div class="text-center my-3">
                        <button type="submit" class="btn-index">ENTRAR</button>
                    </div>
                </form>
            </div>
            <div class="icons-grid">
                <div>
                   <a href="https://www.instagram.com/blaze.boot/" target="_blank"><img src="{{ asset('assets/img/instagram.svg') }}" alt=""></a>
                </div>
                <div>
                   <a href="https://api.whatsapp.com/send?phone=5521980299589&text=Quero%20comprar%20o%20boot" target="_blank"> <img src="{{ asset('assets/img/whatsapp.svg') }}" alt=""></a>
                </div>
            </div>
            <div class="text-center my-3 mb-3 pb-5">
                <a href="https://api.whatsapp.com/send?phone=5521980299589&text=Quero%20comprar%20o%20boot" target="_blank"> <button
                        type="button" class="btn-green">QUERO COMPRAR O BOT AGORA!</button></a>
            </div>
        </div>
    </div>
@endsection
