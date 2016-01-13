<?php

use Illuminate\Support\MessageBag;

class DataController extends Controller
{

	private $routeIndex = "data/index";
	private $routeAdd = "data/add";
	private $routeEdit = "data/edit";
	
	private $adminGroup = "ADMIN";
    public function indexAction()
    {	
		
		$user = User::findOrFail(Auth::user()->id);
		//die(var_dump($user));
		if($user->name == $this->adminGroup){
			$records = Data::all();
		}
		else{
			$records = $user->datas()->get();
		}
		$data = [
            "records" => $records,
			"HeaderTitle" => trans('data.index')
        ];
        return View::make($this->routeIndex, $data);
    }
	public function addAction()
    {
        $form = new DataForm();

        if ($form->isPosted())
        {
            if ($form->isValidForAdd())
            {				
				$id = Data::create([
					"name"			=> 	Input::get("name"),
					"description"	=> 	Input::get("description"),
					"mobile"		=> 	Input::get("mobile"),
					"email"			=> 	Input::get("email"),
					"address"		=> 	Input::get("address"),
					"web"			=> 	Input::get("web"),
					"ranking"		=> 	50											
				])->id;
				
				$this->associateUser(Auth::user()->id,$id);
				
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
		$form  = new DataForm();

        $id    = Input::get("id");
        $data = Data::findOrFail($id);
        $url   = URL::full();

        if ($form->isPosted())
        {
            if ($form->isValidForEdit())
            {
                $data->name = Input::get("name");
				$data->description = Input::get("description");
                $data->mobile = Input::get("mobile");
				$data->email = Input::get("email");
				$data->web = Input::get("web");
				$data->address = Input::get("address");
					
				$data->save();

                return Redirect::route($this->routeIndex);
            }

            return Redirect::to($url)->withInput([
                "name"   => Input::get("name"),
				"data"     => $data,
                "errors" => $form->getErrors(),
                "url"    => $url
            ]);
        }
			//die($data->name);
        return View::make($this->routeEdit, [
            "form"      => $form,
            "data"     => $data,
            "HeaderTitle"=>trans('data.editrecord'),
        ]);	
	}
	public function associateUser($_idUser,$_idData)
    {
        $idUser    = $_idUser;
		$idData = $_idData;
		$data = Data::findOrFail($idData);
        $data->users()->sync(array($idUser));
    }
	public function deleteAction()
    {
        $form = new DataForm();

        if ($form->isValidForDelete())
        {
            $data = Data::findOrFail(Input::get("id"));
            $data->delete();
        }

        return Redirect::route($this->routeIndex);
    }  
}
