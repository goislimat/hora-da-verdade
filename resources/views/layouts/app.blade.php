<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hora da Verdade</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">

</head>
<body id="app-layout">
    <div class="page-wrap">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        It's time!
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        <li><a href="{{ route('index.curso') }}">Cursos</a></li>
                        <li><a href="{{ route('index.usuario') }}">Usuários</a></li>
                        <li><a href="{{ route('index.disciplina') }}">Disciplinas</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (!Auth::guest())
                            <li><a href="{{ url('/logout') }}">Sair <i class="fa fa-btn fa-sign-out fonte-vinho"></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="col-md-9">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <div class="col-md-3">
                @if (Auth::guest())
                    <h4>Ainda não é usuário?</h4>

                    <p>Peça login à um professor e tenha acesso ao Hora da Verdade</p>
                @else
                    <div class="dados-conexao">
                        <h4 class="fonte-verde">Dados de Conexão</h4>

                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong class="fonte-verde">Usuário: </strong>{{ Auth::user()->nome }}
                            </li>
                            <li class="list-group-item">
                                <strong class="fonte-verde">E-mail: </strong>{{ Auth::user()->email }}
                            </li>
                            <li class="list-group-item">
                                <strong class="fonte-verde">Tipo de Usuário: </strong>
                                    @if(Auth::user()->tipo == 1)
                                        Administrador
                                    @elseif(Auth::user()->tipo == 1)
                                        Professor
                                    @else
                                        Aluno
                                    @endif
                            </li>
                            <li class="list-group-item">
                                <strong class="fonte-verde">Endereço de IP: </strong>{{ Request::ip() }}
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <footer class="container-fluid site-footer">
        <div class="col-md-offset-2 col-md-3 footer-content">
            <p>Ajuda</p>
            <p>FAQ</p>
            <p>{{ link_to('http://www.iftm.edu.br/', 'Página principal do IFTM', array('target' => '_blank')) }}</p>
            <p>{{ link_to('https://virtualif.iftm.edu.br/', 'Virtual IFTM', array('target' => '_blank')) }}</p>
        </div>
        <div class="col-md-5 footer-content">
            <p>Sistema de aplicação de provas e trabalhos</p>
            <p>Hora da Verdade</p>
            <p>Desenvolvido por: Thiago Gois</p>
            <p>
                {{ link_to('https://www.facebook.com/thiago.g.lima.1', 'facebook', array('target' => '_blank')) }} -
                {{ link_to('https://twitter.com/thiagogoiis', 'twiter', array('target' => '_blank')) }} -
                {{ link_to('https://www.youtube.com/channel/UCKxNWvf8VFwNt6Avd5aAiyg', 'youtube', array('target' => '_blank')) }}
            </p>
            <p>Plataforma desenvolvida com o framework {{ link_to('http://www.laravel.com', 'Laravel', array('target' => '_blank')) }}</p>
        </div>
    </footer>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    <!-- Scripts from third part -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <!-- <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script> -->
    <!-- <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script> -->

    <!-- Scripts from the project -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
