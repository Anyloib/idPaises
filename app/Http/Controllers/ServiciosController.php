<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pais;
use App\Estado;

class ServiciosController extends Controller
{
   public function estados($pais)
   {
       $estados = Estado::where('id_pais', $pais)->get();
       return $estados;
   }
}
