<?php

namespace App\Http\Controllers;

use App\Oferta;
use Illuminate\Http\Request;
use DB;
class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $ofertasDb = DB::table('ofertas')->get();

        $ofertas = array();

        foreach($ofertasDb as $ofer) {

            $empresa = DB::table('users')->where('id',$ofer->id_empresa)->value('empresa');
 
            $ofertaActual = [
                "id_oferta" => $ofer->id_oferta,
                "imagen" => $ofer->imagen,
                "puesto_trabajo" => $ofer->puesto_trabajo,
                "empresa" => $empresa,
                "salario" => $ofer->salario

            ];

            array_push($ofertas,$ofertaActual);

        }
        
        return view('index', compact('ofertas', 'ofertas'));

        }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
        public function show($id_oferta)
        {
            $oferta = Oferta::find($id_oferta);
    
            $atributes = $oferta->getAttributes();
    
            return view('show')->with('ofertas', $atributes);
            
        
    }

    
}
