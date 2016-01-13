<?php

class Proveedor extends Eloquent
{
    protected $table = "inv_proveedor";   
	protected $primaryKey = "ID";
	
	public $timestamps = false;
    protected $guarded = [
        "ID"
    ];


}