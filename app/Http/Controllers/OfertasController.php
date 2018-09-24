<?php

namespace App\Http\Controllers;

use App\Oferta;
use App\TipoContrato;
use App\Empresa;

use Validator;
use Illuminate\Http\Request;

class OfertasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = "";
        $parametros = [];
        if($request->input('nombre') != null){       
            $query = "descripcion like ? ";
            array_push($parametros, '%'.$request->input('nombre').'%');
        }
        if ($request->input('ubicacion') != null) {
            if(count($parametros)){
                $query .= "and ";
            }
            $query .= "localidad like ? ";
            array_push($parametros, '%'.$request->input('ubicacion').'%');
        }/*
        if ($request->input('plazas')  != null) {
            if(count($parametros)){
                $query .= "and ";
            }
            $query .= "plazas_total > ? ";
            array_push($parametros, $request->input('plazas'));
        }  
        if ($request->input('plazas_disponibles')  != null) {
            if(count($parametros)){
                $query .= "and ";
            }
            $query .= "plazas_disponibles != ? ";
            array_push($parametros, 0);
        }    
        if ($request->input('edades_recomendadas')  != null) {
            if(count($parametros)){
                $query .= "and ";
            }
            $query .= "edades_recomendadas > ? ";
            array_push($parametros, $request->input('edades_recomendadas'));
        } */
        //dd(array($query,$parametros));
        if ($query != '') {
            $ofertas = Oferta::whereRaw($query, $parametros)->get();
        }else{
            $ofertas = Oferta::all();
        }    
        return view('ofertas.index')->with('ofertas',$ofertas);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposContrato = TipoContrato::all();
        return view('ofertas.create')->with(['tiposContrato' => $tiposContrato]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oferta = new Oferta();        


        $oferta->descripcion =  $request->input('descripccion');
        $oferta->descripcion_larga =  $request->input('descripccion_larga');
        $oferta->numero_puestos =  $request->input('numero_puestos');
        $oferta->tareas_desenvolver =  $request->input('tareas_desenvolver');
        $oferta->plazo_presentación =  $request->input('plazo_presentación');
        $oferta->tipo_contrato_id =  $request->input('tipo_contrato');
        $oferta->fecha_incorporacion =  $request->input('fecha_incorporacion');
        $oferta->duracion_contratos =  $request->input('duracion_contratos');
        $oferta->localidad =  $request->input('localidad');
        $oferta->horario_incio =  $request->input('horario_incio');
        $oferta->horario_fin =  $request->input('horario_fin');
        $oferta->salario =  $request->input('salario');
        $oferta->formación_requisito =  $request->input('formación_requisito');
        $oferta->experiencia_requisito =  $request->input('experiencia_requisito');
        $oferta->otros_requisitos =  $request->input('otros_requisitos');
        $oferta->empresa_id = 1;
        $mensajes = [
            'descripccion' => 'descripccion es obligatoria',
            'descripccion_larga' => 'descripccion_larga es obligatoria',
            'numero_puestos' => 'numero_puestos es obligatoria',
            'tareas_desenvolver' => 'tareas_desenvolver es obligatoria',
            'plazo_presentación' => 'plazo_presentación es obligatoria',
            'tipo_contrato' => 'tipo_contrato es obligatoria',
            'fecha_incorporacion' => 'fecha_incorporacion es obligatoria',
            'duracion_contratos' => 'duracion_contratos es obligatoria',
            'localidad' => 'localidad es obligatoria',
            'horario_incio' => 'horario_incio es obligatoria',
            'horario_fin' => 'horario_fin es obligatoria',
            'salario' => 'salario es obligatoria',
            'formación_requisito' => 'formación_requisito es obligatoria',
            'experiencia_requisito' => 'experiencia_requisito es obligatoria',
            'otros_requisitos' => 'otros_requisitos es obligatoria',
        ];
        $reglas =  [
            'descripccion' => 'required',
            'descripccion_larga' => 'required',
            'numero_puestos' => 'required',
            'tareas_desenvolver' => 'required',
            'plazo_presentación' => 'required',
            'tipo_contrato' => 'required',
            'fecha_incorporacion' => 'required',
            'duracion_contratos' => 'required',
            'localidad' => 'required',
            'horario_incio' => 'required',
            'horario_fin' => 'required',
            'salario' => 'required',
            'formación_requisito' => 'required',
            'experiencia_requisito' => 'required',
            'otros_requisitos' => 'required',
        ];
        $validator = Validator::make($request->all(), $reglas, $mensajes);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }           

        $oferta->save();

        $request->session()->flash('alert-success', 'Oferta reqgistrada corectamente');
        return redirect()->route('ofertas.show', $oferta->id)->withInput();        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function show(Oferta $oferta)
    {
        $tiposContrato = TipoContrato::all();
        return view('ofertas.show')->with(['tiposContrato' => $tiposContrato, 'oferta' => $oferta]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function edit(Oferta $oferta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Oferta $oferta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Oferta $oferta)
    {
        //
    }

    public function inscripcion($oferta){
        $oferta = Oferta::find($oferta);
        $tiposContrato = TipoContrato::all();
        return view('ofertas.formularioInscripcion')->with(['tiposContrato' => $tiposContrato, 'oferta' => $oferta]);
    }

    public function inscribirme(Request $request, $oferta){
        /*$curso = Curso::find($curso);
        $user = User::find($request->input('usuario'));
        $curso->users()->attach($user);      
        $request->session()->flash('alert-success', 'Se ha inscrito correctamente en el Curso '.$curso->nombre);  
        $cursos = $cursos = Curso::all();
        return view('cursos.index')->with('cursos',$cursos);*/
    }

    public function validacion($oferta){
        $empresa = Empresa::inRandomOrder()->first();
        $oferta = Oferta::find($oferta);
        $tiposContrato = TipoContrato::all();
        return view('ofertas.formularioValidacion')->with(['tiposContrato' => $tiposContrato, 'oferta' => $oferta]);
    }

    public function validar(Request $request, $oferta){
        $oferta = Oferta::find($oferta);        
        $oferta->validada = true;
        $oferta->save;

        $request->session()->flash('alert-success', 'Se ha inscrito correctamente en el Curso '.$curso->nombre);  
        $ofertas = $ofertas = Oferta::all();
        return view('ofertas.index')->with('ofertas',$ofertas);  
    }
}
