<?php

class Group
extends Eloquent
{
	/*
	protected $table = "group";   

	protected $softDelete = true;
	
	public $timestamps = false;
	
    protected $guarded = [
        "id",
        "created_at",
        "updated_at",
        "deleted_at"
    ];
	public static $FieldsName = array('1' => 'name');		
		
	public static $FieldsOrderCreate = array(	'1'=>'1'
														);
	public static $FieldsOrderEdit = array(		'1'=>'1'
														);														
	public static $FieldsOrderIndex = array(	'1'=>'1'
														);

	public static function queryAll(){
		 $results = DB::select('SELECT  `name` FROM  `group` ');
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
				'field1_txt_'.$i					=>	"required",//"|numeric"
			);
		}
    private function rulesEdit ($i){
			return array(
				'field1_txt_'.$i					=>	"required",//"|numeric
			);
	}
    private function rulesDelete ($i){
			return array(
				"id" => "exists:".$this->table.",id"
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
	    public function resources()
    {
        return $this->belongsToMany("Resource")->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany("User")->withTimestamps();
    }
	*/
	
    protected $table = "group";

    protected $softDelete = true;

    protected $guarded = [
        "id",
        "created_at",
        "updated_at",
        "deleted_at"
    ];

    public function resources()
    {
        return $this->belongsToMany("Resource")->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany("User")->withTimestamps();
    }
}