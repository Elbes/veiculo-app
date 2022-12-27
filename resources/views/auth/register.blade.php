@extends('auth.layout-auth')

@section('content')

<!-- Container-fluid starts -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">

            <form class="md-float-material form-material" action="{{ url('/usuario-incluir') }}" method="POST">
                @csrf
                <div class="text-center">
                    <img src="{{ url('/assets') }}/images/logo.png" alt="logo.png">
                </div>
                <div class="auth-box card">
                    <div class="card-block">
                        <div class="row m-b-20">
                            <div class="col-md-12">
                                <h3 class="text-center txt-primary">Cadastro</h3>
                            </div>
                        </div>
                        @include('notificacao')
                        <div class="form-group form-primary">
                            <input type="text" name="nom_usuario" class="form-control" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">Seu nome</label>
                        </div>
                        <div class="form-group form-primary">
                            <input type="email" name="dsc_email" class="form-control" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">Seu E-mail</label>
                        </div>
                        <div class="form-group form-primary">
                            <input type="text" name="num_cpf" class="form-control" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">CPF</label>
                        </div>
                        <div class="form-group form-primary">
                            <input type="text" name="dat_nascimento" class="form-control" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">Data de Nascimento</label>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-primary">
                                    <input type="password" name="pws_senha" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Senha</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-primary">
                                    <input type="password" name="confirm-pws_senha" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Confirmar Senha</label>
                                </div>
                            </div>
                        </div>

                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" title="Realizar o cadastro">Cadastrar</button>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-12">
                                <a type="button" href="{{url('/')}}" class="btn btn-danger btn-md btn-block waves-effect waves-light text-center m-b-20" title="Retornar à página de Login">Retornar</a>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
        <!-- end of col-sm-12 -->
    </div>
    <!-- end of row -->
</div>
<!-- end of container-fluid -->


@endsection