<?php

use Illuminate\Support\MessageBag;

class StockController extends Controller
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

	private $addrow;
	
	private $errors;	

	private $productoCombo;

	
	public function __construct(){

		$this->module 			= "stock";
		$this->routeIndex 		= $this->module."/index";	
		$this->routeAdd 		= $this->module."/add";
		$this->routeEdit 		= $this->module."/edit";
		
		$this->key = "ID"; //cambiar por lista de campos
		

		$size = 1;
		
		$indexCreate = 1;
		$this->FieldsCreate =  array( $indexCreate	=>	array( 'field' => Stock::$FieldsName[Stock::$FieldsOrderCreate[$indexCreate]],'type' =>'select','name' => 'field'.$indexCreate.'_txt_', 'id' => 'field'.$indexCreate.'_txt_' ,'label'=>$this->module.'.'.strtolower(Stock::$FieldsName[Stock::$FieldsOrderCreate[$indexCreate]]), 'placeholder'=>$this->module.".".strtolower(Stock::$FieldsName[Stock::$FieldsOrderCreate[$indexCreate]]).'placeholder','size'=>$size,'sizend'=>$size));
		$indexCreate = 2;
		$this->FieldsCreate[$indexCreate] = array( 'field' => Stock::$FieldsName[Stock::$FieldsOrderCreate[$indexCreate]],'type' =>'text','name' => 'field'.$indexCreate.'_txt_', 'id' => 'field'.$indexCreate.'_txt_' , 'label'=>$this->module.'.'.strtolower(Stock::$FieldsName[Stock::$FieldsOrderCreate[$indexCreate]]), 'placeholder'=>$this->module.".".strtolower(Stock::$FieldsName[Stock::$FieldsOrderCreate[$indexCreate]]).'placeholder','size'=>$size);
		$indexCreate = 3;
		$this->FieldsCreate[$indexCreate] = array( 'field' => Stock::$FieldsName[Stock::$FieldsOrderCreate[$indexCreate]],'type' =>'text','name' => 'field'.$indexCreate.'_txt_', 'id' => 'field'.$indexCreate.'_txt_' , 'label'=>$this->module.'.'.strtolower(Stock::$FieldsName[Stock::$FieldsOrderCreate[$indexCreate]]), 'placeholder'=>$this->module.".".strtolower(Stock::$FieldsName[Stock::$FieldsOrderCreate[$indexCreate]]).'placeholder','size'=>$size);


		$size = 1;
		
		$indexEdit = 1;
		$this->FieldsEdit =  array( $indexEdit	=>	array( 'field' => Stock::$FieldsName[Stock::$FieldsOrderCreate[$indexEdit]],'type' =>'select','name' => 'field'.$indexEdit.'_txt_', 'id' => 'field'.$indexEdit.'_txt_' ,'label'=>$this->module.'.'.strtolower(Stock::$FieldsName[Stock::$FieldsOrderCreate[$indexEdit]]), 'placeholder'=>$this->module.".".strtolower(Stock::$FieldsName[Stock::$FieldsOrderCreate[$indexEdit]]).'placeholder','size'=>$size,'sizend'=>$size));
		$indexEdit = 2;
		$this->FieldsEdit[$indexEdit] = array( 'field' => Stock::$FieldsName[Stock::$FieldsOrderCreate[$indexEdit]],'type' =>'text','name' => 'field'.$indexEdit.'_txt_', 'id' => 'field'.$indexEdit.'_txt_' , 'label'=>$this->module.'.'.strtolower(Stock::$FieldsName[Stock::$FieldsOrderCreate[$indexEdit]]), 'placeholder'=>$this->module.".".strtolower(Stock::$FieldsName[Stock::$FieldsOrderCreate[$indexEdit]]).'placeholder','size'=>$size);
		$indexEdit = 3;
		$this->FieldsEdit[$indexEdit] = array( 'field' => Stock::$FieldsName[Stock::$FieldsOrderCreate[$indexEdit]],'type' =>'text','name' => 'field'.$indexEdit.'_txt_', 'id' => 'field'.$indexEdit.'_txt_' , 'label'=>$this->module.'.'.strtolower(Stock::$FieldsName[Stock::$FieldsOrderCreate[$indexEdit]]), 'placeholder'=>$this->module.".".strtolower(Stock::$FieldsName[Stock::$FieldsOrderCreate[$indexEdit]]).'placeholder','size'=>$size);
		
		$size = 1;
		

		$index = 0;
		$this->FieldsIndex =  array( ++$index			=>	array( 'field' => Stock::$FieldsName[Stock::$FieldsOrderIndex[$index]],'type' =>'text','name' => strtolower(Stock::$FieldsName[Stock::$FieldsOrderIndex[$index]]).'_txt_', 'label'=>$this->module.'.'.strtolower(Stock::$FieldsName[Stock::$FieldsOrderIndex[$index]]), 'placeholder'=>$this->module.".".strtolower(Stock::$FieldsName[Stock::$FieldsOrderIndex[$index]]).'placeholder','size'=>$size));
		//$ind = 3;
		$this->FieldsIndex[++$index] = array( 'field' => Stock::$FieldsName[Stock::$FieldsOrderIndex[$index]],'type' =>'text','name' => strtolower(Stock::$FieldsName[Stock::$FieldsOrderIndex[$index]]).'_txt_', 'label'=>$this->module.'.'.strtolower(Stock::$FieldsName[Stock::$FieldsOrderIndex[$index]]), 'placeholder'=>$this->module.".".strtolower(Stock::$FieldsName[Stock::$FieldsOrderIndex[$index]]).'placeholder','size'=>$size);
		//$ind = 5;
		$this->FieldsIndex[++$index] = array( 'field' => Stock::$FieldsName[Stock::$FieldsOrderIndex[$index]],'type' =>'text','name' => strtolower(Stock::$FieldsName[Stock::$FieldsOrderIndex[$index]]).'_txt_', 'label'=>$this->module.'.'.strtolower(Stock::$FieldsName[Stock::$FieldsOrderIndex[$index]]), 'placeholder'=>$this->module.".".strtolower(Stock::$FieldsName[Stock::$FieldsOrderIndex[$index]]).'placeholder','size'=>$size);
		//$ind = 6;
		$this->FieldsIndex[++$index] = array( 'field' => Stock::$FieldsName[Stock::$FieldsOrderIndex[$index]],'type' =>'text','name' => strtolower(Stock::$FieldsName[Stock::$FieldsOrderIndex[$index]]).'_txt_', 'label'=>$this->module.'.'.strtolower(Stock::$FieldsName[Stock::$FieldsOrderIndex[$index]]), 'placeholder'=>$this->module.".".strtolower(Stock::$FieldsName[Stock::$FieldsOrderIndex[$index]]).'placeholder','size'=>$size);
		//$ind = 7;
		$this->FieldsIndex[++$index] = array( 'field' => Stock::$FieldsName[Stock::$FieldsOrderIndex[$index]],'type' =>'text','name' => strtolower(Stock::$FieldsName[Stock::$FieldsOrderIndex[$index]]).'_txt_', 'label'=>$this->module.'.'.strtolower(Stock::$FieldsName[Stock::$FieldsOrderIndex[$index]]), 'placeholder'=>$this->module.".".strtolower(Stock::$FieldsName[Stock::$FieldsOrderIndex[$index]]).'placeholder','size'=>$size);


		$this->getProductos();

	}

    public function indexAction(){	

		$records = Stock::queryAll();

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
   		
		$stockObjnew = new Stock();

		if ($stockObjnew->isPosted())
        {
				$new = Input::all();

				
				// attempt validation
				if ($stockObjnew->validate($xi,$new,1))//add
				{

						$object  = Stock::create([
							Stock::$FieldsName[Stock::$FieldsOrderCreate['1']]		=> 	Input::get($this->FieldsCreate['1']['name'].$xi),
							Stock::$FieldsName[Stock::$FieldsOrderCreate['2']]		=> 	Input::get($this->FieldsCreate['2']['name'].$xi),
							Stock::$FieldsName[Stock::$FieldsOrderCreate['3']]		=> 	Input::get($this->FieldsCreate['3']['name'].$xi)
							
						]);	
					return Response::json(['success' => true,'iddelrow'=>Input::get('index')]);
				}
				else
				{
					$this->errors = $stockObjnew->errors();
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
			"productoCombo" 				=> 	$this->productoCombo,		
			"key"								=> 	$this->key
        ]);
    }
	public function editAction(){
		$form  = new StockForm();

        $keyValue    = Input::get($this->key);
		
        $object = Stock::findOrFail($keyValue);
        $url   = URL::full();
		$FieldsnameHelper =  Stock::$FieldsName;
		
	if ($form->isPosted())
        {
			$xi = 0;
            if ($form->isValidForEdit($xi))
            {
				$object->$FieldsnameHelper['1'] 		= 	Input::get($this->FieldsEdit['1']['name'].$xi);
				$object->$FieldsnameHelper['3'] 		= 	Input::get($this->FieldsEdit['3']['name'].$xi);
				$object->$FieldsnameHelper['5']		= 	Input::get($this->FieldsEdit['5']['name'].$xi);
				$object->$FieldsnameHelper['6'] 		= 	Input::get($this->FieldsEdit['6']['name'].$xi);
				$object->$FieldsnameHelper['7'] 		= 	Input::get($this->FieldsEdit['7']['name'].$xi);
			
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

            "form"      							=> 	$form,
            "object"     						=> 	$object,
			"FieldsEdit"						=>	$this->FieldsEdit,
            "module" 							=> 	$this->module,
			"key"								=> 	$this->key,
			"productoCombo" 				=>	$this->productoCombo
        ]);	
	}
	public function deleteAction(){
		
        $stockObjnew = new Stock();
		$new = Input::all();
		
		if ($stockObjnew->validate(Input::get($this->key),$new,3))//add
        {
            $object = Stock::findOrFail(Input::get($this->key));
            $object->delete();
        }

        return Redirect::route($this->routeIndex);
    } 
	private function getProductos(){
	
		$records = DB::select('SELECT `ID_VENTA`,`NOMBRE_PRODUCTO` FROM `inv_producto`');
		//die(var_dump($records));
		foreach($records as $producto ){
			$Combo[$producto->ID_VENTA] = $producto->NOMBRE_PRODUCTO;
		}
		$this->productoCombo = $Combo;
				
	}
	public function addrowAction(){
		
		$linenumber = "0";
		if(Input::has('linenumber')) {
			$linenumber = Input::get("linenumber");
		}
		

		$field1 = $this->FieldsCreate['1'];
		$field2 = $this->FieldsCreate['2'];
		$field3 = $this->FieldsCreate['3'];


		$addrow = 	"<tr id='tr_".$linenumber."'>";
		$addrow .= 	Form::columnAdd([
								"type"				=>	$field1['type'],
								"name"        		=> 	$field1['name'].$linenumber,
								"id"        			=> 	$field1['id'].$linenumber,
								"fail"        			=> 	$this->errors,
								"placeholder" 	=> 	trans($field1['placeholder']),
								"size"				=> 	$field1['size'],
								"routes"			=> 	$this->productoCombo	
							]);
		$addrow .=	Form::columnAdd([
								"type"				=>	$field2['type'],
								"name"        		=> 	$field2['name'].$linenumber,
								"id"        			=> 	$field2['id'].$linenumber,
								"fail"        			=> 	$this->errors,
								"placeholder" 	=> 	trans($field2['placeholder']),
								"size"				=> 	$field2['size']											
							]);
		$addrow .=	Form::columnAdd([
								"type"				=>	$field3['type'],
								"name"        		=> 	$field3['name'].$linenumber,
								"id"        			=> 	$field3['id'].$linenumber,
								"fail"        			=> 	$this->errors,
								"placeholder" 	=> 	trans($field3['placeholder']),
								"size"				=> 	$field3['size']				
								
							]);	


						
		$addrow .=	 "</tr>";

	return $addrow;
    } 
}
