<?php

use Illuminate\Support\MessageBag;

class ProductoController extends Controller
{
	//Nombre del modulo
	private $module;	
	//INDEX Route
	private $routeIndex;
	//ADD Route	
	private $routeAdd;
	//Edit Route
	private $routeEdit;
	
	//Primary Key
	private $key;

	//Array con las propiedades de los campos para la creacion. Route: /add
	private $FieldsAdd;
	
	//Array con las propiedades de los campos para la edicion. Route: /edit 
	private $FieldsEdit;

	//Contiene el codigo HTML para generar una nueva fila para la creacion. Route: /add
	private $addrow;
	
	//Se crea un objeto del modelo
	private $newObj;
	
	//ProductoController - Rutas de inventario
	private $rutasValidas;
	
	// Modelo - Nombres de los campos.
	private $FieldsName;
	
	
	public function __construct(){

		$this->newObj = new Producto();
		
		$this->key 					= 	$this->newObj->getPrimaryKey();
		$this->FieldsName 			= 	$this->newObj->getFieldsName();
		
		$this->module 		= 	$this->newObj->getModule();
		$this->routeIndex 	= 	$this->module."/index";	
		$this->routeAdd 	= 	$this->module."/add";
		$this->routeEdit 	= 	$this->module."/edit";
		
		$this->FieldsIndex = $this->newObj->getFieldsIndex();
		$this->FieldsAdd = $this->newObj->getFieldsAdd();
			
		
		//ProductoController - Query para obtener las rutas de inventario
		$this->getRuta();
	
	}
	//Metodo cuando se carga la pagina: /
    public function indexAction(){	
		
		//Se cargan todos los productos
		$records = Producto::queryAll();
		// Se crea el objeto que se le pasa a la vista
		$object = [
            "records" 					=> 	$records,
			"FieldsIndex"				=>	$this->FieldsIndex,
			"module" 					=> 	$this->module,
			"key"						=> 	$this->key
        ];
		//Se crea la vista index - definida en index.blade.php
        return View::make($this->routeIndex, $object);

    }
	//Metodo cuando se carga la pagina: /add
	public function addAction(){
		
		try{
			//indice de la fila que se va a insertar
			$xi = 0;
			
			//Se asigna en - add.js
			if(Input::has('index')) {
				$xi = Input::get("index");
			}
			
			//ProductoController - Escoger el valor correcto del elemento Checkbox
			if(Input::get($this->FieldsAdd['6']['name'].$xi) == true) { //disponible
				$disponiblechk = Input::get($this->FieldsAdd['6']['name'].$xi);
			}else{
				$disponiblechk = false;
			}

			
			if ($this->newObj->isPosted())
			{
				//get all the inputs
				$new = Input::all();				
				// attempt validation
				die("posted");
				if ($this->newObj->validate($xi,$new,1))//add
				{
					//Nuevo objeto
					$object  = 	Producto::create([
								$this->FieldsAdd['2']['field']	=> 	Input::get($this->FieldsAdd['2']['name'].$xi),
								$this->FieldsAdd['3']['field']	=> 	Input::get($this->FieldsAdd['3']['name'].$xi),
								$this->FieldsAdd['4']['field']	=> 	Input::get($this->FieldsAdd['4']['name'].$xi),
								$this->FieldsAdd['5']['field']	=> 	Input::get($this->FieldsAdd['5']['name'].$xi),
								$this->FieldsAdd['6']['field']	=> 	$disponiblechk						
							]);	
						//Creacion exitosa
						return Response::json([
							'fehler'	=>	false,
							'success' 	=> 	true,
							'iddelrow'	=>	Input::get('index')
						]);
				}
				else{
					//errores
					$this->errors 	= $this->newObj->getErrors();
					$this->addrow 	= $this->addrowAction();
					return Response::json([
						'fehler'	=>	true,
						'success'	=>	true,
						'error' 	=> 	$this->errors->toArray(),
						'iddelrow'	=>	Input::get('index')
					]);		
				}				
			}
		} catch (\Illuminate\Database\QueryException $e) {
			//Errores de SQL
			$this->errors[0] = "SQL Error: " . $e->getMessage() . "\n";
			return Response::json([
				'fehler'=>true,
				'success'=>true,
				'error' => $this->errors,
				'iddelrow'=>Input::get('index')
			]);	
		}

		//Anadir una fila
		$this->addrow = $this->addrowAction();
		//Crear vista
        return View::make($this->routeAdd, [
			"row"					=> 	$this->addrow,
			"FieldsAdd"			=> 	$this->FieldsAdd,
			"module" 				=> 	$this->module,	
			"key"					=> 	$this->key
        ]);
    }
	public function editAction(){
		
		// create a new model instance     
////////////////////////////////////////////////////////////
		$xi = 0;
		//if(Input::has('index')) {
		//	$xi = Input::get("index");
		//}
/////////////////////////////////////////////////////////////
	
		$Objnew 		= 	new Producto();		
        $keyValue    	= 	Input::get($this->key);		
		$object 		= 	Producto::findOrFail($keyValue);
        $url   			= 	URL::full();
		//$FieldsnameHelper = $this->FieldsName;
		
		if(Input::get($this->FieldsEdit['6']['name'].$xi) == true) { //disponible
			$disponiblechk = Input::get($this->FieldsEdit['6']['name'].$xi);
		}else{
			$disponiblechk = false;
		}
	
		if ($Objnew->isPosted()){
			
			$i=0;
			
				$new = Input::all();
				if ($object->validate($i,$new,2))
				{	

	
					$object[$object::$FieldsName[Producto::$FieldsOrderEdit['2']]]		= 	Input::get($this->FieldsEdit['2']['name'].$xi);
					$object[$object::$FieldsName[Producto::$FieldsOrderEdit['3']]]		= 	Input::get($this->FieldsEdit['3']['name'].$xi);
					$object[$object::$FieldsName[Producto::$FieldsOrderEdit['4']]]		= 	Input::get($this->FieldsEdit['4']['name'].$xi);	
					$object[$object::$FieldsName[Producto::$FieldsOrderEdit['5']]]		= 	Input::get($this->FieldsEdit['5']['name'].$xi);	
					$object[$object::$FieldsName[Producto::$FieldsOrderEdit['6']]]		= 	$disponiblechk;	

					//die(var_dump($object));					
					$object->save();			
					
					//die(var_dump($object));
					return Response::json(['fehler'=>false,'success'=>true, 'key'=>$keyValue]);
					//return Redirect::route($this->routeIndex);
				}
				//die(var_dump($Objnew)." -------------------");
				return Response::json(['fehler'=>true,'success'=>true, 'error' => $object->errors()->toArray(),'key'=>$keyValue]);	
				//return Redirect::to($url)->withInput([
					//"key"   		=> 	Input::get($this->key),
					//"object"     	=> 	$object,
					//"errors" 		=> 	$object->errors(),
					//"url"    		=> 	$url
				//]);

			}
		
        return View::make($this->routeEdit, [
           
            "form"      		=> 	$Objnew,
			"object"     		=> 	$object,
			"FieldsEdit"		=>	$this->FieldsEdit,
            "module" 			=> 	$this->module,
			"key"				=> 	$this->key,
			"routes" 			=>	$this->rutasValidas
        ]);	

	}
	public function deleteAction(){
		$Objdel = new Producto();
		$new = Input::all();
		
		if ($Objdel->validate(Input::get($this->key),$new,3))//delete
        {
            $object = Producto::findOrFail(Input::get($this->key));
            $object->delete();
        }

        return Redirect::route($this->routeIndex);
    } 
    private function getRuta(){
		$rutas = DB::select('select  `CC`.`ID` as ID,`DCLINEA`.`VALOR` AS LINEA  from ((`inv_codigo_clasificacion` `CC` join `inv_detalle_codigo_clasificacion` `DCLASE` on((`CC`.`ID_CLASE` = `DCLASE`.`ID`))) join `inv_detalle_codigo_clasificacion` `DCLINEA` on((`CC`.`ID_LINEA` = `DCLINEA`.`ID`))) group by LINEA');
		
		foreach($rutas as $lineaobject ){
	
			$clases = DB::select('select `CC`.`ID` AS ID,`DCLASE`.`VALOR` AS CLASE  from ((`inv_codigo_clasificacion` `CC` join `inv_detalle_codigo_clasificacion` `DCLASE` on((`CC`.`ID_CLASE` = `DCLASE`.`ID`))) join `inv_detalle_codigo_clasificacion` `DCLINEA` on((`CC`.`ID_LINEA` = `DCLINEA`.`ID`))) where `DCLINEA`.`VALOR` = "'.$lineaobject->LINEA.'"');
			unset($clasesarray);
			foreach($clases as $clasesobject ){
				$clasesarray[$clasesobject->ID] = $clasesobject->CLASE;
			}		
			$comboIDRuta[$lineaobject->LINEA] = $clasesarray;
		}
		$this->rutasValidas = $comboIDRuta;
		
	}
	public function addrowAction(){
		
			$linenumber = "0";
		if(Input::has('linenumber')) {
			$linenumber = Input::get("linenumber");
		}
		
		$field1 = $this->FieldsAdd['1'];
		$field2 = $this->FieldsAdd['2'];
		$field3 = $this->FieldsAdd['3'];
		$field4 = $this->FieldsAdd['4'];
		$field5 = $this->FieldsAdd['5'];
		$field6 = $this->FieldsAdd['6'];


		$addrow = 	"<tr id='tr_".$linenumber."'>";

		$addrow .=	Form::columnAdd([
								"type"				=>	$field1['type'],
								"name"        		=> 	$field1['name'].$linenumber,
								"id"        			=> 	$field1['id'].$linenumber,//
								"placeholder" 	=> 	trans($field1['placeholder']),
								"size"				=> 	$field1['size']
						
							]);
		$addrow .=	Form::columnAdd([
								"type"				=>	$field2['type'],
								"name"        		=> 	$field2['name'].$linenumber,
								"id"        			=> 	$field2['id'].$linenumber,//
								"placeholder" 	=> 	trans($field2['placeholder']),
								"size"				=> 	$field2['size']	
						
							]);
		$addrow .=	Form::columnAdd([
								"type"				=>	$field3['type'],
								"name"        		=> 	$field3['name'].$linenumber,
								"id"        			=> 	$field3['id'].$linenumber,//
								"placeholder" 	=> 	trans($field3['placeholder']),
								"size"				=> 	$field3['size']		
								
							]);	
		$addrow .=	Form::columnAdd([
								"type"				=>	$field4['type'],
								"name"        		=> 	$field4['name'].$linenumber,
								"id"        			=> 	$field4['id'].$linenumber,//
								"placeholder" 	=> 	trans($field4['placeholder']),
								"size"				=> 	$field4['size'],
								"routes"			=> 	$this->rutasValidas				
							]);	
		$addrow .=	Form::columnAdd([
								"type"				=>	$field5['type'],
								"name"        		=> 	$field5['name'].$linenumber,
								"id"        			=> 	$field5['id'].$linenumber,//
								"placeholder" 	=> 	trans($field5['placeholder']),
								"size"				=> 	$field5['size']						
							]);	
		$addrow .=	Form::columnAdd([
								"type"				=>	$field6['type'],
								"name"        		=> 	$field6['name'].$linenumber,
								"id"        			=> 	$field6['id'].$linenumber,//
								"placeholder" 	=> 	trans($field6['placeholder']),
								"size"				=> 	$field6['size']			
							]);						
		$addrow .=	 "</tr>";

	return $addrow;
    } 
}

	/*	$form  			= 		new ProductoForm();
        $keyValue    	= 		Input::get($this->key);
		
		$i=0;
		
        $object = Producto::findOrFail($keyValue);
        $url   = URL::full();
		$FieldsnameHelper = $this->FieldsName;
		
		if(Input::get($this->FieldsAdd['6']['name'].'0') == true) { //disponible
			$disponiblechk = Input::get($this->FieldsAdd['6']['name'].'0');
		}else{
			$disponiblechk = false;
		}	
		
		if ($form->isPosted()){

				$new = Input::all();
				if ($object->validate($i,$new,2))
				{

					$object->$FieldsnameHelper['2'] 	= 	Input::get($this->FieldsEdit['2']['name'].$i);
					$object->$FieldsnameHelper['3'] 	= 	Input::get($this->FieldsEdit['3']['name'].$i);
					$object->$FieldsnameHelper['4'] 	= 	Input::get($this->FieldsEdit['4']['name'].$i);
					$object->$FieldsnameHelper['5'] 	= 	Input::get($this->FieldsEdit['5']['name'].$i);
					$object->$FieldsnameHelper['6'] 	= 	$disponiblechk	;				
					$object->save();					
					
					return Redirect::route($this->routeIndex);
				}

			}
		
        return View::make($this->routeEdit, [
            "form"      			=> 	$form,
            "object"     		=> 	$object,
			"FieldsEdit"		=>	$this->FieldsEdit,
            "module" 			=> 	$this->module,
			"key"				=> 	$this->key,
			"routes" 			=>	$this->rutasValidas
        ]);	*/