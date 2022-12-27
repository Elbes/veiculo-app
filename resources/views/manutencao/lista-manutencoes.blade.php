@extends('layout.layout-app')

@section('content')
<!-- Main-body start -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-body start -->
        <div class="page-body">
            <!-- Basic table card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Lista de Manutenções</h5>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="fa fa fa-wrench open-card-option"></i></li>
                            <li><i class="fa fa-window-maximize full-card"></i></li>
                            <li><i class="fa fa-minus minimize-card"></i></li>
                            <li><i class="fa fa-refresh reload-card"></i></li>
                            <li><i class="fa fa-trash close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Data entrega</th>
                                    <th>Serviço</th>
                                    <th>Situação Serviço</th>
                                    <th>Marca Veículo</th>
                                    <th>Cor Veículo</th>
                                    <th>Ações</th>

                                </tr>
                            </thead>
                            <tbody>
                             @foreach ($manutencoes as $manutencao)
                             <tr>
                                <td>{{ $manutencao->id }}</td>
                                <td>{{ $manutencao->name }}</td>
                                <td>{{ $manutencao->email }}</td>
                                <td>{{ $manutencao->address }}</td>
                                <td>
                                    <form action="{{ route('menutencao.destroy',$manutencao->id_manutencao) }}" method="Post">
                                        <a class="btn btn-primary" href="{{ route('manutencao.edit',$manutencao->id_manutencao) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $manutencoes->links() !!}
                </div>
            </div>

        </div>
        <div id="styleSelector"> </div>
    </div>
</div>
</div>
@endsection