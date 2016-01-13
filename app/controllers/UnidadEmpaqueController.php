<?php

use Illuminate\Support\MessageBag;

class UnidadEmpaqueController extends Controller
{
	private $module;
	private $routeIndex;	
	private $routeAdd;
	private $routeEdit;
	
	private $key;
	private $FieldsName;
		
	private $FieldsCreate;
	private $FieldsEdit;
	private $rutasValidas;
	private $addForm;
	private $addrow;


	public function __construct()
    {
		$this->FieldsName = array('1' => 'UNIDAD_EMPAQUE');
		
		$this->module 			= "unidadempaque";
		$this->routeIndex 		= $this->module."/index";	
		$this->routeAdd 		= $this->module."/add";
		$this->routeEdit 		= $this->module."/edit";
		
		$this->key = "ID";
				
		
		$this->FieldsCreate =  array(
			'1'				=>	array( 'field' => $this->FieldsName['1'],'type' =>'text','name' => strtolower($this->FieldsName['1']).'_txt_', 'label'=>$this->module.'.'.strtolower($this->FieldsName['1']), 'placeholder'=>$this->module .strtolower($this->FieldsName['1']).'placeholder'),
			'2'				=>	array( 'field' => $this->FieldsName['2'],'type' =>'text','name' => strtolower($this->FieldsName['2']).'_txt_', 'label'=>$this->module.'.'.strtolower($this->FieldsName['2']), 'placeholder'=>$this->module .strtolower($this->FieldsName['2']).'placeholder'),
			'3'				=>	array( 'field' => $this->FieldsName['3'],'type' =>'text','name' => strtolower($this->FieldsName['3']).'_txt_', 'label'=>$this->module.'.'.strtolower($this->FieldsName['3']), 'placeholder'=>$this->module .strtolower($this->FieldsName['3']).'placeholder'),
			'4'				=>	array( 'field' => $this->FieldsName['4'],'type' =>'checkbox','name' => strtolower($this->FieldsName['4']).'_txt_', 'label'=>$this->module.'.'.strtolower($this->FieldsName['4']), 'placeholder'=>$this->module .strtolower($this->FieldsName['4']).'placeholder')
		);
		$this->FieldsEdit =  array( 
			'1'				=>	array( 'field' => $this->FieldsName['1'],'type' =>'text','name' => strtolower($this->FieldsName['1']).'_txt_0', 'label'=>$this->module.'.'.strtolower($this->FieldsName['1']), 'placeholder'=>$this->module .strtolower($this->FieldsName['1']).'placeholder'),
			'2'				=>	array( 'field' => $this->FieldsName['2'],'type' =>'text','name' => strtolower($this->FieldsName['2']).'_txt_0', 'label'=>$this->module.'.'.strtolower($this->FieldsName['2']), 'placeholder'=>$this->module .strtolower($this->FieldsName['2']).'placeholder'),
			'3'				=>	array( 'field' => $this->FieldsName['3'],'type' =>'text','name' => strtolower($this->FieldsName['3']).'_txt_0', 'label'=>$this->module.'.'.strtolower($this->FieldsName['3']), 'placeholder'=>$this->module .strtolower($this->FieldsName['3']).'placeholder'),
			'4'				=>	array( 'field' => $this->FieldsName['4'],'type' =>'checkbox','name' => strtolower($this->FieldsName['4']).'_txt_0', 'label'=>$this->module.'.'.strtolower($this->FieldsName['4']), 'placeholder'=>$this->module .strtolower($this->FieldsName['4']).'placeholder')
		);
		$this->FieldsIndex =  array( 
			'1'				=>	array( 'field' => $this->FieldsName['1'],'type' =>'text','name' => strtolower($this->FieldsName['1']).'_txt_0', 'label'=>$this->module.'.'.strtolower($this->FieldsName['1']), 'placeholder'=>$this->module .strtolower($this->FieldsName['1']).'placeholder'),
			'2'				=>	array( 'field' => $this->FieldsName['2'],'type' =>'text','name' => strtolower($this->FieldsName['2']).'_txt_0', 'label'=>$this->module.'.'.strtolower($this->FieldsName['2']), 'placeholder'=>$this->module .strtolower($this->FieldsName['2']).'placeholder'),
			'3'				=>	array( 'field' => $this->FieldsName['3'],'type' =>'text','name' => strtolower($this->FieldsName['3']).'_txt_0', 'label'=>$this->module.'.'.strtolower($this->FieldsName['3']), 'placeholder'=>$this->module .strtolower($this->FieldsName['3']).'placeholder'),
			'4'				=>	array( 'field' => $this->FieldsName['4'],'type' =>'checkbox','name' => strtolower($this->FieldsName['4']).'_txt_0', 'label'=>$this->module.'.'.strtolower($this->FieldsName['4']), 'placeholder'=>$this->module .strtolower($this->FieldsName['4']).'placeholder')
		);
		
	}

    public function indexAction()
    {	

		$records = ProductoRutaView::all();

		$object = [
            "records" 			=> 	$records,
			"FieldsIndex"		=>	$this->FieldsIndex,
			"module" 			=> 	$this->module,
			"key"				=> 	$this->key
        ];

        return View::make($this->routeIndex, $object);
    }
	
