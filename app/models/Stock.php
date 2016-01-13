<?php

class Stock extends Eloquent
{
    protected $table = "inv_stock";   
	protected $primaryKey = "ID";
	
	public static $FieldsOrderCreate= array(	'1'=>'1',
																'2'=>'3',
																'3'=>'5',
																'4'=>'6',
																'5'=>'7');
	public static $FieldsOrderIndex = array(	'1'=>'2',
																'2'=>'3',
																'3'=>'5',
																'4'=>'6',
																'5'=>'7');
														
	public static $FieldsName = array('1' => 'ID_PRODUCTO', '2' => 'NOMBRE_PRODUCTO', '3' => 'ID_BODEGA',  '4' => 'NOMBRE_BODEGA', '5' => 'CANTIDAD','6' => 'created_at','7' => 'updated_at');
	

protected $guarded = [
        "ID"
    ];
	
	public function producto() {
        return $this->belongsTo('Producto');
    }


	 private $errors;
	
	
	public static function queryAll(){
		 $results = DB::select('SELECT `IS`.`ID`,`IS`.`ID_PRODUCTO`,`IS`.`CANTIDAD`,`IS`.`created_at`,`IS`.`ID_BODEGA`,`IS`.`updated_at`,`IPROD`.`NOMBRE_PRODUCTO`  from (`inv_stock` `IS` join `inv_producto` `IPROD` on((`IS`.`ID_PRODUCTO` = `IPROD`.`ID_VENTA`)))');
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
				'field1_txt_'.$i	 				=>	"required",
				'field2_txt_'.$i					=>	"required",//"|numeric",
				'field3_txt_'.$i					=>	"required",//"|numeric",

			);
		}
    private function rulesEdit ($i){
			return array(
				'field1_txt_'.$i	 				=>	"required",
				'field2_txt_'.$i					=>	"required",//"|numeric",
				'field3_txt_'.$i					=>	"required",//"|numeric",

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