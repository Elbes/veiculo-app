@extends('layout.layout-app')

@section('dependencyCss')
<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css" rel="stylesheet">

@endsection
@section('content')
<!-- Main-body start -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-body start -->
        <div class="page-body">
            @include('notificacao')
            <!-- Basic table card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Lista de Veículos</h5> <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-cad-veiculo" title="Inserir Novo Veículo" data-toggle="modal" ><i class="fa fa-plus" aria-hidden="true">&nbsp;</i>Adicionar</button>
                    <a href="#" class="btn btn-success"  onclick="inserirVeiculo(this);"  data-toggle="modal" title="Inserir nova Categoria">
            <i class="fa fa-plus" aria-hidden="true"></i>
                    Inserir Categoria </a>
                    <div class="card-header-right">
                       
                    </div>
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" id="dt_veiculo">
                            <thead>
                                <tr>
                                    <th>Modelo</th>
                                    <th>Versão</th>
                                    <th>Cor</th>
                                    <th>Marca</th>
                                    <th>Placa</th>
                                    <th>Ações</th>

                                </tr>
                            </thead>
                            <tbody>
                             @foreach ($objReturn['veiculos'] as $veiculo)
                             <tr>
                                <td>{{ $veiculo->dsc_modelo }}</td>
                                <td>{{ $veiculo->dsc_versao }}</td>
                                <td>{{ $veiculo->cor->nom_cor }}</td>
                                <td>{{ $veiculo->marca->nom_marca }}</td>
                                <td>{{ $veiculo->dsc_placa }}</td>
                                <td>
                                   <a title="Editar dados do veículo" href="{{ url('/veiculo-editar') }}/{{$veiculo->id_veiculo}}" class="btn btn-success mgn-btn-dt"><i class="fa fa-pencil-square-o"></i></a>

                                   <a title="Excluir" onclick="confirmaExclusao({{$veiculo->id_veiculo}});" class="btn btn-danger mgn-btn-dt"><i class="fa fa-trash"></i></a>

            
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div id="styleSelector"> </div>
    </div>
</div>
</div>
@endsection

@section( 'dependencyJs' )

<!-- DataTable -->
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- Page-Level Scripts -->
<script type="text/javascript">

