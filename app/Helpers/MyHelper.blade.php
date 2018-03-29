<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('special_ucwords')) 
{

    function special_ucwords($string) {
        $words = explode(' ', strtolower(trim(preg_replace("/\s+/", ' ', $string))));
        $return[] = ucfirst($words[0]);

        unset($words[0]);

        foreach ($words as $word) {
            if (!preg_match("/^([dn]?[aeiou][s]?|em)$/i", $word)) {
                $word = ucfirst($word);
            }
            $return[] = $word;
        }

        return implode(' ', $return);
    }
    
        function verificaTabela($tabela) {

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
