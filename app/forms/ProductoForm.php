<?php

class ProductoForm
extends BaseForm
{
	private $table = "inv_producto";
    public function isValidForAdd($i)
    {
        return $this->isValid([
			"id_venta_txt_".$i					=>	"required|numeric",
			"id_producto_txt_".$i 			=>	"required|string|size:4",
			"id_ruta_txt_".$i 					=>	"required",
			"nombre_producto_txt_".$i 	=>	"required", //alpha spaces is needed
			"disponible_chk_".$i			=>	"boolean"
        ]);
    }

    public function isValidForEdit($i)
    {
        return $this->isValid([
			"id_venta_txt_".$i					=>	"required|numeric",
			"id_producto_txt_".$i 			=>	"required|string|size:4",
			"id_ruta_txt_".$i 					=>	"required",
			"nombre_producto_txt_".$i 	=>	"required", //alpha spaces is needed
			"disponible_chk_".$i			=>	"boolean"
        ]);
    }

    public function isValidForDelete()
    {		
        return $this->isValid([
			"ID_INVENTARIO" => "exists:".$this->table.",ID_INVENTARIO"
        ]);
    }
}