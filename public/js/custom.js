function pessoa(qual) {
        if(qual=="0") {
          var nm_rs = 'Nome', ap_nf = 'Apelido', cp_cn = 'CPF', rg_inscest = 'RG';
            document.getElementById('tp_pessoa').value = 'fisica';
            document.getElementById('nm_rs').placeholder = nm_rs;
            document.getElementById('ap_nf').placeholder = ap_nf;
            document.getElementById('cp_cn').placeholder = cp_cn;
            document.getElementById('rg_inscest').placeholder = rg_inscest;
        }
        else {
            if (qual == "1") {
                var nm_rs = 'Razão Social', ap_nf = 'Nome Fantasia', cp_cn = 'CNPJ', rg_inscest = 'Inscrição Estadual';
                document.getElementById('tp_pessoa').value = 'juridica';
                document.getElementById('nm_rs').placeholder = nm_rs;
                document.getElementById('ap_nf').placeholder = ap_nf;
                document.getElementById('cp_cn').placeholder = cp_cn;
                document.getElementById('rg_inscest').placeholder = rg_inscest;

            }
        }
    }



/*Created by Pedro on 31/03/2018.*/
