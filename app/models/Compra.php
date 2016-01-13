<?php
//FALTA HACER LA MIGRACION
class Compra extends Eloquent
{
    protected $table = "tra_compra";   
	protected $primaryKey = "ID";

    protected $guarded = [
        "ID"
    ];
	
	public static $FieldsName = array('1' => 'ID','2' => 'NUMERO_FACTURA', '3' => 'ID_PROVEEDOR', '4' => 'NOMBRE_PROVEEDOR','5' => 'ID_PRODUCTO','6' => 'NOMBRE_PRODUCTO','7' => 'CANTIDAD','8' => 'ID_UNIDAD_EMPAQUE','9' => 'UNIDAD_EMPAQUE','10' => 'PRECIO_TOTAL','11' => 'PRECIO_UNITARIO','12' => 'FECHA_COMPRA','13' => 'created_at');
		
		
	public static $FieldsOrderCreate = array(	'1'=>'2',
																'2'=>'3', //select
																'3'=>'5', //select
																'4'=>'7',
																'5'=>'8', //select
																'6'=>'10',
																'7'=>'12'
														);
	public static $FieldsOrderEdit = array(		'1'=>'2',
																'2'=>'3',
																'3'=>'5',
																'4'=>'7',
																'5'=>'8',
																'6'=>'10',
																'7'=>'12'
														);
														
	public static $FieldsOrderIndex = array(		'1'=>'2',
																'2'=>'4',
																'3'=>'6',
																'4'=>'7',
																'5'=>'9',
																'6'=>'10',
																'7'=>'11',
																'8'=>'12'
														);

	public static function queryAll(){
		 $results = DB::select('SELECT `TC`.`ID`,`TC`.`NUMERO_FACTURA`,`TC`.`CANTIDAD`,`TC`.`PRECIO_TOTAL`,`TC`.`PRECIO_UNITARIO`,`TC`.`created_at`, `TC`.`FECHA_COMPRA`,`IPROD`.`NOMBRE_PRODUCTO`,`IPROV`.`NOMBRE` AS NOMBRE_PROVEEDOR,`AUE`.`UNIDAD_EMPAQUE`  from (`tra_compra` `TC` join `inv_producto` `IPROD` on((`TC`.`ID_PRODUCTO` = `IPROD`.`ID_VENTA`)) join `inv_proveedor` `IPROV` on((`TC`.`ID_PROVEEDOR` = `IPROV`.`ID`)) join `aux_unidadempaque` `AUE` on((`TC`.`ID_UNIDAD_EMPAQUE` = `AUE`.`ID`)))');
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
				'field1_txt_0' 					=>	"required",
				'field2_txt_'.$i					=>	"required",//"|numeric",
				'field3_txt_'.$i					=>	"required",//"|numeric",
				'field4_txt_'.$i					=>	"required",//"|numeric",
				'field5_txt_'.$i					=>	"required",//"|numeric",
				'field6_txt_'.$i					=>	"required",//"|numeric",
				'field7_txt_0'					=>	"required",//"|numeric",

			);
		}
    private function rulesEdit ($i){
			return array(
				'field1_txt_0' 					=>	"required",
				'field2_txt_'.$i					=>	"required",//"|numeric",
				'field3_txt_'.$i					=>	"required",//"|numeric",
				'field4_txt_'.$i					=>	"required",//"|numeric",
				'field5_txt_'.$i					=>	"required",//"|numeric",
				'field6_txt_'.$i					=>	"required",//"|numeric",
				'field7_txt_0'					=>	"required",//"|numeric",

			);
	}
    private function rulesDelete ($i){
			return array(
				"ID" => "exists:".$this->table.",ID"
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