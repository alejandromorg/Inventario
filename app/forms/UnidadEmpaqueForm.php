<?php

class UnidadEmpaqueForm
extends BaseForm
{
	private $table = "aux_unidadempaque";
    public function isValidForAdd($i)
    {
        return $this->isValid([
			"unidad_empaque_txt".$i					=>	"required|numeric"			
        ]);
    }

    public function isValidForEdit()
    {
        return $this->isValid([
			"unidad_empaque_txt".$i					=>	"required|numeric"	
        ]);
    }

    public function isValidForDelete()
    {		
        return $this->isValid([
			"ID" => "exists:".$this->table.",ID"
        ]);
    }
}