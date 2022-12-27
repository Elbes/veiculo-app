
//Página - VEICULOS
var columnsVeiculo = function() {

    var columns = [

        {"sTitle": "Data de contato", "sName": "NOM_PACIENTE", "mData": "NOM_PACIENTE", "searchable": false, "orderable":  false,},
        {"sTitle": "Horário do contato", "sName": "NUM_CNS", "mData": "NUM_CNS", "searchable": true, "orderable":  true,},
        {"sTitle": "Dados ligação", "sName": "COD_SES", "mData": "COD_SES", "searchable": true, "orderable":  true,},
        {"sTitle": "Conseguiu contato?", "sName": "NOM_REGIAO", "mData": "endereco.regiao.NOM_REGIAO", "searchable": true, "orderable":  true,},
        {"sTitle": "Assunto abordado", "sName": "NOM_REGIAO", "mData": "endereco.regiao.NOM_REGIAO", "searchable": true, "orderable":  true,},
		{"sTitle": "Data do próximo contato", "sName": "DHS_CADASTRO", "mData": "DHS_CADASTRO", "searchable": true, "orderable":  true,},
        {"sTitle": "Ações", "searchable": false, "orderable":  false, "data": function( data){
        	
            var button  = '';

            button += '<a href="/sisfaj/contato-visualizar/'+data.COD_CONTATO+'"  class="btn btn-primary"  data-toggle="modal" title="Visualizar" rel="tooltip" data-placement="top" >';
            button +=   '<i class="fa fa-eye"></i>';
            button += '</a> ';

            button += '<a href="#" onclick="editarContato('+ data.COD_CONTATO + ', this);"  class="btn btn-warning"  data-toggle="modal" title="Editar" rel="tooltip" data-placement="top" >';
            button +=   '<i class="fa fa-pencil"></i>';
            button += '</a> ';

            button += '<a href="#" onclick="excluirContato('+ data.COD_CONTATO + ', this);" class="btn btn-success"  data-toggle="modal" title="Excluir" rel="tooltip" data-placement="top" >';
			button += 	'<i class="'+icon+'"></i>';
			button += '</a> ';

            return button;
        	}
        }
    ]
    return columns;
}



