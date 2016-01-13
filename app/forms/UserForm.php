<?php

class UserForm
extends BaseForm
{
    public function isValidForAdd()
    {
        return $this->isValid([
			"username"	=>	"required",
			"email" 	=>	"required|email|unique:user,email",
			"password"	=> 	"required|confirmed|min:6",
			'captcha' => array('required', 'captcha')
        ]);
    }

    public function isValidForEdit()
    {
        return $this->isValid([
			"username"	=>	"required",
            "id"   => "exists:user,id",
            "email" => "required|email|unique:user,email",
			"password"	=> 	"required|confirmed|min:6"
        ]);
    }

    public function isValidForDelete()
    {		
        return $this->isValid([
            "id" => "exists:user,id"
        ]);
    }
}