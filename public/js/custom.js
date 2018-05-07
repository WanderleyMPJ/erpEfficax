function pessoa(qual) {
        if(qual=="0") {
          var nm_rs = 'Nome', ap_nf = 'Apelido', cp_cn = 'CPF', rg_inscest = 'RG';
            document.getElementById('tp_pessoa').value = 'fisica';
            document.getElementById('nm_rs').placeholder = nm_rs;
            document.getElementById('ap_nf').placeholder = ap_nf;
            document.getElementById('cp_cn').placeholder = cp_cn;
            document.getElementById('rg_inscest').placeholder = rg_inscest;
            document.getElementById('l_nm_rs').textContent = nm_rs;
            document.getElementById('l_ap_nf').textContent = ap_nf;
            document.getElementById('l_cp_cn').textContent = cp_cn;
            document.getElementById('l_rg_inscest').textContent = rg_inscest;

        }
        else {
            if (qual == "1") {
                var nm_rs = 'Razão Social', ap_nf = 'Nome Fantasia', cp_cn = 'CNPJ', rg_inscest = 'Inscrição Estadual';
                document.getElementById('tp_pessoa').value = 'juridica';
                document.getElementById('nm_rs').placeholder = nm_rs;
                document.getElementById('ap_nf').placeholder = ap_nf;
                document.getElementById('cp_cn').placeholder = cp_cn;
                document.getElementById('rg_inscest').placeholder = rg_inscest;
                document.getElementById('l_nm_rs').textContent = nm_rs;
                document.getElementById('l_ap_nf').textContent = ap_nf;
                document.getElementById('l_cp_cn').textContent = cp_cn;
                document.getElementById('l_rg_inscest').textContent = rg_inscest;

            }
        }
    }

function novasolicitacao(){

    document.getElementById('solicitacao').value = '';
    document.getElementById('solucao').value = '';
    document.getElementById('solicitacao').focus();
}


function destino(dest){
    if (dest == '1'){
        var texto = 'Selecione o USUÁRIO';
        document.getElementById('textodest').textContent = texto;
        document.getElementById('tp_transf').value = '1';

    }else {
        var texto = 'Selecione o DEPARTAMENTO';
        document.getElementById('textodest').textContent = texto;
        document.getElementById('tp_transf').value = '2';
    }
}
function sendform(status_id){
    if(status_id == '4'){
        document.getElementById('status').value = status_id;
        document.getElementById('myForm').action = "/atendimento/salvar";
        submit("myForm");
    }
    else  {
        if(status_id == '2') {
            document.getElementById('status').value = status_id;

        document.getElementById('myForm').action = "/atendimento/agendar";
            submit("myForm");
        }
        else {
            document.getElementById('status').value = status_id;
            document.getElementById('myForm').action = "/atendimento/transferir";
            submit("myForm");
        }
    }

}
function submit(form){
    document.getElementById(form).submit();
}


/*Created by Pedro on 31/03/2018.*/
