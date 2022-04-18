@extends('layouts.painel')
@section('content')
    <div class="main">
        <div class="add-user">
            <div class="container mt-4 form">
                <h4>Criar Novo Usuário</h4>
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" placeholder="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Nome">
                    </div>
                    <button type="submit" class="btn btn-primary">criar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
