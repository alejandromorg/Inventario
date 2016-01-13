<?php

use Illuminate\Support\MessageBag;

class ProveedorController extends Controller
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
	
	public function __construct()
    {
		$this->FieldsName = array('1' => 'NOMBRE', '2' => 'RANKING', '3' => 'DESCRIPCION','4' => 'DISPONIBLE');
		
		$this->module 			= "proveedor";
		$this->routeIndex 		= $this->module."/index";	
		$this->routeAdd 		= $this->module."/add";
		$this->routeEdit 		= $this->module."/edit";
		
		$this->key = "ID";		
		
		
		$this->FieldsCreate =  array(
			'1'				=>	array( 'field' => $this->FieldsName['1'],'type' =>'text','name' => strtolower($this->FieldsName['1']).'_txt_', 'label'=>$this->module.'.'.strtolower($this->FieldsName['1']), 'placeholder'=>$this->module.".".strtolower($this->FieldsName['1']).'placeholder','size'=>'4'),
			'2'				=>	array( 'field' => $this->FieldsName['2'],'type' =>'text','name' => strtolower($this->FieldsName['2']).'_txt_', 'label'=>$this->module.'.'.strtolower($this->FieldsName['2']), 'placeholder'=>$this->module.".".strtolower($this->FieldsName['2']).'placeholder','size'=>'1'),
			'3'				=>	array( 'field' => $this->FieldsName['3'],'type' =>'text','name' => strtolower($this->FieldsName['3']).'_txt_', 'label'=>$this->module.'.'.strtolower($this->FieldsName['3']), 'placeholder'=>$this->module.".".strtolower($this->FieldsName['3']).'placeholder','size'=>'5'),
			'4'				=>	array( 'field' => $this->FieldsName['4'],'type' =>'checkbox','name' => strtolower($this->FieldsName['4']).'_txt_', 'label'=>$this->module.'.'.strtolower($this->FieldsName['4']), 'placeholder'=>$this->module.".".strtolower($this->FieldsName['4']).'placeholder','size'=>'1')
		);
		$this->FieldsEdit =  array( 
			'1'				=>	array( 'field' => $this->FieldsName['1'],'type' =>'text','name' => strtolower($this->FieldsName['1']).'_txt_', 'label'=>$this->module.'.'.strtolower($this->FieldsName['1']), 'placeholder'=>$this->module.".".strtolower($this->FieldsName['1']).'placeholder','size'=>'4'),
			'2'				=>	array( 'field' => $this->FieldsName['2'],'type' =>'text','name' => strtolower($this->FieldsName['2']).'_txt_', 'label'=>$this->module.'.'.strtolower($this->FieldsName['2']), 'placeholder'=>$this->module.".".strtolower($this->FieldsName['2']).'placeholder','size'=>'1'),
			'3'				=>	array( 'field' => $this->FieldsName['3'],'type' =>'text','name' => strtolower($this->FieldsName['3']).'_txt_', 'label'=>$this->module.'.'.strtolower($this->FieldsName['3']), 'placeholder'=>$this->module.".".strtolower($this->FieldsName['3']).'placeholder','size'=>'5','sizend'=>'6'),
			'4'				=>	array( 'field' => $this->FieldsName['4'],'type' =>'checkbox','name' => strtolower($this->FieldsName['4']).'_txt_', 'label'=>$this->module.'.'.strtolower($this->FieldsName['4']), 'placeholder'=>$this->module.".".strtolower($this->FieldsName['4']).'placeholder','size'=>'1')
		);
		$this->FieldsIndex =  array(
			'1'				=>	array( 'field' => $this->FieldsName['1'],'type' =>'text','name' => strtolower($this->FieldsName['1']).'_txt_', 'label'=>$this->module.'.'.strtolower($this->FieldsName['1']), 'placeholder'=>$this->module.".".strtolower($this->FieldsName['1']).'placeholder','size'=>'4'),
			'2'				=>	array( 'field' => $this->FieldsName['2'],'type' =>'text','name' => strtolower($this->FieldsName['2']).'_txt_', 'label'=>$this->module.'.'.strtolower($this->FieldsName['2']), 'placeholder'=>$this->module.".".strtolower($this->FieldsName['2']).'placeholder','size'=>'1'),
			'3'				=>	array( 'field' => $this->FieldsName['3'],'type' =>'text','name' => strtolower($this->FieldsName['3']).'_txt_', 'label'=>$this->module.'.'.strtolower($this->FieldsName['3']), 'placeholder'=>$this->module.".".strtolower($this->FieldsName['3']).'placeholder','size'=>'5','sizend'=>'6'),
			'4'				=>	array( 'field' => $this->FieldsName['4'],'type' =>'checkbox','name' => strtolower($this->FieldsName['4']).'_txt_', 'label'=>$this->module.'.'.strtolower($this->FieldsName['4']), 'placeholder'=>$this->module.".".strtolower($this->FieldsName['4']).'placeholder','size'=>'1')
		);
		
	}
	
    public function indexAction()
    {	

		$records = Proveedor::all();

		$object = [
            "records" 			=> 	$records,
			"FieldsIndex"		=>	$this->FieldsIndex,
			"module" 			=> 	$this->module,
			"key"				=> 	$this->key
        ];
		
        return View::make($this->routeIndex, $object);
    }
	
	public function addAction()
    {
		
		$this->addForm = new ProveedorForm();
		
		$object;
		
		
		if ($this->addForm->isPosted())
        {
			$xi = 0;
			//while($xi<3){
			
				if ($this->addForm->isValidForAdd($xi))
				{			
					
					if(Input::get($this->FieldsCreate['4']['name'].$xi) == true) { //disponible
						$disponiblechk = Input::get($this->FieldsCreate['4']['name'].$xi);
					}else{
						$disponiblechk = false;
					}

					$object = Proveedor::create([
						
						$this->FieldsName['1']		=> 	Input::get($this->FieldsCreate['1']['name'].$xi),
						$this->FieldsName['2']		=> 	Input::get($this->FieldsCreate['2']['name'].$xi),
						$this->FieldsName['3']		=> 	Input::get($this->FieldsCreate['3']['name'].$xi),
						$this->FieldsName['4']		=> 	$disponiblechk
					
					]);
					return Redirect::route($this->routeIndex);
				}else{
						
				}
				
				//$xi++;
			//}
			return Redirect::route($this->routeAdd)->withInput(["errors" => $this->addForm->getErrors()]);
			//return Redirect::route($this->routeAdd)->withInput(Input::all());
			//}
		}
		$this->addrow = $this->addrowAction();
        return View::make($this->routeAdd, [
            "form" 				=> 	$this->addForm,
			"row"				=> 	$this->addrow,
			"FieldsCreate"		=> 	$this->FieldsCreate,
			"module" 			=> 	$this->module,
			"key"				=> 	$this->key
        ]);
    }
	
	public function editAction()
	{
		$form  = new ProveedorForm();

        $keyValue    = Input::get($this->key);
		
        $object = Proveedor::findOrFail($keyValue);
        $url   = URL::full();
		$FieldsnameHelper = $this->FieldsName;
	if ($form->isPosted())
        {
			$i = 0;
            if ($form->isValidForEdit(0))
            {
				$object->$FieldsnameHelper['1'] 	= 	Input::get($this->FieldsEdit['1']['name'].$i);
                $object->$FieldsnameHelper['2'] 	= 	Input::get($this->FieldsEdit['2']['name'].$i);
				$object->$FieldsnameHelper['3'] 	= 	Input::get($this->FieldsEdit['3']['name'].$i);
				$object->$FieldsnameHelper['4'] 	= 	Input::get($this->FieldsEdit['4']['name'].$i);
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
            "form"      			=> 	$form,
            "object"     		=> 	$object,
			"FieldsEdit"		=>	$this->FieldsEdit,
            "module" 			=> 	$this->module,
			"key"				=> 	$this->key
        ]);	
	}

	public function deleteAction()
    {
		try {
			$form = new ProveedorForm();

			if ($form->isValidForDelete())
			{
				$object = Proveedor::findOrFail(Input::get($this->key));
				$object->delete();
			}

			return Redirect::route($this->routeIndex);
		}catch (\Illuminate\Database\QueryException $e){
			//001 Codigo para mostrar error
		}
    } 
	public function addrowAction()
    {
		
		$linenumber = "0";
		if(Input::has('idrow')) {
			$linenumber = Input::get("idrow");
		}
		
		$idrow = Input::get("idrow");
		$field1 = $this->FieldsCreate['1'];
		$field2 = $this->FieldsCreate['2'];
		$field3 = $this->FieldsCreate['3'];
		$field4 = $this->FieldsCreate['4'];
		
		$addrow = 	"<tr>";
		$addrow .= 	Form::columnAdd([
						"type"				=>	$field1['type'],
						"name"        		=> 	$field1['name'].$linenumber,
						"form"        		=> 	$this->addForm,
						"placeholder" 	=> 	trans($field1['placeholder']),
						"size"				=> 	$field1['size'],
						"value"				=>	Input::old($field1['name'].$linenumber)
					]);
		$addrow .=	Form::columnAdd([
						"type"				=>	$field2['type'],
						"name"        		=> 	$field2['name'].$linenumber,
						"form"        		=> 	$this->addForm,
						"placeholder" 	=> 	trans($field2['placeholder']),
						"size"				=> 	$field2['size']				
					]);
		$addrow .=	Form::columnAdd([
						"type"				=>	$field3['type'],
						"name"        		=> 	$field3['name'].$linenumber,
						"form"        		=> 	$this->addForm,
						"placeholder" 	=> 	trans($field3['placeholder']),
						"size"				=> 	$field3['size']							
					]);
		$addrow .=	Form::columnAdd([
						"type"				=>	$field4['type'],
						"name"        		=> 	$field4['name'].$linenumber,
						"form"        		=> 	$this->addForm,
						"placeholder" 	=> 	trans($field4['placeholder']),
						"size"				=> 	$field4['size']			
					]);
						
		$addrow .=	 "</tr>";

	return $addrow;
    } 
}
