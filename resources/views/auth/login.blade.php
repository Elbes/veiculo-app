@extends('auth.layout-auth')

    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    
                        <form class="md-float-material form-material" action="{{ url('/entrar') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="text-center">
                                <img src="{{ url('/assets') }}/images/logo.png" alt="logo.png">
                            </div>
                            <div class="auth-box card">
                                <div class="card-block">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h3 class="text-center">Acesso Restrito</h3>
                                        </div>
                                    </div>
                                    @include('notificacao')
                                    <div class="form-group form-primary">
                                        <input type="email" name="dsc_email" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Endereço de Email</label>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="password" name="pws_senha" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Senha</label>
                                    </div>
                                    <div class="row m-t-25 text-left">
                                        <div class="col-12">
                                            <!--<div class="checkbox-fade fade-in-primary d-">
                                                <a href="#" class="text-right f-w-600"> Novo Cadastro</a>
                                            </div> -->
                                            <div class="forgot-phone text-right f-right">
                                                <a href="#" class="text-right f-w-600"> Esqueceu a senha?</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Login</button>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a type="button" href="{{url ('/cadastro-usuario')}}" class="btn btn-danger btn-md btn-block waves-effect waves-light text-center m-b-20">Novo Cadastro</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    @endsection