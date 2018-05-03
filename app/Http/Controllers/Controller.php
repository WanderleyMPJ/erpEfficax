<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function databanco($data){
        $data = date_parse_from_format('d/m/Y H:i:ss', $data);
        $data_formatada = $data['year']."-".$data['month']."-".$data['day']." ".$data['hour'].":".$data['minute'].":".$data['second'];

        return $data_formatada;
    }
    public function datagrid($data){
        $data = date_parse_from_format('d/m/Y H:i:ss', $data);
        $data_formatada = $data['day']."/".$data['month']."/".$data['year']." ".$data['hour'].":".$data['minute'];

        return $data_formatada;
    }

}
