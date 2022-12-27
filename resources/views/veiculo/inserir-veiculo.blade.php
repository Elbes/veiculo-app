<!-- Modal inserir Veículo-->
<div class="modal inmodal" id="modal-cad-veiculo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header modal-header-primary">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
                <h4 class="modal-title">Cadastro de Veículo</h4>
            </div>
            <form role="form" method="POST" action="{{ url('/inserir-veiculo') }}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <fieldset>
                        <div class="form-group{{ $errors->has('marcas_id_marca') ? ' has-error' : '' }}  row">
                            <label class="col-sm-3 col-form-label">Marca (*)</label>
                            <div class="col-sm-9">
                                <select name="marcas_id_marca" class="form-control" value="{{ old('marcas_id_marca') }}">
                                    <option value="">Selecione uma marca</option>
                                    @foreach ($objReturn['marcas'] as $marca)    
                                        <option value="{{ $marca->id_marca}} ">{{$marca->nom_marca}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('marcas_id_marca'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('marcas_id_marca') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('dsc_modelo') ? ' has-error' : '' }} row">
                            <label class="col-sm-3 col-form-label">Modelo (*)</label>
                            <div class="col-sm-9">
                                <input type="text" name="dsc_modelo" class="form-control" placeholder="Digite o modelo">
                                @if ($errors->has('dsc_modelo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('dsc_modelo') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>  

                        <div class="form-group{{ $errors->has('dsc_versao') ? ' has-error' : '' }} row">
                            <label class="col-sm-3 col-form-label">Versão (*)</label>
                            <div class="col-sm-9">
                                <input type="number" name="dsc_versao" class="form-control" placeholder="Digite a versão">
                                @if ($errors->has('dsc_versao'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('dsc_versao') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>       
                              
                        <div class="form-group{{ $errors->has('dsc_placa') ? ' has-error' : '' }} row">
                            <label class="col-sm-3 col-form-label">Placa (*)</label>
                            <div class="col-sm-9">
                                <input type="text" name="dsc_placa" class="form-control" placeholder="Digite a placa">
                                @if ($errors->has('dsc_placa'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('dsc_placa') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cores_id_cor') ? ' has-error' : '' }}  row">
                            <label class="col-sm-3 col-form-label">Cor</label>
                            <div class="col-sm-9">
                                <select name="cores_id_cor" class="form-control" value="{{ old('cores_id_cor') }}">
                                    <option value="">Selecione uma cor</option>
                                    @foreach ($objReturn['cores'] as $cor)    
                                        <option value="{{ $cor->id_cor}} ">{{$cor->nom_cor}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('cores_id_cor'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cores_id_cor') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>        
                                        
                    </fieldset>
 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
