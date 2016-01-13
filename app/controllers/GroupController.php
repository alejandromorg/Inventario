<?php

class GroupController extends Controller
{/*
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
	
	public function __construct(){
		$this->FieldsName = array('1' => 'ID_INVENTARIO', '2' => 'ID_VENTA', '3' => 'ID_PRODUCTO', '4' => 'ID_RUTA','5' => 'RUTA','5' => 'NOMBRE_PRODUCTO','6' => 'DISPONIBLE');
		
		$this->module 			= "producto";
		$this->routeIndex 		= $this->module."/index";	
		$this->routeAdd 		= $this->module."/add";
		$this->routeEdit 		= $this->module."/edit";
		
		$this->key = Producto::$FieldsName[1];
		
		$size = 1;		
		$indexCreate = 1;		
		$this->FieldsCreate =  array($indexCreate			=>	array( 'field' => Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexCreate]],'type' =>'text','name' => 'field'.$indexCreate.'_txt_', 'id' => 'field'.$indexCreate.'_txt_' , 'label'=>$this->module.'.'.strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexCreate]]), 'placeholder'=>$this->module.".".strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexCreate]]).'placeholder','size'=>$size));
				
			
		$size = 1;		
		$indexEdit = 1;		
		$this->FieldsEdit =  array($indexEdit			=>	array( 'field' => Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexEdit]],'type' =>'text','name' => 'field'.$indexEdit.'_txt_', 'id' => 'field'.$indexEdit.'_txt_' , 'label'=>$this->module.'.'.strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexEdit]]), 'placeholder'=>$this->module.".".strtolower(Producto::$FieldsName[Producto::$FieldsOrderCreate[$indexEdit]]).'placeholder','size'=>$size));
		
		
		$index = 1;
		$this->FieldsIndex =  array( $index			=>	array( 'field' => Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]],'type' =>'text','name' => strtolower(Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]]).'_txt_', 'label'=>$this->module.'.'.strtolower(Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]]), 'placeholder'=>$this->module.".".strtolower(Producto::$FieldsName[Producto::$FieldsOrderIndex[$index]]).'placeholder','size'=>$size));
		
	}
*/	
    public function addAction(){
		/*			
		// create a new model instance     
////////////////////////////////////////////////////////////
		$xi = 0;
		if(Input::has('index')) {
			$xi = Input::get("index");
		}
/////////////////////////////////////////////////////////////
   		
		$Objnew = new Group();
		
		if ($Objnew->isPosted())
        {
				$new = Input::all();				
				// attempt validation
				if ($Objnew->validate($xi,$new,1))//add
				{

						$object  = Group::create([

							Group::$FieldsName[Group::$FieldsOrderCreate['1']]		=> 	Input::get($this->FieldsCreate['1']['name'].$xi),
							
						]);	
					return Response::json(['success' => true,'iddelrow'=>Input::get('index')]);
				}
				else
				{
					$this->errors = $Objnew->errors();
					$this->addrow = $this->addrowAction();
					return Response::json(['success'=>false, 'error' => $this->errors->toArray(),'iddelrow'=>Input::get('index')]);		
				}				
		}
		
		$this->addrow = $this->addrowAction();
		
		$object;
		$xi=0;
        return View::make($this->routeAdd, [

			"row"								=> 	$this->addrow,
			"FieldsCreate"					=> 	$this->FieldsCreate,
			"module" 							=> 	$this->module,	
			"key"								=> 	$this->key
        ]);
		*/
        $form = new GroupForm();

        if ($form->isPosted())
        {
            if ($form->isValidForAdd())
            {
                Group::create([
                    "name" => Input::get("name")
                ]);

                return Redirect::route("group/index");
            }

            return Redirect::route("group/add")->withInput([
                "name"   => Input::get("name"),
                "errors" => $form->getErrors()
            ]);
        }

        return View::make("group/add", [
            "form" => $form
        ]);
    }

    public function editAction(){
		/*
		FALTA
		*/
        $form  = new GroupForm();

        $id    = Input::get("id");
        $group = Group::findOrFail($id);
        $url   = URL::full();

        if ($form->isPosted())
        {
            if ($form->isValidForEdit())
            {
                $group->name = Input::get("name");
                $group->save();

                $group->users()->sync(Input::get("user_id", []));
                $group->resources()->sync(Input::get("resource_id", []));

                return Redirect::route("group/index");
            }

            return Redirect::to($url)->withInput([
                "name"   => Input::get("name"),
                "errors" => $form->getErrors(),
                "url"    => $url
            ]);
        }
		//die(var_dump($group));
        return View::make("group/edit", [
            "form"      => $form,
            "group"     => $group,
            "users"     => User::all(),
			"HeaderTitle"=>"EDIT GROUP",
            "resources" => Resource::where("secure", true)->get()
        ]);
    
	}

    public function deleteAction()
    {
        try{
			$form = new GroupForm();

			if ($form->isValidForDelete())
			{
				$group = Group::findOrFail(Input::get("id"));
				$group->delete();
			}

			//return Redirect::route("group/index");
		}catch (\Illuminate\Database\QueryException $e){
			//001 Codigo error
		}
		return Redirect::route("group/index");
    }

    public function indexAction()
    {
		$data = [
            "groups" => Group::all(),
			"HeaderTitle" => "GROUP"
        ];
        return View::make("group/index", $data);
    }
	
}