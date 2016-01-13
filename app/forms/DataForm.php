<?php

class DataForm
extends BaseForm
{
    public function isValidForAdd()
    {
        return $this->isValid([
			"name"			=>	"required",
			"description" 	=>	"required|max:255",
			"mobile" 		=>	"required_without_all:email",
			"email" 		=>	"required_without_all:mobile|email"
			
        ]);
    }

    public function isValidForEdit()
    {
        return $this->isValid([
			"name"			=>	"required",
			"description" 	=>	"required|max:255",
			"mobile" 		=>	"required_without_all:email",
			"email" 		=>	"required_without_all:mobile|email"
        ]);
    }

    public function isValidForDelete()
    {		
        return $this->isValid([
            "id" => "exists:data,id"
        ]);
    }
}