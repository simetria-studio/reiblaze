<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BLAZE BOOT</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/0ab2bcde1c.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/main.min.css') }}">
    <title>BLAZE BOOT</title>
</head>

<body>
    <div class="head">
        <div class="head-grid">
            <div class="font">
                <h2>BLAZE BOOT</h2>
            </div>
            <div>
                <div class="img-logo">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="">
                </div>
            </div>
            <div data-toggle="modal" data-target="#exampleModal">
                <img src="{{ asset('assets/img/gear.svg') }}" alt="">
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Configurações</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update.user', auth()->user()->id) }}" method="post">
                    <div class="modal-body">
                        <div class="">
                            <div class="container mt-4 form">
                                <h4>Editar Usuário {{ auth()->user()->name }}</h4>

                                @csrf
                                <div class="form-group">
                                    <input type="email" placeholder="email" value="{{ auth()->user()->email }}"
                                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                        disabled>
                                    <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control"
                                        value="{{ auth()->user()->name }}" placeholder="Nome">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Senha">
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>

                    </div>
                </form>
                <div class="text-left m-3">
                      <a  class="btn btn-primary" href="{{ route('sair') }}">Sair</a>
                </div>
            </div>
        </div>
    </div>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    @if (Session::has('success'))
        <script type="text/javascript">
            Swal.fire({
                title: 'Sucesso!',
                icon: 'success',
                text: "{{ Session::get('success') }}",
                timer: 5000,
                type: 'success'
            }).then((result) => {
                // Reload the Page
                location.reload();
            });
        </script>
    @endif
</body>

</html>
