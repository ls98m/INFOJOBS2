<?php

namespace App\Http\Controllers;

use App\Oferta;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use DB;
use Illuminate\Support\Facades\Input;

class BackendController extends Controller
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
                "id_empresa" => $ofer->id_empresa,
                "id_oferta" => $ofer->id_oferta,
                "imagen" => $ofer->imagen,
                "puesto_trabajo" => $ofer->puesto_trabajo,
                "empresa" => $empresa,
                "salario" => $ofer->salario

            ];

            array_push($ofertas,$ofertaActual);

        }  
        return view('index',compact('ofertas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Backend.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //NO EXISTE EN LA BASE DE DATOS PORQUE NO TIENE ID (ID AUTOINCREMENT EN BBDD) INSERT
        if($request['id_oferta'] == null) {

            $request->validate([
                'puesto_trabajo' => 'string|between:0,255',
                'descripcion' => 'string|between:0,255',
                'jornada' => 'string',
                'contrato' => 'string|between:0,255',
                'salario' => 'numeric',
                'imagen' => 'image'
            ]);
        
            $imgNombre = $request->imagen->getClientOriginalName();
            $request->imagen->move(public_path('images'), $imgNombre);


            DB::table('ofertas')->insert([
                'puesto_trabajo' => $request->puesto_trabajo,
                 'id_empresa' => Auth::id(),
                 'descripcion' => $request->descripcion,
                 'jornada' => $request->jornada,
                 'contrato' => $request->contrato,
                 'salario' => $request->salario,
                 'imagen' => $imgNombre
                 ]);
        //UPDATE
        } else {
            $request->validate([
                'puesto_trabajo' => 'string|between:0,255',
                'descripcion' => 'string|between:0,255',
                'jornada' => 'string',
                'contrato' => 'string|between:0,255',
                'salario' => 'numeric',
                'imagen' => 'image'
            ]);
    
            $imgNombre = $request->imagen->getClientOriginalName();
            
            $request->imagen->move(public_path('images'), $imgNombre);

            Oferta::where('id_oferta',$request['id_oferta'])->update([
            'puesto_trabajo' => $request->input('puesto_trabajo'),
            'descripcion' => $request->input('descripcion'),
            'jornada' => $request->input('jornada'),
            'contrato' => $request->input('contrato'),
            'salario' => $request->input('salario'),
            'imagen' => $imgNombre
                ]);

        }

        return redirect()->route('backend.index')
        ->with('success','Oferta updated successfully');
    }

  /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function edit($id_oferta)
    {
        $oferta = Oferta::find($id_oferta);

        $atributes = $oferta->getAttributes();

        return view('Backend.edit')->with('oferta', $atributes);


    }
    public function show($id_oferta)
    {
        $oferta = Oferta::find($id_oferta);
       

        return view('show')->with('oferta', $oferta);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_oferta)
    {
        $oferta = Oferta::find($id_oferta);

        $oferta->delete();
  
        return redirect()->route('backend.index')
                        ->with('success','Product deleted successfully');

    }

    public function search(Request $request){

        $puesto_trabajo = $request->puesto_trabajo;

        if($puesto_trabajo != null){
            $ofertas = Oferta::where("puesto_trabajo", "LIKE", "%{$puesto_trabajo}%")->paginate(3);
            return view('index',compact('ofertas'));
        }

    
    }
    }