$(document).ready(function() {

    $('#dt_veiculo').DataTable( {
            responsive: true,
            "oLanguage": {
            "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
        },
        "oLanguage": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ Registros por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Carregando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar: ",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        },
        
    });

});

 function confirmaExclusao(id_veiculo){
        swal({
          title: "Confirmação",
          text: "Deseja realmente excluri o registro?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
        .then((willDelete) => {

          if (willDelete) {
            window.location.href='{{ url("/excluir-veiculo") }}/'+id_veiculo;
            return true;
        } else {
            return false;
        }
    });
}

         //BOTÃO INSERIR - ABRE MODAL COM FORM DE CADASTRO
        function inserirVeiculo(){

            var jOption = {
                    url: "{{ url('/form-veiculo') }}",
                    type: "post",
                    idForm: 'form_modal',
                    async: true,
                    title: '<i class="fa  fa-hospital-o"></i> INSERIR VEÍCULO',
                    width: '600px'
                }

                showModal( jOption );

        }

         function catchErrors(errors){
            console.log(errors)
        }

     function fecharModal(){
            $('#modalSigs').modal('toggle')
       } 
      
function showMensage(status, mensage, tempo){

    if(status == 'success'){

        $.smallBox({
            title : "SUCESSO!",
            content : "<i class='fa-fw fa fa-check'></i> <i>"+ mensage +"</i>",
            color : "#659265",
            iconSmall : "fa fa-times bounce fa-2x fadeInRight bounce animated",
            timeout : tempo
        });
    }else if ( status == 'error' ){
        $.smallBox({
            title : "ERRO!",
            content : "<i class='fa-fw fa fa-times'></i> <i>"+ mensage +"</i>",
            color : "#a90303",
            iconSmall : "fa fa-times bounce fa-2x fadeInRight bounce animated",
            timeout : tempo
        });
    }else if ( status == 'notice' ){
        $.smallBox({
            title : "ALERTA!",
            content : "<i class='fa-fw fa fa-warning'></i> <i>"+ mensage +"</i>",
            color : "#dfb56c",
            iconSmall : "fa fa-times bounce fa-2x fadeInRight bounce animated",
            timeout : tempo
        });
    }else if ( status == 'info' ){
        $.smallBox({
            title : "INFORMAÇÃO!",
            content : "<i class='fa-fw fa fa-info'></i> <i>"+ mensage +"</i>",
            color : "#9cb4c5",
            iconSmall : "fa fa-times bounce fa-2x fadeInRight bounce animated",
            timeout : tempo
        });
    }
}


function downloadArquivo(form_id,url) {

            var url = url;
            var type = "post";

            $('.carregar').show();
            var blob = "";

            var xhr = new XMLHttpRequest();

            xhr.onload = function(){

                blob = new Blob([xhr.response], { type: 'application/pdf' });

                var nomeArquivo = "";                   
                var disposition = xhr.getResponseHeader('Content-Disposition');

                if (disposition) {
                    var regex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                    var matches = regex.exec(disposition);
                    if (matches !== null && matches[1]) nomeArquivo = matches[1].replace(/['"]/g, '');
                } 

                var regex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                var matches = regex.exec(disposition);
                if (matches !== null && matches[1]) nomeArquivo = matches[1].replace(/['"]/g, '');

                var downloadUrl = URL.createObjectURL(blob);

                if (nomeArquivo) { 

                    var a = document.createElement("a");

                    if (typeof a.download === 'undefined') {
                        window.location = downloadUrl;
                    } else {
                        a.href = downloadUrl;
                        a.download = nomeArquivo;
                        document.body.appendChild(a);
                        a.target = "_blank";
                        a.click();
                    }
                } else {
                    window.location = nomeArquivo;
                }
                
                $('.carregar').hide();
            };

            xhr.open(type, url, true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.responseType = 'blob';
            xhr.send($(form_id).serialize());
}


function dtTable(id_data_table, url_data, columns, order, lengthMenu) {
       var responsiveHelper_dt_basic = undefined;
    var responsiveHelper_datatable_fixed_column = undefined;
    var responsiveHelper_datatable_col_reorder = undefined;
    var responsiveHelper_datatable_tabletools = undefined;
    
    var breakpointDefinition = {
        tablet : 1024,
        phone : 480
    };

    if (!lengthMenu){
        lengthMenu = [[50, 100, 150, 300,-1], [50, 100, 150, 300,"Todos"]];
    }


    return  $('#'+id_data_table).DataTable({
                    "lengthMenu": lengthMenu,
                    "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-4'f><'col-sm-4 col-xs-8 hidden-xs'l>rt <p>>"+
                    "t"+
                    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",

                    "autoWidth" : true,
                    "oLanguage": {
                        "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
                    },
                    "preDrawCallback" : function() {
                        // Initialize the responsive datatables helper once.
                        if (!responsiveHelper_dt_basic) {
                            responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#'+id_data_table), breakpointDefinition);
                        }
                    },
                    "rowCallback" : function(nRow) {
                        responsiveHelper_dt_basic.createExpandIcon(nRow);
                    },
                    "drawCallback" : function(oSettings) {
                        responsiveHelper_dt_basic.respond();
                    },
                    "order": order,
                    "oLanguage": {
                        "sEmptyTable": "Nenhum registro encontrado",
                        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sInfoThousands": ".",
                        "sLengthMenu": "_MENU_ Registros por página",
                        "sLoadingRecords": "Carregando...",
                        "sProcessing": "Processando...",
                        "sZeroRecords": "Nenhum registro encontrado",
                        "sSearch": "Pesquisar: ",
                        "oPaginate": {
                            "sNext": "Próximo",
                            "sPrevious": "Anterior",
                            "sFirst": "Primeiro",
                            "sLast": "Último"
                        },
                        "oAria": {
                            "sSortAscending": ": Ordenar colunas de forma ascendente",
                            "sSortDescending": ": Ordenar colunas de forma descendente"
                        }
                    },
                    "bProcessing": true,
                    "bServerSide": true,
                    "ajax": {
                         "url": url_data,
                         "type": "GET"
                    },
                    "columns": columns()
                });


}

function IsNotNullOrEmpty(obj, parameterToTest) {
    try {
        if (typeof parameterToTest == 'string' && parameterToTest !== "null" && parameterToTest !== "undefined" && parameterToTest !== "") obj = eval('obj.' + parameterToTest);
        return (typeof obj == 'function' && obj) || (typeof obj == 'boolean' && obj) || (typeof obj == 'undefined' && obj !== undefined) || (typeof obj == 'string' && obj !== "null" && obj !== "undefined" && obj !== "") || (typeof obj == 'object' && (obj != null && typeof obj.length != 'number') && !isEmptyObject(obj)) || (typeof obj == 'object' && typeof obj.length == 'number' && obj.length > 0) || (typeof obj == 'number' && obj > 0);
    } catch (e) {
        return false;
    }
}

function AjaxSalvar(jOptions) {

    var jAjaxOption = {
        url: "",
        type: "post",
        cache: false,
        async: true,
        idForm: "",
        data: null,
        bCallback: false,
        negativeFunctionCallback: null, // Funções em caso de cancelamento de Ação
        nameFunctionCallback: null, //Pós Funções em caso de sucesso
        errorsFunctionCallback: null, //Pós Funções em caso de erro
        success: null,
        error: null,
        idRemove: null,
        gridRemove: null,
        setClass: { idClass: null, nameClass: null },
        setTimeOut: 5000,
        fileUpload: false,
        // confirmBox: { title: 'CONFIRMAÇÃO', content: null, buttons: '[Não][Sim]', bnt1: 'Não', bnt2: 'Sim' }
    }

    jAjaxOption = $.extend(jAjaxOption, jOptions); // Merge dos objetos, caso seja repassado valores prevalece os param informados


    var dataRetorno = null;
    var successReturn = 'Solicitação enviada com sucesso.';
    var errorReturn = 'Não foi possível enviar sua solicitação.';

    if (!IsNotNullOrEmpty(jAjaxOption.success)) { $.extend(jAjaxOption, { "success": successReturn }); }

    try {
        if  ( (IsNotNullOrEmpty(jAjaxOption.idForm)) || (IsNotNullOrEmpty(jAjaxOption.data)) ) {


            //Se exige confirmação de ação
            if ((jAjaxOption.confirmBox)) {
            $(".divMessageBox").show();

                $.SmartMessageBox({
                    title : '<span class="txt-color-orangeDark"><strong>' + jAjaxOption.confirmBox.title + '</strong></span>' ,
                    content : '<span><strong>' + jAjaxOption.confirmBox.content + '</strong></span>',
                    buttons : jAjaxOption.confirmBox.buttons,
                }, function(ButtonPressed) {
                    
                    // Se  escolheu prosseguir com a solicitação
                    if (ButtonPressed === jAjaxOption.confirmBox.bnt2) {
                        processAjaxSalvar(jAjaxOption);
                        $(".divMessageBox").hide();
                    }

                    //Se Cancelou a Solicitação
                    if (ButtonPressed === jAjaxOption.confirmBox.bnt1) {

                        // Se deve executar alguma função após o cancelamento
                        if (IsNotNullOrEmpty(jAjaxOption.negativeFunctionCallback)) {
                            executeFunctions(jAjaxOption.negativeFunctionCallback);
                        }
                        showMensage( 'notice', 'Solicitação cancelada pelo usuário.', jAjaxOption.setTimeOut);
                        $(".divMessageBox").hide();
                        return false;
                    }

                });

            }else{
                processAjaxSalvar(jAjaxOption);
            }
            


        }
        else {
            showMensage( 'notice', errorReturn , jAjaxOption.setTimeOut);
        }
    } catch (e) {
        showMensage( 'error', e , jAjaxOption.setTimeOut);
    }

}




function processAjaxSalvar(jAjaxOption ){

    if(!(jAjaxOption.fileUpload)){

        //Se vai pegar TODOS OS INPUTS DO FORM (SERIALIZE)
        if (IsNotNullOrEmpty(jAjaxOption.idForm)){

            var req = $.ajax({

                type: jAjaxOption.type,
                data: $("#" + jAjaxOption.idForm).serialize(),
                url: jAjaxOption.url,
                async: jAjaxOption.async,

                success: function(objReturn){

                    window.return_ajax = true;
                    successAjaxSalvar(jAjaxOption,objReturn);
                },

                error: function(objReturn, textStatus, thrownError){

                    window.return_ajax = false;
                    errorAjaxSalvar(jAjaxOption,objReturn);
                },

                statusCode: {
                    201: function (response) {
                        showMensage( 'error', 'Erro 201', jAjaxOption.setTimeOut);
                    },
                    422: function (response) {
                        showMensage( 'error', 'Erro 422 -  Erro na validação dos dados.', jAjaxOption.setTimeOut);
                    },
                    404: function (response) {
                        showMensage( 'error', 'Erro 404', jAjaxOption.setTimeOut);
                    },
                    500: function (response) {
                        showMensage( 'error', 'Erro 500', jAjaxOption.setTimeOut);
                    }
                },
            })

        }
        //Se vai pegar SOMENTE DADOS INDICADOS 
        else{
            $.ajax({

                type: jAjaxOption.type,
                data: jAjaxOption.data,
                url: jAjaxOption.url,
                async: jAjaxOption.async,

                success: function(objReturn){
                    successAjaxSalvar(jAjaxOption,objReturn);
                },

                error: function(objReturn, textStatus, thrownError){
                    errorAjaxSalvar(jAjaxOption,objReturn);
                },

                statusCode: {
                    201: function (response) {
                        showMensage( 'error', 'Erro 201', jAjaxOption.setTimeOut);
                    },
                    422: function (response) {
                        showMensage( 'error', 'Erro 422 -  Erro na validação dos dados.', jAjaxOption.setTimeOut);
                    },
                    404: function (response) {
                        showMensage( 'error', 'Erro 404', jAjaxOption.setTimeOut);
                    },
                    500: function (response) {
                        showMensage( 'error', 'Erro 500', jAjaxOption.setTimeOut);
                    }
                },

            })
        }

    }else{

         // Get form
        var form = $("#" + jAjaxOption.idForm)[0];

        // Create an FormData object 
        var data = new FormData(form);

        // If you want to add an extra field for the FormData
        // data.append("CustomField", "This is some extra data, testing");

        var req = $.ajax({

            type: jAjaxOption.type,
            data: data,
            url: jAjaxOption.url,
            async: jAjaxOption.async,
            enctype: 'multipart/form-data',
               processData: false,  // Important!
               contentType: false,
            cache: false,

            success: function(objReturn){
                window.return_ajax = true;
                successAjaxSalvar(jAjaxOption,objReturn);
            },

            error: function(objReturn, textStatus, thrownError){
                window.return_ajax = false;
                errorAjaxSalvar(jAjaxOption,objReturn);
            },

            statusCode: {
                201: function (response) {
                    showMensage( 'error', 'Erro 201', jAjaxOption.setTimeOut);
                },
                422: function (response) {
                    showMensage( 'error', 'Erro 422 -  Erro ao processar a entidade', jAjaxOption.setTimeOut);
                },
                404: function (response) {
                    showMensage( 'error', 'Erro 404', jAjaxOption.setTimeOut);
                },
                500: function (response) {
                    showMensage( 'error', 'Erro 500', jAjaxOption.setTimeOut);
                }
            },
        })

    }

}




function executeFunctions(functionList){

    if (Array.isArray(functionList)){

        $.each(functionList, function (key, val) {

            var params =  val.substring(val.length,(val.length - 1));

            if (params != ')' ) {
                eval( val+ '();' );
            }else{
                eval( val  );
            }

        });

    }else{

        var params =  functionList.substring(functionList.length,(functionList.length - 1));

        if (params != ')' ) {
            eval( functionList + '();' );
        }else{
            eval( functionList);
        }

    }
}


function successAjaxSalvar(jAjaxOption,objReturn){
    if(objReturn.status == 'success'){

        if (IsNotNullOrEmpty(jAjaxOption.gridRemove)) {
            $('#'+jAjaxOption.gridRemove).parent().parent().remove();
        }

        if (IsNotNullOrEmpty(jAjaxOption.idRemove)) {
            $("#"+ jAjaxOption.idRemove).remove();
        }

        if (IsNotNullOrEmpty(jAjaxOption.setClass.idClass) && IsNotNullOrEmpty(jAjaxOption.setClass.nameClass)) {
            $("#"+ jAjaxOption.setClass.idClass).removeClass();
            $("#"+ jAjaxOption.setClass.idClass).removeClass( jAjaxOption.setClass.nameClass );
        }

        if (IsNotNullOrEmpty(jAjaxOption.nameFunctionCallback)) {
            executeFunctions(jAjaxOption.nameFunctionCallback,objReturn);
        }

        showMensage(objReturn.status, objReturn.mensage, jAjaxOption.setTimeOut)
        return true;


    } else {

        if (IsNotNullOrEmpty(jAjaxOption.errorsFunctionCallback)) {
            executeFunctions(jAjaxOption.errorsFunctionCallback,objReturn);
        }

        showMensage(objReturn.status, objReturn.mensage, jAjaxOption.setTimeOut)
        return 'false';
    }

}

function errorAjaxSalvar(jAjaxOption,objReturn){
        // alert('ERRO '+jAjaxOption.nameFunctionCallback)

    showMensage('error', 'Erro ao processar a solicitação', jAjaxOption.setTimeOut);

    var errors         = objReturn.responseJSON.errors;
    var exceptions     = objReturn.responseJSON.exception;

    //limpa erros anteriores
    $( "span[data-field-error]").each(function() {
        $( this ).parent().removeClass('has-error');
        $( this ).empty();
    });


    if((exceptions)){
        showMensage('error', objReturn.responseJSON.message, jAjaxOption.setTimeOut);
    }

    if((errors)){
        $.each(errors, function (key, val) {

            showMensage('error', val, jAjaxOption.setTimeOut)

            $("span[data-field-error='"+key+"']").parent().addClass('has-error');
            $("span[data-field-error='"+key+"']").html('<strong>'+val+'</strong>');

        });
    }


    if (IsNotNullOrEmpty(jAjaxOption.errorsFunctionCallback)) {
        executeFunctions(jAjaxOption.errorsFunctionCallback,objReturn);
    }

    $("body").removeClass('carregando');
    return 'false';

}

/*
* COMO USAR ajaxSavar
* */
/*

        $("#bntSalvar").click(function(e) {

            var jOption = {
                url: "/sysleito/ativa-usuario-pendente",
                type: "post",
                async: true,
                idForm: "frmTeste",
                setTimeOut: 5000,
                confirmBox: { title:'CONFIRMAÇÃO', content: 'Deseja realmente testar?', buttons: '[Não][Sim]', bnt1: 'Não', bnt2: 'Sim'}
            }

            AjaxSalvar( jOption );

            e.preventDefault();

        });

*/

function showModal( jOptions  ){


    var jAjaxOption = {
        url: null,
        type: "get",
        cache: false,
        async: true,
        idForm: null,
        data: '',
        title: 'Titulo Modal',
        body: null,
        footer: 'padrao',
        width: 'null',
    }

    $.extend(jAjaxOption, jOptions); // Merge dos objetos, caso seja repassado valores prevalece os param informados

    //Limpa dados de modal
    $('#modalTitle').html('');
    $('#modalBody').html('');
    $('#modalFooter').html('');

    var mdlTitulo = jAjaxOption.title;
    var mdlBody   = jAjaxOption.body;
    var mdlFooter = jAjaxOption.footer;
    var mdlWidth = jAjaxOption.width;
    var envioData = jAjaxOption.data;

    if (IsNotNullOrEmpty(jAjaxOption.idForm)) {
        envioData = $("#" + jAjaxOption.idForm).serialize();
    }

    if (jAjaxOption.footer == 'padrao') {

        mdlFooter   = '<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>' +
                      '<button type="button" class="btn btn-primary" data-action="bntModalSalvar">Salvar</button>';

    }else{

        mdlFooter = jAjaxOption.footer;

    }


    if (!IsNotNullOrEmpty(jAjaxOption.body) ) {

        //Carrega dados para modal
        $.ajax({

            type: jAjaxOption.type,
            data:envioData,
            url: jAjaxOption.url,
            async: jAjaxOption.async,
            headers: {
                'X_CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            success: function(objReturn){

                $('#modalTitle').html( mdlTitulo );
                $('#modalBody').html( objReturn );
                $('#modalFooter').html( mdlFooter );

                if(mdlWidth){
                    $('.modal-dialog').attr( 'style', 'width:'+mdlWidth+';' )
                }

                $('#modalSigs').modal('show');

            }

        })

    }else{

        $('#modalTitle').html( mdlTitulo );
        $('#modalBody').html( jAjaxOption.body );
        $('#modalFooter').html( mdlFooter );

        if(mdlWidth){
            $('.modal-dialog').attr( 'style', 'width:'+mdlWidth+';' )
        }

        $('#modalSigs').modal('show');

    }


}


/*
 * COMO USAR showModal
 * */
/*

    $.root_.on('click','[data-action="bntEditar"]' , function(e) {

         var jOption = {
             url: "{{ url('sysuti/painel') }}",
             type: "post",
             async: true,
             title: 'SEU TITULO',

             body: 'Meu valor personalizado',                  [ Se for por ajax, nao informar valor ].

             data: 'id=2'                                     [ personaliza o envio do post ou get ]

             idForm: 'meuForm'                                 [ personaliza o envio do post ou get do formulario]


             footer = '<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>' +
                        '<button type="button" class="btn btn-primary" data-action="bntModalSalvar">Salvar</button>'
         }

         showModal( jOption );

         e.preventDefault();

    });

 */


$(document).ready(function() {

    (function( $ ){
        $.fn.getPagina = function() {

            var arrPost = $(this).attr('data-array');
            var urlPage = $(this).attr('data-url');
            var nmoForm =$(this).attr('data-formName');
            var array = (new Function("return [" + arrPost+ "];")());

            var montaForm = '<form action="'+urlPage+'" method="POST" id="'+nmoForm+'">';

            $.each( array, function( key, value ) {

                $.each( value, function( key2, value2 ) {
                    montaForm = montaForm + '<input type="hidden" name="'+key2+'" value="'+value2+'">';
                })

            });

            montaForm = montaForm + '</form>';

            $('body').append(montaForm);
            $('#'+nmoForm).submit();



            return this;
        };
    })( jQuery );

});





function utf8_decode (strData) { // eslint-disable-line camelcase
                                                  //  discuss at: http://locutus.io/php/utf8_decode/
                                                  // original by: Webtoolkit.info (http://www.webtoolkit.info/)
                                                  //    input by: Aman Gupta
                                                  //    input by: Brett Zamir (http://brett-zamir.me)
                                                  // improved by: Kevin van Zonneveld (http://kvz.io)
                                                  // improved by: Norman "zEh" Fuchs
                                                  // bugfixed by: hitwork
                                                  // bugfixed by: Onno Marsman (https://twitter.com/onnomarsman)
                                                  // bugfixed by: Kevin van Zonneveld (http://kvz.io)
                                                  // bugfixed by: kirilloid
                                                  // bugfixed by: w35l3y (http://www.wesley.eti.br)
                                                  //   example 1: utf8_decode('Kevin van Zonneveld')
                                                  //   returns 1: 'Kevin van Zonneveld'
    var tmpArr = []
    var i = 0
    var c1 = 0
    var seqlen = 0
    strData += ''
    while (i < strData.length) {
        c1 = strData.charCodeAt(i) & 0xFF
        seqlen = 0
        // http://en.wikipedia.org/wiki/UTF-8#Codepage_layout
        if (c1 <= 0xBF) {
            c1 = (c1 & 0x7F)
            seqlen = 1
        } else if (c1 <= 0xDF) {
            c1 = (c1 & 0x1F)
            seqlen = 2
        } else if (c1 <= 0xEF) {
            c1 = (c1 & 0x0F)
            seqlen = 3
        } else {
            c1 = (c1 & 0x07)
            seqlen = 4
        }
        for (var ai = 1; ai < seqlen; ++ai) {
            c1 = ((c1 << 0x06) | (strData.charCodeAt(ai + i) & 0x3F))
        }
        if (seqlen === 4) {
            c1 -= 0x10000
            tmpArr.push(String.fromCharCode(0xD800 | ((c1 >> 10) & 0x3FF)))
            tmpArr.push(String.fromCharCode(0xDC00 | (c1 & 0x3FF)))
        } else {
            tmpArr.push(String.fromCharCode(c1))
        }
        i += seqlen
    }
    return tmpArr.join('')
}

function utf8_encode (argString) { // eslint-disable-line camelcase
                                                    //  discuss at: http://locutus.io/php/utf8_encode/
                                                    // original by: Webtoolkit.info (http://www.webtoolkit.info/)
                                                    // improved by: Kevin van Zonneveld (http://kvz.io)
                                                    // improved by: sowberry
                                                    // improved by: Jack
                                                    // improved by: Yves Sucaet
                                                    // improved by: kirilloid
                                                    // bugfixed by: Onno Marsman (https://twitter.com/onnomarsman)
                                                    // bugfixed by: Onno Marsman (https://twitter.com/onnomarsman)
                                                    // bugfixed by: Ulrich
                                                    // bugfixed by: Rafał Kukawski (http://blog.kukawski.pl)
                                                    // bugfixed by: kirilloid
                                                    //   example 1: utf8_encode('Kevin van Zonneveld')
                                                    //   returns 1: 'Kevin van Zonneveld'
    if (argString === null || typeof argString === 'undefined') {
        return ''
    }
    // .replace(/\r\n/g, "\n").replace(/\r/g, "\n");
    var string = (argString + '')
    var utftext = ''
    var start
    var end
    var stringl = 0
    start = end = 0
    stringl = string.length
    for (var n = 0; n < stringl; n++) {
        var c1 = string.charCodeAt(n)
        var enc = null
        if (c1 < 128) {
            end++
        } else if (c1 > 127 && c1 < 2048) {
            enc = String.fromCharCode(
                    (c1 >> 6) | 192, (c1 & 63) | 128
            )
        } else if ((c1 & 0xF800) !== 0xD800) {
            enc = String.fromCharCode(
                    (c1 >> 12) | 224, ((c1 >> 6) & 63) | 128, (c1 & 63) | 128
            )
        } else {
            // surrogate pairs
            if ((c1 & 0xFC00) !== 0xD800) {
                throw new RangeError('Unmatched trail surrogate at ' + n)
            }
            var c2 = string.charCodeAt(++n)
            if ((c2 & 0xFC00) !== 0xDC00) {
                throw new RangeError('Unmatched lead surrogate at ' + (n - 1))
            }
            c1 = ((c1 & 0x3FF) << 10) + (c2 & 0x3FF) + 0x10000
            enc = String.fromCharCode(
                    (c1 >> 18) | 240, ((c1 >> 12) & 63) | 128, ((c1 >> 6) & 63) | 128, (c1 & 63) | 128
            )
        }
        if (enc !== null) {
            if (end > start) {
                utftext += string.slice(start, end)
            }
            utftext += enc
            start = end = n + 1
        }
    }
    if (end > start) {
        utftext += string.slice(start, stringl)
    }
    return utftext
}

function startEditor(){             
    CKEDITOR.replace( 'DSC_MEDICAMENTO', { height: '150px', startupFocus : true} );
    CKEDITOR.config.toolbar = [
        ['Bold','Italic','Underline','StrikeThrough', 'NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','Table','-','TextColor','BGColor']
    ] ;
}


function busca_cep(cep){  


     //Nova variável "cep" somente com dígitos.
    var cep = cep.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
               $("input[name=DSC_ENDERECO]").val("...");
            $("input[name=NOM_BAIRRO]").val("...");;

            //Consulta o webservice viacep.com.br/
            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                if (!("erro" in dados)) {
                    //Atualiza os campos com os valores da consulta.
                    $("input[name=DSC_ENDERECO]").val(dados.logradouro);
                    $("input[name=NOM_BAIRRO]").val(dados.bairro);
                    // $("input[name=NOM_CIDADE]").val(dados.localidade);
                    // $("input[name=SIG_UF]").val(dados.uf);
                    // $("input[name=DSC_IBGE]").val(dados.ibge);
                } //end if.
                else {
                    //CEP pesquisado não foi encontrado.
                    limpa_formulário_cep();
                    showMensage('error', "CEP não encontrado.", '6000')
                }
            });
        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            showMensage('error', "CEP inválido.", '6000')
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
}  


function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("input[name=DSC_ENDERECO]").val("");
        $("input[name=NOM_BAIRRO]").val("");
}
</script>

@endsection