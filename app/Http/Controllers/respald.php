<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Creating the new document...
$phpWord = new \PhpOffice\PhpWord\PhpWord();

/* Note: any element you append to a document must reside inside of a Section. */

 // Adding an empty Section to the document...
$section = $phpWord->addSection();

// Adding Text element to the Section having font styled by default...
$section->addText(
    htmlspecialchars(
        '"Learn from yesterday, live for today, hope for tomorrow. '
            . 'The important thing is not to stop questioning." '
            . '(Albert Einstein)'
    )
);

// Saving the document as HTML file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('helloWorld.docx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        //recibimos el id del elemento y buscamos en la bd
     $id =$request['id'];
       
     return view('busqueda',['id'=>$id]);
  
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //aqui se recibe el id del elemento asi como la fecha de contrato
         $id =$request['id'];



         $elemento = DB::select('select 
elemento_policial.id as id_elemento_policial,
dato_personal.nombre,
dato_personal.apellido_paterno,
dato_personal.apellido_materno,
dato_personal.estado_civil,
dato_personal.fecha_nacimiento,
direccion.activo,
direccion.calle,
direccion.n_ext,
direccion.n_int,
direccion.ciudad_id,
direccion.colonia_id,
direccion.entidad_federativa_id,
direccion.municipio_id
from elemento_policial
inner join persona_fisica on elemento_policial.persona_fisica_id=persona_fisica.id
inner join dato_personal on persona_fisica.dato_personal_id=dato_personal.id
inner join persona_fisica_direccion on persona_fisica_direcciones_id=persona_fisica.id
inner join direccion on persona_fisica_direccion.direccion_id=direccion.id
where elemento_policial.id='.$id.' and direccion.activo='."'true'".';');



         /*

select 
elemento_policial.id as id_elemento_policial,
dato_personal.nombre,
dato_personal.apellido_paterno,
dato_personal.apellido_materno,
dato_personal.estado_civil,
dato_personal.fecha_nacimiento,
direccion.activo,
direccion.calle,
direccion.n_ext,
direccion.n_int,
direccion.ciudad_id,
direccion.colonia_id,
direccion.entidad_federativa_id,
direccion.municipio_id
from elemento_policial
inner join persona_fisica on elemento_policial.persona_fisica_id=persona_fisica.id
inner join dato_personal on persona_fisica.dato_personal_id=dato_personal.id
inner join persona_fisica_direccion on persona_fisica_direcciones_id=persona_fisica.id
inner join direccion on persona_fisica_direccion.direccion_id=direccion.id
where elemento_policial.id=2 and direccion.activo='true';




         */
//dd($elemento);

  //dd($elemento[0]->ciudad_id);
         $ciudad=DB::select('select nombre from ubicacion where id='.$elemento[0]->ciudad_id.';');
         $colonia=DB::select('select nombre from ubicacion where id='.$elemento[0]->colonia_id.';');
         $entidad=DB::select('select nombre from ubicacion where id='.$elemento[0]->entidad_federativa_id.';');
         $municipio=DB::select('select nombre from ubicacion where id='.$elemento[0]->municipio_id.';');
          
          $elemento[0]->ciudad=$ciudad[0]->nombre;
          $elemento[0]->colonia=$colonia[0]->nombre;
          $elemento[0]->entidad=$entidad[0]->nombre;
          $elemento[0]->municipio=$municipio[0]->nombre;
        //  dd($elemento);

       return view('busqueda',compact('elemento'));
         //AQUI SE GENERA EL PDF Y REDIRIGE 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
