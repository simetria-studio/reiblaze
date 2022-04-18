@extends('layouts.painel')
@section('content')
    <div class="main">
        <div class="add-user">
            <div class="container mt-4 form">
                <h4>Editar Usuário {{ $user->name }}</h4>
                <form action="{{ route('user.update', $user->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" placeholder="email" value="{{ $user->email }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control"  placeholder="Senha">
                    </div>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </form>
            </div>
        </div>

    </div>
@endsection
