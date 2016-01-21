<?php

use Illuminate\Support\MessageBag;

class ProductoController extends Controller
{
	
	private $module;
	private $routeIndex;	
	private $routeAdd;
	private $routeEdit;
	
	private $key;
	private $FieldsName;
		
	private $FieldsCreate;
	private $FieldsEdit;
	private $rutasValidas;
	private $addForm;
	private $addrow;
	
	public function __construct(){
		
		$this->module 			= "producto";
		$this->routeIndex 		= $this->module."/index";	
		$this->routeAdd 		= $this->module."/add";
		$this->routeEdit 		= $this->module."/edit";
		
		$this->key = Producto::$FieldsName[1];
		
		$size = 1;		
		$indexCreate = 1;		
		$this->FieldsCreate =  array($indexCreate			=>	array( 'field' => Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexCreate]],'type' =>'text','name' => 'field'.$indexCreate.'_txt_', 'id' => 'field'.$indexCreate.'_txt_' , 'label'=>$this->module.'.'.strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexCreate]]), 'placeholder'=>$this->module.".".strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexCreate]]).'placeholder','size'=>$size));
		
		$indexCreate = 2;
		$this->FieldsCreate[$indexCreate] = array( 'field' => Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexCreate]],'type' =>'text','name' => 'field'.$indexCreate.'_txt_', 'id' => 'field'.$indexCreate.'_txt_' , 'label'=>$this->module.'.'.strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexCreate]]), 'placeholder'=>$this->module.".".strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexCreate]]).'placeholder','size'=>$size);
		
		$indexCreate = 3;
		$this->FieldsCreate[$indexCreate] = array( 'field' => Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexCreate]],'type' =>'text','name' => 'field'.$indexCreate.'_txt_', 'id' => 'field'.$indexCreate.'_txt_' , 'label'=>$this->module.'.'.strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexCreate]]), 'placeholder'=>$this->module.".".strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexCreate]]).'placeholder','size'=>$size);
		
		$indexCreate = 4;
		$this->FieldsCreate[$indexCreate] = array( 'field' => Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexCreate]],'type' =>'select','name' => 'field'.$indexCreate.'_txt_', 'id' => 'field'.$indexCreate.'_txt_' ,'label'=>$this->module.'.'.strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexCreate]]), 'placeholder'=>$this->module.".".strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexCreate]]).'placeholder','size'=>'1','sizend'=>$size);
		
		$indexCreate = 5;
		$this->FieldsCreate[$indexCreate] = array( 'field' => Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexCreate]],'type' =>'text','name' => 'field'.$indexCreate.'_txt_', 'id' => 'field'.$indexCreate.'_txt_' , 'label'=>$this->module.'.'.strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexCreate]]), 'placeholder'=>$this->module.".".strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexCreate]]).'placeholder','size'=>$size);
		
		$indexCreate = 6;
		$this->FieldsCreate[$indexCreate] = array( 'field' => Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexCreate]],'type' =>'checkbox','name' => 'field'.$indexCreate.'_txt_', 'id' => 'field'.$indexCreate.'_txt_' , 'label'=>$this->module.'.'.strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexCreate]]), 'placeholder'=>$this->module.".".strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexCreate]]).'placeholder','size'=>$size);

		
			
		$size = 1;		
		$indexEdit = 1;		
		$this->FieldsEdit =  array($indexEdit			=>	array( 'field' => Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexEdit]],'type' =>'text','name' => 'field'.$indexEdit.'_txt_', 'id' => 'field'.$indexEdit.'_txt_' , 'label'=>$this->module.'.'.strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexEdit]]), 'placeholder'=>$this->module.".".strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexEdit]]).'placeholder','size'=>$size));
		
		$indexEdit = 2;
		$this->FieldsEdit[$indexEdit] = array( 'field' => Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexEdit]],'type' =>'text','name' => 'field'.$indexEdit.'_txt_', 'id' => 'field'.$indexEdit.'_txt_' , 'label'=>$this->module.'.'.strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexEdit]]), 'placeholder'=>$this->module.".".strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexEdit]]).'placeholder','size'=>$size);
		
		$indexEdit = 3;
		$this->FieldsEdit[$indexEdit] = array( 'field' => Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexEdit]],'type' =>'text','name' => 'field'.$indexEdit.'_txt_', 'id' => 'field'.$indexEdit.'_txt_' , 'label'=>$this->module.'.'.strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexEdit]]), 'placeholder'=>$this->module.".".strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexEdit]]).'placeholder','size'=>$size);
		
		$indexEdit = 4;
		$this->FieldsEdit[$indexEdit] = array( 'field' => Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexEdit]],'type' =>'select','name' => 'field'.$indexEdit.'_txt_', 'id' => 'field'.$indexEdit.'_txt_' ,'label'=>$this->module.'.'.strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexEdit]]), 'placeholder'=>$this->module.".".strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexEdit]]).'placeholder','size'=>'1','sizend'=>$size);
		
		$indexEdit = 5;
		$this->FieldsEdit[$indexEdit] = array( 'field' => Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexEdit]],'type' =>'text','name' => 'field'.$indexEdit.'_txt_', 'id' => 'field'.$indexEdit.'_txt_' , 'label'=>$this->module.'.'.strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexEdit]]), 'placeholder'=>$this->module.".".strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexEdit]]).'placeholder','size'=>$size);
		
		$indexEdit = 6;
		$this->FieldsEdit[$indexEdit] = array( 'field' => Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexEdit]],'type' =>'checkbox','name' => 'field'.$indexEdit.'_txt_', 'id' => 'field'.$indexEdit.'_txt_' , 'label'=>$this->module.'.'.strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexEdit]]), 'placeholder'=>$this->module.".".strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexEdit]]).'placeholder','size'=>$size);
		
		
		$index = 1;
		$this->FieldsIndex =  array( $index			=>	array( 'field' => Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]],'type' =>'text','name' => strtolower(Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]]).'_txt_', 'label'=>$this->module.'.'.strtolower(Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]]), 'placeholder'=>$this->module.".".strtolower(Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]]).'placeholder','size'=>$size));
		
		$index = 2;
		$this->FieldsIndex[$index] = array( 'field' => Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]],'type' =>'text','name' => strtolower(Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]]).'_txt_', 'label'=>$this->module.'.'.strtolower(Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]]), 'placeholder'=>$this->module.".".strtolower(Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]]).'placeholder','size'=>$size);
		
		$index = 3;
		$this->FieldsIndex[$index] = array( 'field' => Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]],'type' =>'text','name' => strtolower(Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]]).'_txt_', 'label'=>$this->module.'.'.strtolower(Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]]), 'placeholder'=>$this->module.".".strtolower(Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]]).'placeholder','size'=>$size);

		$index = 4;
		$this->FieldsIndex[$index] = array( 'field' => Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]],'type' =>'text','name' => strtolower(Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]]).'_txt_', 'label'=>$this->module.'.'.strtolower(Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]]), 'placeholder'=>$this->module.".".strtolower(Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]]).'placeholder','size'=>$size);

		$index = 5;
		$this->FieldsIndex[$index] = array( 'field' => Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]],'type' =>'text','name' => strtolower(Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]]).'_txt_', 'label'=>$this->module.'.'.strtolower(Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]]), 'placeholder'=>$this->module.".".strtolower(Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]]).'placeholder','size'=>$size);

		$index = 6;		
		$this->FieldsIndex[$index] = array( 'field' => Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]],'type' =>'checkbox','name' => strtolower(Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]]).'_txt_', 'label'=>$this->module.'.'.strtolower(Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]]),'size'=>$size);

	
		$this->getRuta();
	
	}	
    public function indexAction(){	

		$records = Producto::queryAll();

		$object = [
            "records" 					=> 	$records,
			"FieldsIndex"				=>	$this->FieldsIndex,
			"module" 					=> 	$this->module,
			"key"						=> 	$this->key
        ];

        return View::make($this->routeIndex, $object);

    }
	public function addAction(){
		
	try{		
			// create a new model instance     
	////////////////////////////////////////////////////////////
			$xi = 0;
			if(Input::has('index')) {
				$xi = Input::get("index");
			}
	/////////////////////////////////////////////////////////////
			
			$Objnew = new Producto();
			
			if(Input::get($this->FieldsCreate['6']['name'].$xi) == true) { //disponible
				$disponiblechk = Input::get($this->FieldsCreate['6']['name'].$xi);
			}else{
				$disponiblechk = false;
			}


			if ($Objnew->isPosted())
			{
					$new = Input::all();				
					// attempt validation
					if ($Objnew->validate($xi,$new,1))//add
					{

							$object  = Producto::create([

								Producto::$FieldsName[Producto::$FieldsOrderCreate['2']]		=> 	Input::get($this->FieldsCreate['2']['name'].$xi),
								Producto::$FieldsName[Producto::$FieldsOrderCreate['3']]		=> 	Input::get($this->FieldsCreate['3']['name'].$xi),
								Producto::$FieldsName[Producto::$FieldsOrderCreate['4']]		=> 	Input::get($this->FieldsCreate['4']['name'].$xi),
								Producto::$FieldsName[Producto::$FieldsOrderCreate['5']]		=> 	Input::get($this->FieldsCreate['5']['name'].$xi),
								Producto::$FieldsName[Producto::$FieldsOrderCreate['6']]		=> 	$disponiblechk						
								
							]);	
						return Response::json(['fehler'=>false,'success' => true,'iddelrow'=>Input::get('index')]);
					}
					else
					{
						//die();
						$this->errors = $Objnew->errors();
						$this->addrow = $this->addrowAction();
						return Response::json(['fehler'=>true,'success'=>true, 'error' => $this->errors->toArray(),'iddelrow'=>Input::get('index')]);		
					}				
			}
		} catch (\Illuminate\Database\QueryException $e) {
			$this->errors[0] = "SQL Error: " . $e->getMessage() . "\n";
			return Response::json(['fehler'=>true,'success'=>true, 'error' => $this->errors,'iddelrow'=>Input::get('index')]);	
		}

		
		$this->addrow = $this->addrowAction();
		
		$object;
		$xi=0;
        return View::make($this->routeAdd, [

			"row"								=> 	$this->addrow,
			"FieldsCreate"						=> 	$this->FieldsCreate,
			"module" 							=> 	$this->module,	
			"key"								=> 	$this->key
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
					return Redirect::route($this->routeIndex);
				}
				//die(var_dump($Objnew)." -------------------");
				return Response::json(['fehler'=>true,'success'=>true, 'error' => $object->errors()->toArray(),'key'=>$keyValue]);	
				/*return Redirect::to($url)->withInput([
					"key"   		=> 	Input::get($this->key),
					"object"     	=> 	$object,
					"errors" 		=> 	$object->errors(),
					"url"    		=> 	$url
				]);*/

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
		
		$field1 = $this->FieldsCreate['1'];
		$field2 = $this->FieldsCreate['2'];
		$field3 = $this->FieldsCreate['3'];
		$field4 = $this->FieldsCreate['4'];
		$field5 = $this->FieldsCreate['5'];
		$field6 = $this->FieldsCreate['6'];


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
		
		if(Input::get($this->FieldsCreate['6']['name'].'0') == true) { //disponible
			$disponiblechk = Input::get($this->FieldsCreate['6']['name'].'0');
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