	public function addAction()
    {
        $form = new ProductoForm();

        if ($form->isPosted())
        {
            if ($form->isValidForAdd())
            {				
				$ID_INVENTARIO = Data::create([
					"ID_INVENTARIO"			=> 	Input::get("ID_INVENTARIO"),
					"ID_VENTA"	=> 	Input::get("ID_VENTA"),
					"ID_PRODUCTO"		=> 	Input::get("ID_PRODUCTO"),
					"ID_RUTA"			=> 	Input::get("ID_RUTA"),
					"NOMBRE_PRODUCTO"		=> 	Input::get("NOMBRE_PRODUCTO"),
					"DISPONIBLE"			=> 	1											
				])->ID_INVENTARIO;
				
				//$this->associateUser(Auth::user()->id,$id);
				
				return Redirect::route($this->routeAdd);
			}

            return Redirect::route($this->routeAdd)->withInput([
                "errors" => $form->getErrors()
            ]);
			//die(var_dump($form->getErrors()));
			return Redirect::route($this->routeAdd)
			->withErrors($form->getErrors())
            ->withInput();
        }

        return View::make($this->routeAdd, [
            "form" => $form,
			"HeaderTitle"=>trans('addData.title')
        ]);
    }
	public function editAction()
	{
		$form  = new ProductoForm();

        $idinventario    = Input::get("ID_INVENTARIO");
		
        $producto = Producto::findOrFail($idinventario);
        $url   = URL::full();
		
		$this->getRuta();
		
		//die();
		
        if ($form->isPosted())
        {
            if ($form->isValidForEdit())
            {
                //$producto->ID_INVENTARIO = Input::get("ID_INVENTARIO");
				$producto->ID_VENTA = Input::get("id_venta_txt");
                $producto->ID_PRODUCTO = Input::get("id_producto_txt");
				
				$producto->ID_RUTA = Input::get("id_ruta_txt");
				
				
				$producto->NOMBRE_PRODUCTO = Input::get("nombre_producto_txt");
				$producto->DISPONIBLE = Input::get("disponible_chk");
					
				//die (var_dump($producto->ID_VENTA ).var_dump($producto->ID_PRODUCTO ).var_dump($producto->ID_RUTA ).var_dump($producto->NOMBRE_PRODUCTO ).var_dump($producto->DISPONIBLE ));
				$producto->save();

                return Redirect::route($this->routeIndex);
            }

            return Redirect::to($url)->withInput([
                "ID_INVENTARIO"   => Input::get("ID_INVENTARIO"),
				"producto"     => $producto,
                "errors" => $form->getErrors(),
                "url"    => $url
            ]);
        }
			//die($data->name);
        return View::make($this->routeEdit, [
            "form"      => $form,
            "producto"     => $producto,
			"rutasValidas" => $this->rutasValidas,
            "HeaderTitle"=>trans('producto.editrecord'),
        ]);	
	}

	public function deleteAction()
    {
        $form = new ProveedorForm();

        if ($form->isValidForDelete())
        {
            $object = Proveedor::findOrFail(Input::get($this->key));
            $object->delete();
        }

        return Redirect::route($this->routeIndex);
    }  
	private function getRuta(){
		//$rutas = DB::select('select `CC`.`ID`,concat(`DCLINEA`.`VALOR`, "/"  ,`DCLASE`.`VALOR`) AS RUTA from ((`inv_codigo_clasificacion` `CC` join `inv_detalle_codigo_clasificacion` `DCLASE` on((`CC`.`ID_CLASE` = `DCLASE`.`ID`))) join `inv_detalle_codigo_clasificacion` `DCLINEA` on((`CC`.`ID_LINEA` = `DCLINEA`.`ID`)))');
		//$rutas = DB::select('select `CC`.`ID` AS ID,`DCLINEA`.`VALOR` AS LINEA,`DCLASE`.`VALOR` AS CLASE  from ((`inv_codigo_clasificacion` `CC` join `inv_detalle_codigo_clasificacion` `DCLASE` on((`CC`.`ID_CLASE` = `DCLASE`.`ID`))) join `inv_detalle_codigo_clasificacion` `DCLINEA` on((`CC`.`ID_LINEA` = `DCLINEA`.`ID`)))');
		$rutas = DB::select('select  `CC`.`ID` as ID,`DCLINEA`.`VALOR` AS LINEA  from ((`inv_codigo_clasificacion` `CC` join `inv_detalle_codigo_clasificacion` `DCLASE` on((`CC`.`ID_CLASE` = `DCLASE`.`ID`))) join `inv_detalle_codigo_clasificacion` `DCLINEA` on((`CC`.`ID_LINEA` = `DCLINEA`.`ID`))) group by LINEA');
		
		foreach($rutas as $lineaobject ){
	
			$clases = DB::select('select `CC`.`ID` AS ID,`DCLASE`.`VALOR` AS CLASE  from ((`inv_codigo_clasificacion` `CC` join `inv_detalle_codigo_clasificacion` `DCLASE` on((`CC`.`ID_CLASE` = `DCLASE`.`ID`))) join `inv_detalle_codigo_clasificacion` `DCLINEA` on((`CC`.`ID_LINEA` = `DCLINEA`.`ID`))) where `DCLINEA`.`VALOR` = "'.$lineaobject->LINEA.'"');
			unset($clasesarray);
			foreach($clases as $clasesobject ){
				$clasesarray[$clasesobject->ID] = $clasesobject->CLASE;
			}		
			$comboIDRuta[$lineaobject->LINEA] = $clasesarray;
		}
		$this->rutasValidas = $comboIDRuta;
				
	}
}
