<?php

class Producto extends Eloquent
{
	//tabla del modelo de datos
	protected $table = "inv_producto"; 
	//Primary key
	protected $primaryKey = "ID_INVENTARIO";
	
	public $timestamps = false;
    
	//No se puede cambiar por update o add, el campo lo genera automaticamente la base de datos.	
	protected $guarded = [
        "ID_INVENTARIO"
    ];
	//Nombre de todos los campos
	private $FieldsName;
	//Modelo  - campos que aparecen en el formulario de creacion Route: /add	
	private $FieldsOrderAdd;
	//Modelo  - campos que aparecen en el formulario de edicion Route: /edit	
	private $FieldsOrderEdit;	
	//Modelo  - campos que aparecen en el index /															
	private $FieldsOrderIndex;

	//Formulario
	private $Form;
	
	//modulo del objeto producto
	private $module;
	
	
	//Query para mostrar todos los datos en el indice
	public static function queryAll(){
		 $results = DB::select('SELECT `ID_INVENTARIO`, `ID_VENTA`, (SELECT CONCAT(DCLINEA.VALOR,\' / \',DCLASE.VALOR)
																				FROM `inv_codigo_clasificacion` CC
																				INNER JOIN `inv_detalle_codigo_clasificacion` DCLASE
																				ON CC.ID_CLASE = DCLASE.ID
																				INNER JOIN `inv_detalle_codigo_clasificacion` DCLINEA
																				ON CC.ID_LINEA = DCLINEA.ID
																				WHERE CC.ID=PROD.ID_RUTA) AS RUTA,  `NOMBRE_PRODUCTO`, `DISPONIBLE` 
										FROM `inv_producto` PROD');
		return  $results;
	}
	
	public function __construct(){
		
		$this->FieldsName = array(			
			'1' => 'ID_INVENTARIO',
			'2' => 'ID_VENTA', 
			'3' => 'ID_PRODUCTO',
			'4' => 'ID_RUTA',
			'5' => 'RUTA',
			'6' => 'NOMBRE_PRODUCTO',
			'7' => 'DISPONIBLE'
		);
		$this->FieldsOrderAdd = array(		
			'1'=>'1',
			'2'=>'2',
			'3'=>'3',
			'4'=>'4',
			'5'=>'6', 
			'6'=>'7'
		);
		$this->FieldsOrderEdit = array(
			'1'=>'1',
			'2'=>'2',
			'3'=>'3',
			'4'=>'4',
			'5'=>'6', 
			'6'=>'7'
		);
		$this->FieldsOrderIndex = array(
			'1'=>'1',
			'2'=>'2',
			'3'=>'3',
			'4'=>'5',
			'5'=>'6', 
			'6'=>'7'
		);
		
		$this->module = "producto";

		$this->Form = new ProductoForm($this->FieldsName,$this->FieldsOrderIndex,$this->FieldsOrderAdd,$this->module);

	}
	
	//getters
	public function getTable()
    {
        return $this->table;
    }	
	public function getPrimaryKey()
    {
        return $this->primaryKey;
    }
	public function getErrors()
    {
        return $this->errors;
    }	
	public function getFieldsName()
    {
        return $this->FieldsName;
    }
	public function getFieldsOrderAdd()
    {
        return $this->FieldsOrderAdd;
    }
	public function getFieldsOrderEdit()
    {
        return $this->FieldsOrderEdit;
    }
	public function getFieldsOrderIndex(){
        return $this->FieldsOrderIndex;
		}
	
	public function getFieldsAdd(){
		return $this->Form->getFieldsAdd();
	}
	public function getFieldsIndex(){
		return $this->Form->getFieldsIndex();
	}
	public function getModule(){
		return $this->module;
	}
	//Metodos del formulario
	public function validate($irec,$data, $operation){
		die("validate");
		$this->Form->validate($irec,$data, $operation);
	}
	public function isPosted(){
		$this->Form->isPosted();
	}
	
	
	/*public function isPosted()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }
	private function rulesAdd ($i){
		
		return array( 

			'field2_txt_'.$i	=>	"required",//"|numeric",
			'field3_txt_'.$i	=>	"required",//"|numeric",
			'field4_txt_'.$i	=>	"required",//"|numeric",
			'field5_txt_'.$i	=>	"required",//"|numeric",
			'field6_txt_'.$i	=>	"required",//"|numeric",


		);
	}
    private function rulesEdit ($i){
			return array(

				'field2_txt_'.$i	=>	"required",//"|numeric",
				'field3_txt_'.$i	=>	"required",//"|numeric",
				'field4_txt_'.$i	=>	"required",//"|numeric",
				'field5_txt_'.$i	=>	"required",//"|numeric",
				'field6_txt_'.$i	=>	"required",//"|numeric",


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

    }*/
}

 