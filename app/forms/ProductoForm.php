<?php

class ProductoForm
extends BaseForm
{
	private $table = "inv_producto";
	
	//Array con las propiedades de los campos para la creacion. Route: /add
	private $FieldsAdd;
	//Array con las propiedades de los campos para la edicion. Route: /edit 
	private $FieldsEdit;
	//Array con las propiedades de los campos para el index. Route: /
	private $FieldsIndex;	
	//modulo del objeto producto
	private $module;
	
	public function __construct($FieldsName,$FieldsOrderIndex,$FieldsOrderCreate, $module){
	
		$this->setFieldsIndex($FieldsName, $FieldsOrderIndex);
		$this->setFieldsAdd($FieldsName, $FieldsOrderCreate);		
		$this->module = $module;
		
	}
	public function getFieldsAdd(){
		return $this->FieldsAdd;
	}
	private function setFieldsAdd($FieldsName, $FieldsOrderCreate){
		//[field, type,name,id]
		//field
		//type: text, select, etc. Usado en las macros para crear el elemento HTML correspondiente
		//name: Atributo HTML name
		//id: Atributo HTML id
		//label: Information to create the label
		//placeholder: placeholder variable - llama al archivo lang correspondiente
		//size: Tamano asignado para diseno responsive
		
		$size = 1;	
		$indexAdd = 1;
		
		//Nombre de cada campo
		$fieldname = $FieldsName[$FieldsOrderCreate[$indexAdd]];
		$this->FieldsAdd =  array($indexAdd	=>	array( 
			'field' => $fieldname,
			'type' =>'text',
			'name' => 'field'.$indexAdd.'_',
			'id' => 'field'.$indexAdd.'_' ,
			'label'=>$this->module.'.'.strtolower($fieldname),
			'placeholder'=>$this->module.".".strtolower($fieldname).'placeholder',
			'size'=>$size)
		);
		
		$indexAdd = 2;
		//Nombre de cada campo
		$fieldname = $FieldsName[$FieldsOrderCreate[$indexAdd]];
		$this->FieldsAdd[$indexAdd] = array( 
			'field' => $fieldname,
			'type' =>'text',
			'name' => 'field'.$indexAdd.'_',
			'id' => 'field'.$indexAdd.'_' ,
			'label'=>$this->module.'.'.strtolower($fieldname),
			'placeholder'=>$this->module.".".strtolower($fieldname).'placeholder',
			'size'=>$size
		);
		
		$indexAdd = 3;
		//Nombre de cada campo
		$fieldname = $FieldsName[$FieldsOrderCreate[$indexAdd]];
		$this->FieldsAdd[$indexAdd] = array(
			'field' => $fieldname,
			'type' =>'text',
			'name' => 'field'.$indexAdd.'_',
			'id' => 'field'.$indexAdd.'_' ,
			'label'=>$this->module.'.'.strtolower($fieldname),
			'placeholder'=>$this->module.".".strtolower($fieldname).'placeholder',
			'size'=>$size
		);
		
		$indexAdd = 4;
		//Nombre de cada campo
		$fieldname = $FieldsName[$FieldsOrderCreate[$indexAdd]];
		$this->FieldsAdd[$indexAdd] = array(
			'field' => $fieldname,
			'type' =>'select',
			'name' => 'field'.$indexAdd.'_',
			'id' => 'field'.$indexAdd.'_' ,
			'label'=>$this->module.'.'.strtolower($fieldname),
			'placeholder'=>$this->module.".".strtolower($fieldname).'placeholder',
			'size'=>'1','sizend'=>$size
		);
		
		$indexAdd = 5;
		//Nombre de cada campo
		$fieldname = $FieldsName[$FieldsOrderCreate[$indexAdd]];
		$this->FieldsAdd[$indexAdd] = array(
			'field' => $fieldname,
			'type' =>'text',
			'name' => 'field'.$indexAdd.'_', 
			'id' => 'field'.$indexAdd.'_' , 
			'label'=>$this->module.'.'.strtolower($fieldname),
			'placeholder'=>$this->module.".".strtolower($fieldname).'placeholder'
			,'size'=>$size
		);
		
		$indexAdd = 6;
		//Nombre de cada campo
		$fieldname = $FieldsName[$FieldsOrderCreate[$indexAdd]];
		$this->FieldsAdd[$indexAdd] = array(
			'field' => $fieldname,
			'type' =>'checkbox',
			'name' => 'field'.$indexAdd.'_',
			'id' => 'field'.$indexAdd.'_' ,
			'label'=>$this->module.'.'.strtolower($fieldname),
			'placeholder'=>$this->module.".".strtolower($fieldname).'placeholder',
			'size'=>$size
		);
	}
	public function getFieldsIndex(){
		return $this->FieldsIndex;
	}	
	private function setFieldsIndex($FieldsName, $FieldsOrderIndex){
		//[field, type,name,id]
		//field
		//type: text, select, etc. Usado en las macros para crear el elemento HTML correspondiente
		//name: Atributo HTML name
		//id: Atributo HTML id
		//label: Information to create the label
		//placeholder: placeholder variable - llama al archivo lang correspondiente
		//size: Tamano asignado para diseno responsive
		
		$size = 1;	
		$indexIndex = 1;
		$fieldname = $FieldsName[$FieldsOrderIndex[$indexIndex]];
		$this->FieldsIndex =  array( 
			$indexIndex	=>	array( 'field' => $fieldname,
			'type' =>'text','name' => strtolower($fieldname).'_',
			'label'=>$this->module.'.'.strtolower($fieldname),
			'placeholder'=>$this->module.".".strtolower($fieldname).'placeholder',
			'size'=>$size)
		);
		
		$indexIndex = 2;
		$fieldname = $FieldsName[$FieldsOrderIndex[$indexIndex]];
		$this->FieldsIndex[$indexIndex] = array(
			'field' => $fieldname,
			'type' =>'text',
			'name' => strtolower($fieldname).'_',
			'label'=>$this->module.'.'.strtolower($fieldname),
			'placeholder'=>$this->module.".".strtolower($fieldname).'placeholder',
			'size'=>$size
		);
		
		$indexIndex = 3;
		$fieldname = $FieldsName[$FieldsOrderIndex[$indexIndex]];
		$this->FieldsIndex[$indexIndex] = array(
			'field' => $fieldname,
			'type' =>'text',
			'name' => strtolower($fieldname).'_',
			'label'=>$this->module.'.'.strtolower($fieldname),
			'placeholder'=>$this->module.".".strtolower($fieldname).'placeholder',
			'size'=>$size
		);

		$indexIndex = 4;
		$fieldname = $FieldsName[$FieldsOrderIndex[$indexIndex]];
		$this->FieldsIndex[$indexIndex] = array(
			'field' => $fieldname,
			'type' =>'text',
			'name' => strtolower($fieldname).'_',
			'label'=>$this->module.'.'.strtolower($fieldname),
			'placeholder'=>$this->module.".".strtolower($fieldname).'placeholder',
			'size'=>$size
		);

		$indexIndex = 5;
		$fieldname = $FieldsName[$FieldsOrderIndex[$indexIndex]];
		$this->FieldsIndex[$indexIndex] = array(
			'field' => $fieldname,
			'type' =>'text',
			'name' => strtolower($fieldname).'_',
			'label'=>$this->module.'.'.strtolower($fieldname),
			'placeholder'=>$this->module.".".strtolower($fieldname).'placeholder',
			'size'=>$size
		);

		$indexIndex = 6;
		$fieldname = $FieldsName[$FieldsOrderIndex[$indexIndex]];		
		$this->FieldsIndex[$indexIndex] = array(
			'field' => $fieldname,
			'type' =>'checkbox',
			'name' => strtolower($fieldname).'_',
			'label'=>$this->module.'.'.strtolower($fieldname),
			'size'=>$size
		);
	}
		
	public function isPosted(){
        return Input::server("REQUEST_METHOD") == "POST";
    }
	private function rulesAdd ($i){
		die($this->FieldsAdd[1]['name'].$i);
		return array( 
			
			$this->FieldsAdd[1]['name'].$i	=>	"required",//"|numeric",
			$this->FieldsAdd[2]['name'].$i	=>	"required",//"|numeric",
			$this->FieldsAdd[3]['name'].$i	=>	"required",//"|numeric",
			$this->FieldsAdd[4]['name'].$i	=>	"required",//"|numeric",
			$this->FieldsAdd[5]['name'].$i	=>	"required",//"|numeric",


		);
	}
    private function rulesEdit ($i){
		return array(

			$this->FieldsEdit[1]['name'].$i	=>	"required",//"|numeric",
			$this->FieldsEdit[2]['name'].$i	=>	"required",//"|numeric",
			$this->FieldsEdit[3]['name'].$i	=>	"required",//"|numeric",
			$this->FieldsEdit[4]['name'].$i	=>	"required",//"|numeric",
			$this->FieldsEdit[5]['name'].$i	=>	"required",//"|numeric",


			);
	}
    private function rulesDelete ($i){
			return array(
				$this->primaryKey =>	"exists:".$this->table.",".$this->primaryKey
			);
	}
	public function validate($irec,$data, $operation) //1 add
    {
        // make a new validator object
		if($operation == 1) {// 1 add
			$validatorObj = Validator::make($data, $this->rulesAdd($irec));
		}else if($operation == 2){// 2 edit
			$validatorObj = Validator::make($data, $this->rulesEdit($irec));
		}else if($operation == 3){// 3 delete
			$validatorObj = Validator::make($data, $this->rulesDelete($irec));
		}
		if ($validatorObj->fails())
        {
            // set errors and return false
            $this->errors = $validatorObj->errors();
            return false;
        }
        // return the result
        return true;

    }
}