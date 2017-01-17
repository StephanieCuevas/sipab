<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContratoController extends Controller
{




        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function downloadWORD(Request $request)
    {
       
    //recibimos el id del elemento y buscamos en la bd
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




         $ciudad=DB::select('select nombre from ubicacion where id='.$elemento[0]->ciudad_id.';');
         $colonia=DB::select('select nombre from ubicacion where id='.$elemento[0]->colonia_id.';');
         $entidad=DB::select('select nombre from ubicacion where id='.$elemento[0]->entidad_federativa_id.';');
         $municipio=DB::select('select nombre from ubicacion where id='.$elemento[0]->municipio_id.';');
          
          $elemento[0]->ciudad=$ciudad[0]->nombre;
          $elemento[0]->colonia=$colonia[0]->nombre;
          $elemento[0]->entidad=$entidad[0]->nombre;
          $elemento[0]->municipio=$municipio[0]->nombre;




      // Creating the new document...
$phpWord = new \PhpOffice\PhpWord\PhpWord();

/* Note: any element you append to a document must reside inside of a Section. */

 // Adding an empty Section to the document...
$section = $phpWord->addSection();




$templateWord = new \PhpOffice\PhpWord\TemplateProcessor('ofi3.docx');

 
$nombre =$elemento[0]->nombre." ".$elemento[0]->apellido_paterno." ".$elemento[0]->apellido_materno;
$direccion=$elemento[0]->calle.", ".$elemento[0]->n_ext.", Col.".$elemento[0]->colonia.", ".$elemento[0]->municipio.", ".$elemento[0]->entidad;


$edad="25";




// --- Asignamos valores a la plantilla
$templateWord->setValue('nombre',$nombre);
$templateWord->setValue('direccion',$direccion);

// --- Guardamos el documento
$templateWord->saveAs('contrato'.$id.'.docx');
//aqui checa cmo redigir a show y le pasas ell id
       // For a route with the following URI: profile/{id}

return redirect()->route('contrato.show', [$id]);
  
    }






    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Creating the new document...

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


         $ciudad=DB::select('select nombre from ubicacion where id='.$elemento[0]->ciudad_id.';');
         $colonia=DB::select('select nombre from ubicacion where id='.$elemento[0]->colonia_id.';');
         $entidad=DB::select('select nombre from ubicacion where id='.$elemento[0]->entidad_federativa_id.';');
         $municipio=DB::select('select nombre from ubicacion where id='.$elemento[0]->municipio_id.';');
          
          $elemento[0]->ciudad=$ciudad[0]->nombre;
          $elemento[0]->colonia=$colonia[0]->nombre;
          $elemento[0]->entidad=$entidad[0]->nombre;
          $elemento[0]->municipio=$municipio[0]->nombre;
       
     return view('show',['elemento'=>$elemento]);
  
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //se guarda en la base de datos ys e recibe fecha
        //recibimos el id del elemento y buscamos en la bd
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




         $ciudad=DB::select('select nombre from ubicacion where id='.$elemento[0]->ciudad_id.';');
         $colonia=DB::select('select nombre from ubicacion where id='.$elemento[0]->colonia_id.';');
         $entidad=DB::select('select nombre from ubicacion where id='.$elemento[0]->entidad_federativa_id.';');
         $municipio=DB::select('select nombre from ubicacion where id='.$elemento[0]->municipio_id.';');
          
          $elemento[0]->ciudad=$ciudad[0]->nombre;
          $elemento[0]->colonia=$colonia[0]->nombre;
          $elemento[0]->entidad=$entidad[0]->nombre;
          $elemento[0]->municipio=$municipio[0]->nombre;




      // Creating the new document...
$phpWord = new \PhpOffice\PhpWord\PhpWord();

/* Note: any element you append to a document must reside inside of a Section. */

 // Adding an empty Section to the document...
$section = $phpWord->addSection();




$templateWord = new \PhpOffice\PhpWord\TemplateProcessor('ofi3.docx');

 
$nombre =$elemento[0]->nombre." ".$elemento[0]->apellido_paterno." ".$elemento[0]->apellido_materno;
$direccion=$elemento[0]->calle.", ".$elemento[0]->n_ext.", Col.".$elemento[0]->colonia.", ".$elemento[0]->municipio.", ".$elemento[0]->entidad;


$edad="25";




// --- Asignamos valores a la plantilla
$templateWord->setValue('nombre',$nombre);
$templateWord->setValue('direccion',$direccion);

// --- Guardamos el documento
$templateWord->saveAs('contrato'.$id.'.docx');
//aqui checa cmo redigir a show y le pasas ell id
     // For a route with the following URI: profile/{id}

return redirect()->route('contrato.show', [$id]);
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     //se guarda en la base de datos ys e recibe fecha
        //recibimos el id del elemento y buscamos en la bd
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
    direccion.municipio_id,
    elemento_policial.fecha_inicio_laboral
    from elemento_policial
    inner join persona_fisica on elemento_policial.persona_fisica_id=persona_fisica.id
    inner join dato_personal on persona_fisica.dato_personal_id=dato_personal.id
    inner join persona_fisica_direccion on persona_fisica_direcciones_id=persona_fisica.id
    inner join direccion on persona_fisica_direccion.direccion_id=direccion.id
    where elemento_policial.id='.$id.' and direccion.activo='."'true'".';');

   

         $ciudad=DB::select('select nombre from ubicacion where id='.$elemento[0]->ciudad_id.';');
         $colonia=DB::select('select nombre from ubicacion where id='.$elemento[0]->colonia_id.';');
         $entidad=DB::select('select nombre from ubicacion where id='.$elemento[0]->entidad_federativa_id.';');
         $municipio=DB::select('select nombre from ubicacion where id='.$elemento[0]->municipio_id.';');
          
          $elemento[0]->ciudad=$ciudad[0]->nombre;
          $elemento[0]->colonia=$colonia[0]->nombre;
          $elemento[0]->entidad=$entidad[0]->nombre;
          $elemento[0]->municipio=$municipio[0]->nombre;




      // Creating the new document...
$phpWord = new \PhpOffice\PhpWord\PhpWord();

/* Note: any element you append to a document must reside inside of a Section. */

 // Adding an empty Section to the document...
$section = $phpWord->addSection();




$templateWord = new \PhpOffice\PhpWord\TemplateProcessor('ofi3.docx');

 
$nombre =$elemento[0]->nombre." ".$elemento[0]->apellido_paterno." ".$elemento[0]->apellido_materno;
$direccion=$elemento[0]->calle.", ".$elemento[0]->n_ext.", Col.".$elemento[0]->colonia.", ".$elemento[0]->municipio.", ".$elemento[0]->entidad;


//fecha de contratacion
$fch_ano=substr($elemento[0]->fecha_inicio_laboral, 0, -15);
$fch_mes=substr($elemento[0]->fecha_inicio_laboral, 5, -12);
$fch_dia=substr($elemento[0]->fecha_inicio_laboral,  8, -9);
$mesfinal="";

if ($fch_mes==1) {
    $mesfinal="enero";
}
if ($fch_mes==2) {
    $mesfinal="febrero";
}
if ($fch_mes==3) {
    $mesfinal="marzo";
}
if ($fch_mes==4) {
    $mesfinal="abril";
}
if ($fch_mes==5) {
    $mesfinal="mayo";
}
if ($fch_mes==6) {
    $mesfinal="junio";
}
if ($fch_mes==7) {
    $mesfinal="julio";
}
if ($fch_mes==8) {
    $mesfinal="agosto";
}
if ($fch_mes==9) {
    $mesfinal="septiembre";
}
if ($fch_mes==10) {
    $mesfinal="octubre";
}
if ($fch_mes==11) {
    $mesfinal="noviembre";
}
if ($fch_mes==12) {
    $mesfinal="diciembre";
}

$year=substr($elemento[0]->fecha_nacimiento, 0, -15);
$month=substr($elemento[0]->fecha_nacimiento, 5, -12);
$anoactual=date("Y");
$mesactual=date("m");
if ($mesactual<=$month) {
    $edad=$anoactual-$year;
    $edad= $edad-1;
   
}else{
    $edad=$anoactual-$year;

}

$estado=$elemento[0]->estado_civil;


// --- Asignamos valores a la plantilla
$templateWord->setValue('nombre',$nombre);
$templateWord->setValue('edad',$edad);
$templateWord->setValue('direccion',$direccion);
// --- Asignamos valores de fecha
$templateWord->setValue('dia',$fch_dia);
$templateWord->setValue('mes',$mesfinal);
$templateWord->setValue('ano',$fch_ano);
// --- Asignamos esatdo civil
$templateWord->setValue('estado_civil',$estado);

// --- Guardamos el documento
$templateWord->saveAs($id.$elemento[0]->nombre.'.docx');
//aqui checa cmo redigir a show y le pasas ell id
     // For a route with the following URI: profile/{id}

return redirect()->route('contrato.show', [$id]);

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
