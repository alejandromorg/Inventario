<?php

use Illuminate\Support\MessageBag;

class CompraController extends Controller
{
	private $module;
	private $routeIndex;	
	private $routeAdd;
	private $routeEdit;
	
	private $key;
	
	private $FieldsName;
	
	private $FieldsCreate;
	private $FieldsEdit;
	private $FieldsIndex;
	private $FieldsOrderCreate;
	private $FieldsOrderIndex;
	private $FieldsOrderEdit;

	private $addrow;
	
	private $proveedoresCombo;
	private $productoCombo;
	private $unidadEmpaqueCombo;
	
	private $errors;
	
	public function __construct(){

		$this->module 			= 	"compra";
		$this->routeIndex 		= 	$this->module."/index";	
		$this->routeAdd 		= 	$this->module."/add";
		$this->routeEdit 		= 	$this->module."/edit";
		
		$this->key = Compra::$FieldsName[1];
		
		
		$size = 1;		
		$indexCreate = 1;		
		$this->FieldsCreate =  array($indexCreate			=>	array( 'field' => Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexCreate]],'type' =>'text','name' => 'field'.$indexCreate.'_txt_', 'id' => 'field'.$indexCreate.'_txt_' , 'label'=>$this->module.'.'.strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexCreate]]), 'placeholder'=>$this->module.".".strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexCreate]]).'placeholder','size'=>$size));
		
		$indexCreate = 2;
		$this->FieldsCreate[$indexCreate] = array( 'field' => Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexCreate]],'type' =>'select','name' => 'field'.$indexCreate.'_txt_', 'id' => 'field'.$indexCreate.'_txt_' ,'label'=>$this->module.'.'.strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexCreate]]), 'placeholder'=>$this->module.".".strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexCreate]]).'placeholder','size'=>'1','sizend'=>$size);
		
		$indexCreate = 3;
		$this->FieldsCreate[$indexCreate] = array( 'field' => Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexCreate]],'type' =>'select','name' => 'field'.$indexCreate.'_txt_', 'id' => 'field'.$indexCreate.'_txt_' ,'label'=>$this->module.'.'.strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexCreate]]), 'placeholder'=>$this->module.".".strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexCreate]]).'placeholder','size'=>'1','sizend'=>$size);
		
		$indexCreate = 4;
		$this->FieldsCreate[$indexCreate] = array( 'field' => Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexCreate]],'type' =>'text','name' => 'field'.$indexCreate.'_txt_', 'id' => 'field'.$indexCreate.'_txt_' , 'label'=>$this->module.'.'.strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexCreate]]), 'placeholder'=>$this->module.".".strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexCreate]]).'placeholder','size'=>$size);
		
		$indexCreate = 5;
		$this->FieldsCreate[$indexCreate] = array( 'field' => Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexCreate]],'type' =>'select','name' => 'field'.$indexCreate.'_txt_', 'id' => 'field'.$indexCreate.'_txt_' ,'label'=>$this->module.'.'.strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexCreate]]), 'placeholder'=>$this->module.".".strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexCreate]]).'placeholder','size'=>'1','sizend'=>$size);
		
		$indexCreate = 6;
		$this->FieldsCreate[$indexCreate] = array( 'field' => Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexCreate]],'type' =>'text','name' => 'field'.$indexCreate.'_txt_', 'id' => 'field'.$indexCreate.'_txt_' , 'label'=>$this->module.'.'.strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexCreate]]), 'placeholder'=>$this->module.".".strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexCreate]]).'placeholder','size'=>$size);
		
		$indexCreate = 7;
		$size = 11;
		$this->FieldsCreate[$indexCreate] = array( 'field' => Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexCreate]],'type' =>'date','name' => 'field'.$indexCreate.'_txt_', 'id' => 'field'.$indexCreate.'_txt_' , 'label'=>$this->module.'.'.strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexCreate]]), 'placeholder'=>$this->module.".".strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexCreate]]).'placeholder','size'=>$size);
		

		$size = 1;		
		$indexEdit = 1;		
		$this->FieldsEdit =  array($indexEdit			=>	array( 'field' => Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexEdit]],'type' =>'text','name' => 'field'.$indexEdit.'_txt_', 'id' => 'field'.$indexEdit.'_txt_' , 'label'=>$this->module.'.'.strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexEdit]]), 'placeholder'=>$this->module.".".strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexEdit]]).'placeholder','size'=>$size));
		
		$indexEdit = 2;
		$this->FieldsEdit[$indexEdit] = array( 'field' => Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexEdit]],'type' =>'select','name' => 'field'.$indexEdit.'_txt_', 'id' => 'field'.$indexEdit.'_txt_' ,'label'=>$this->module.'.'.strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexEdit]]), 'placeholder'=>$this->module.".".strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexEdit]]).'placeholder','size'=>'1','sizend'=>$size);
		
		$indexEdit = 3;
		$this->FieldsEdit[$indexEdit] = array( 'field' => Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexEdit]],'type' =>'select','name' => 'field'.$indexEdit.'_txt_', 'id' => 'field'.$indexEdit.'_txt_' ,'label'=>$this->module.'.'.strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexEdit]]), 'placeholder'=>$this->module.".".strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexEdit]]).'placeholder','size'=>'1','sizend'=>$size);
		
		$indexEdit = 4;
		$this->FieldsEdit[$indexEdit] = array( 'field' => Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexEdit]],'type' =>'text','name' => 'field'.$indexEdit.'_txt_', 'id' => 'field'.$indexEdit.'_txt_' , 'label'=>$this->module.'.'.strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexEdit]]), 'placeholder'=>$this->module.".".strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexEdit]]).'placeholder','size'=>$size);
		
		$indexEdit = 5;
		$this->FieldsEdit[$indexEdit] = array( 'field' => Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexEdit]],'type' =>'select','name' => 'field'.$indexEdit.'_txt_', 'id' => 'field'.$indexEdit.'_txt_' ,'label'=>$this->module.'.'.strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexEdit]]), 'placeholder'=>$this->module.".".strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexEdit]]).'placeholder','size'=>'1','sizend'=>$size);
		
		$indexEdit = 6;
		$this->FieldsEdit[$indexEdit] = array( 'field' => Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexEdit]],'type' =>'text','name' => 'field'.$indexEdit.'_txt_', 'id' => 'field'.$indexEdit.'_txt_' , 'label'=>$this->module.'.'.strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexEdit]]), 'placeholder'=>$this->module.".".strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexEdit]]).'placeholder','size'=>$size);
		
		$indexEdit = 7;
		$this->FieldsEdit[$indexEdit] = array( 'field' => Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexEdit]],'type' =>'text','name' => 'field'.$indexEdit.'_txt_', 'id' => 'field'.$indexEdit.'_txt_' , 'label'=>$this->module.'.'.strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexEdit]]), 'placeholder'=>$this->module.".".strtolower(Compra::$FieldsName[Compra::$FieldsOrderCreate[$indexEdit]]).'placeholder','size'=>$size);
		
		$index = 1;
		$this->FieldsIndex =  array( $index			=>	array( 'field' => Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]],'type' =>'text','name' => strtolower(Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]]).'_txt_', 'label'=>$this->module.'.'.strtolower(Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]]), 'placeholder'=>$this->module.".".strtolower(Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]]).'placeholder','size'=>$size));
		
		$index = 2;
		$this->FieldsIndex[$index] = array( 'field' => Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]],'type' =>'text','name' => strtolower(Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]]).'_txt_', 'label'=>$this->module.'.'.strtolower(Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]]), 'placeholder'=>$this->module.".".strtolower(Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]]).'placeholder','size'=>$size);
		
		$index = 3;
		$this->FieldsIndex[$index] = array( 'field' => Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]],'type' =>'text','name' => strtolower(Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]]).'_txt_', 'label'=>$this->module.'.'.strtolower(Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]]), 'placeholder'=>$this->module.".".strtolower(Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]]).'placeholder','size'=>$size);

		$index = 4;
		$this->FieldsIndex[$index] = array( 'field' => Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]],'type' =>'text','name' => strtolower(Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]]).'_txt_', 'label'=>$this->module.'.'.strtolower(Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]]), 'placeholder'=>$this->module.".".strtolower(Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]]).'placeholder','size'=>$size);

		$index = 5;
		$this->FieldsIndex[$index] = array( 'field' => Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]],'type' =>'text','name' => strtolower(Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]]).'_txt_', 'label'=>$this->module.'.'.strtolower(Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]]), 'placeholder'=>$this->module.".".strtolower(Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]]).'placeholder','size'=>$size);

		$index = 6;
		$this->FieldsIndex[$index] = array( 'field' => Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]],'type' =>'text','name' => strtolower(Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]]).'_txt_', 'label'=>$this->module.'.'.strtolower(Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]]), 'placeholder'=>$this->module.".".strtolower(Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]]).'placeholder','size'=>$size);

		$index = 7;
		$this->FieldsIndex[$index] = array( 'field' => Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]],'type' =>'text','name' => strtolower(Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]]).'_txt_', 'label'=>$this->module.'.'.strtolower(Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]]), 'placeholder'=>$this->module.".".strtolower(Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]]).'placeholder','size'=>$size);

		$index = 8;
		$this->FieldsIndex[$index] = array( 'field' => Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]],'type' =>'text','name' => strtolower(Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]]).'_txt_', 'label'=>$this->module.'.'.strtolower(Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]]), 'placeholder'=>$this->module.".".strtolower(Compra::$FieldsName[Compra::$FieldsOrderIndex[$index]]).'placeholder','size'=>$size);		
		

		$this->getProveedores();
		$this->getProductos();
		$this->getUnidadEmpaque();
	}
    public function indexAction(){	

		$records = Compra::queryAll();

		$object = [
            "records" 					=> 	$records,
			"FieldsIndex"				=>	$this->FieldsIndex,
			"module" 					=> 	$this->module,
			"key"						=> 	$this->key
        ];

        return View::make($this->routeIndex, $object);
    }
	public function addAction(){
		
		// create a new model instance     
////////////////////////////////////////////////////////////
		$xi = 0;
		if(Input::has('index')) {
			$xi = Input::get("index");
		}
/////////////////////////////////////////////////////////////
   		
		$Objnew = new Compra();

		if ($Objnew->isPosted())
        {
				$new = Input::all();				
				// attempt validation
				if ($Objnew->validate($xi,$new,1))//add
				{

						$object  = Compra::create([
							Compra::$FieldsName[Compra::$FieldsOrderCreate['1']]		=> 	Input::get($this->FieldsCreate['1']['name']."0"),
							Compra::$FieldsName[Compra::$FieldsOrderCreate['2']]		=> 	Input::get($this->FieldsCreate['2']['name'].$xi),
							Compra::$FieldsName[Compra::$FieldsOrderCreate['3']]		=> 	Input::get($this->FieldsCreate['3']['name'].$xi),
							Compra::$FieldsName[Compra::$FieldsOrderCreate['4']]		=> 	Input::get($this->FieldsCreate['4']['name'].$xi),
							Compra::$FieldsName[Compra::$FieldsOrderCreate['5']]		=> 	Input::get($this->FieldsCreate['5']['name'].$xi),
							Compra::$FieldsName[Compra::$FieldsOrderCreate['6']]		=> 	Input::get($this->FieldsCreate['6']['name'].$xi),
							Compra::$FieldsName[Compra::$FieldsOrderCreate['7']]		=> 	Input::get($this->FieldsCreate['7']['name']."0")
							
							
						]);	
					return Response::json(['success' => true,'iddelrow'=>Input::get('index')]);
				}
				else
				{
					$this->errors = $Objnew->errors();
					$this->addrow = $this->addrowAction();
					return Response::json(['success'=>false, 'error' => $this->errors->toArray()]);		
				}				
		}
		
		$this->addrow = $this->addrowAction();
		
		$object;
		$xi=0;
        return View::make($this->routeAdd, [

			"row"								=> 	$this->addrow,
			"FieldsCreate"					=> 	$this->FieldsCreate,
			"module" 							=> 	$this->module,	
			"key"								=> 	$this->key
        ]);

		
    }
	public function editAction(){

        $keyValue    = Input::get($this->key);
		
        $object = Compra::findOrFail($keyValue);
        $url   = URL::full();
		$FieldsnameHelper = Compra::$FieldsName;
		
	if ($form->isPosted())
        {
			$xi = 0;
            if ($form->isValidForEdit($xi))
            {
				$object->$FieldsnameHelper[Compra::$FieldsOrderCreate['1']] 		= 	Input::get($this->FieldsEdit['1']['name']."0");
				$object->$FieldsnameHelper[Compra::$FieldsOrderCreate['2']] 		= 	Input::get($this->FieldsEdit['2']['name'].$xi);
				$object->$FieldsnameHelper[Compra::$FieldsOrderCreate['3']]		= 	Input::get($this->FieldsEdit['3']['name'].$xi);
				$object->$FieldsnameHelper[Compra::$FieldsOrderCreate['4']] 		= 	Input::get($this->FieldsEdit['4']['name'].$xi);
				$object->$FieldsnameHelper[Compra::$FieldsOrderCreate['5']] 		= 	Input::get($this->FieldsEdit['5']['name'].$xi);
				$object->$FieldsnameHelper[Compra::$FieldsOrderCreate['6']] 		= 	Input::get($this->FieldsEdit['6']['name'].$xi);
				$object->$FieldsnameHelper[Compra::$FieldsOrderCreate['7']] 		= 	Input::get($this->FieldsEdit['7']['name']."0");
			
				$object->save();

                return Redirect::route($this->routeIndex);
			}

            return Redirect::to($url)->withInput([
                "key"   		=> 	Input::get($this->key),
				"object"     => 	$object,
                "errors" 	=> 	$form->getErrors(),
                "url"    		=> 	$url
            ]);
        }

        return View::make($this->routeEdit, [

            "object"     						=> 	$object,
			"FieldsEdit"						=>	$this->FieldsEdit,
            "module" 							=> 	$this->module,
			"key"								=> 	$this->key,
			"proveedoresCombo" 			=>	$this->proveedoresCombo,
			"productoCombo" 				=>	$this->productoCombo,
			"unidadEmpaqueCombo" 	=>	$this->unidadEmpaqueCombo
        ]);	
	}
	public function deleteAction(){
        $Objdel = new Compra();
		$new = Input::all();
		
		if ($Objdel->validate(Input::get($this->key),$new,3))//delete
        {
            $object = Compra::findOrFail(Input::get($this->key));
            $object->delete();
        }

        return Redirect::route($this->routeIndex);
    } 
	private function getProveedores(){
	
		$records = DB::select('SELECT  `ID` ,  `NOMBRE` FROM  `inv_proveedor`');
		
		foreach($records as $proveedor ){
			$Combo[$proveedor->ID] = $proveedor->NOMBRE;
		}
		$this->proveedoresCombo = $Combo;
				
	}
	private function getProductos(){
	
		$records = DB::select('SELECT `ID_VENTA`,`NOMBRE_PRODUCTO` FROM `inv_producto`');
		//die(var_dump($records));
		foreach($records as $producto ){
			$Combo[$producto->ID_VENTA] = $producto->NOMBRE_PRODUCTO;
		}
		$this->productoCombo = $Combo;
				
	}
	private function getUnidadEmpaque(){
	
		$records = DB::select('SELECT  `ID` ,  `UNIDAD_EMPAQUE` FROM  `aux_unidadempaque`');
		
		foreach($records as $unidadEmpaque ){
			$Combo[$unidadEmpaque->ID] = $unidadEmpaque->UNIDAD_EMPAQUE;
		}
		$this->unidadEmpaqueCombo = $Combo;
				
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
		$field7 = $this->FieldsCreate['7'];//hidden

		$addrow = 	"<tr id='tr_".$linenumber."'>";

		$addrow .=	Form::columnAdd([
								"type"				=>	$field2['type'],
								"name"        		=> 	$field2['name'].$linenumber,
								"id"        			=> 	$field2['id'].$linenumber,//
								"placeholder" 	=> 	trans($field2['placeholder']),
								"size"				=> 	$field2['size'],
								"routes"			=> 	$this->proveedoresCombo		
						
							]);
		$addrow .=	Form::columnAdd([
								"type"				=>	$field3['type'],
								"name"        		=> 	$field3['name'].$linenumber,
								"id"        			=> 	$field3['id'].$linenumber,//
								"placeholder" 	=> 	trans($field3['placeholder']),
								"size"				=> 	$field3['size'],
								"routes"			=> 	$this->productoCombo			
								
							]);	
		$addrow .=	Form::columnAdd([
								"type"				=>	$field4['type'],
								"name"        		=> 	$field4['name'].$linenumber,
								"id"        			=> 	$field4['id'].$linenumber,//
								"placeholder" 	=> 	trans($field4['placeholder']),
								"size"				=> 	$field4['size']			
							]);	
		$addrow .=	Form::columnAdd([
								"type"				=>	$field5['type'],
								"name"        		=> 	$field5['name'].$linenumber,
								"id"        			=> 	$field5['id'].$linenumber,//
								"placeholder" 	=> 	trans($field5['placeholder']),
								"size"				=> 	$field5['size'],		
								"routes"			=> 	$this->unidadEmpaqueCombo							
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
