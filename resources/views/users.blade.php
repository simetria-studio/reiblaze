@extends('layouts.painel')
@section('content')
    <div class="main">
        <div class="container">
            <div class="pt-4">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->permission == 1)
                                        <span class="text-success">Ativo</span>
                                    @elseif($user->permission == 10)
                                        Admin
                                    @else
                                        <span class="text-danger">Desativado</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div>
                                            @if ($user->permission == 1)
                                                <form action="{{ route('user.status', $user->id) }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="status" value="0">
                                                    <button type="submit" class="btn btn-sm btn-danger">Desativar</button>
                                                </form>
                                            @elseif($user->permission == 0)
                                                <form action="{{ route('user.status', $user->id) }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="status" value="1">
                                                    <button type="submit" class="btn btn-sm btn-success">Ativar</button>
                                                </form>
                                            @endif

                                        </div>
                                        <div class="mx-2">
                                            <a href="{{ route('user.edit', $user->id) }}"><button
                                                    class="btn  btn-sm btn-primary">Editar</button></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
