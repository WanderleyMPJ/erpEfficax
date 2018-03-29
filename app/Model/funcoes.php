<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Funcoes;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of funcoes
 *
 * @author Wanderley
 */
class Funcoes extends Model {

    public function verificaTabela($tabela) {
        $tabelas_consulta = mysql_query('SHOW TABLES');

        while ($tabelas_linha = mysql_fetch_row($tabelas_consulta)) {
            $tabelas[] = $tabelas_linha[0];
        }

        if (!in_array($tabela, $tabelas)) {
            return false;
        } else {
            return true;
        }
    }

}
