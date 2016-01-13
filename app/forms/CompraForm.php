<?php

class CompraForm
extends BaseForm
{
	private $table = "tra_compra";
	
    public function isValidForAdd($i)
    {
        return $this->isValid([
			"numero_factura_txt_".$i					=>	"required",
			"id_proveedor_txt_".$i 						=>	"required",//"|numeric",
			"id_producto_txt_".$i 							=>	"required",//"|numeric",
			"cantidad_txt_".$i 								=>	"required",//"|numeric",
			"id_unidad_empaque_txt_".$i 				=>	"required",//"|numeric",
			"precio_total_txt_".$i 							=>	"required"		
        ]);
    }

    public function isValidForEdit($i)
    {
        return $this->isValid([
			"numero_factura_txt_".$i					=>	"required",
			"id_proveedor_txt_".$i 						=>	"required",//"|numeric",
			"id_producto_txt_".$i 							=>	"required",//"|numeric",
			"cantidad_txt_".$i 								=>	"required",//"|numeric",
			"id_unidad_empaque_txt_".$i 				=>	"required",//"|numeric",
			"precio_total_txt_".$i 							=>	"required"		
        ]);
    }

    public function isValidForDelete()
    {		
        return $this->isValid([
			"ID" => "exists:".$this->table.",ID"
        ]);
    }
}