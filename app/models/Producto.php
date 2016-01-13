<?php

class Producto extends Eloquent
{
	protected $table = "inv_producto";   
	protected $primaryKey = "ID_INVENTARIO";
	
	public $timestamps = false;
    protected $guarded = [
        "ID_INVENTARIO"
    ];

	public static $FieldsName = array('1' => 'ID_INVENTARIO', '2' => 'ID_VENTA', '3' => 'ID_PRODUCTO', '4' => 'ID_RUTA','5' => 'RUTA','6' => 'NOMBRE_PRODUCTO','7' => 'DISPONIBLE');
		
		
	public static $FieldsOrderCreate = array(	'1'=>'1',
																'2'=>'2',
																'3'=>'3',
																'4'=>'4',
																'5'=>'6', 
																'6'=>'7'
														);
	public static $FieldsOrderEdit = array(		'1'=>'1',
																'2'=>'2',
																'3'=>'3',
																'4'=>'4',
																'5'=>'6', 
																'6'=>'7'
														);
														
	public static $FieldsOrderIndex = array(	'1'=>'1',
																'2'=>'2',
																'3'=>'3',
																'4'=>'5',
																'5'=>'6', 
																'6'=>'7'
														);

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
	public function errors()
    {
        return $this->errors;
    }
	public function isPosted()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }
	private function rulesAdd ($i){
			return array( 

				'field2_txt_'.$i					=>	"required",//"|numeric",
				'field3_txt_'.$i					=>	"required",//"|numeric",
				'field4_txt_'.$i					=>	"required",//"|numeric",
				'field5_txt_'.$i					=>	"required",//"|numeric",
				'field6_txt_'.$i					=>	"required",//"|numeric",


			);
		}
    private function rulesEdit ($i){
			return array(

				'field2_txt_'.$i					=>	"required",//"|numeric",
				'field3_txt_'.$i					=>	"required",//"|numeric",
				'field4_txt_'.$i					=>	"required",//"|numeric",
				'field5_txt_'.$i					=>	"required",//"|numeric",
				'field6_txt_'.$i					=>	"required",//"|numeric",


			);
	}
    private function rulesDelete ($i){
			return array(
				"ID_INVENTARIO" => "exists:".$this->table.",ID_INVENTARIO"
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

 