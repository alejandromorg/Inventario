<?php

class ProveedorForm
extends BaseForm
{
	private $table = "inv_proveedor";
	
    public function isValidForAdd($i)
    {
        return $this->isValid([
			"nombre_txt_".$i							=>	"required", //alpha spaces is needed
			"ranking_txt_".$i							=>	"required|numeric|between:0,100",
			"descripcion_txt_".$i 						=>	"required",
			"disponible_chk_".$i						=> 	"boolean"			
        ]);
    }

    public function isValidForEdit($i)
    {
        return $this->isValid([
			"nombre_txt_".$i							=>	"required", //alpha spaces is needed
			"ranking_txt_".$i							=>	"required|numeric",
			"descripcion_txt_".$i 						=>	"required",
			"disponible_chk_".$i						=> 	"boolean"
        ]);
    }

    public function isValidForDelete()
    {		
        return $this->isValid([
            "ID" => "exists:".$this->table.",ID"
        ]);
    }
}