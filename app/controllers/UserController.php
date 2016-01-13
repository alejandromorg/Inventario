<?php

use Illuminate\Support\MessageBag;

class UserController extends Controller
{
	
    public function loginAction()
    {		
        $errors = new MessageBag();

        if ($old = Input::old("errors"))
        {
            $errors = $old;
        }

        $data = [
            "errors" => $errors
        ];
		$data ["HeaderTitle"]="LOGIN";

        if (Input::server("REQUEST_METHOD") == "POST")
        {
            $validator = Validator::make(Input::all(), [
                "email" => "required",
                "password" => "required"
            ]);

            if ($validator->passes())
            {
                $credentials = [
                    "email" => Input::get("email"),
                    "password" => Input::get("password")
                ];

                if (Auth::attempt($credentials))
                {
                    return Redirect::route("user/profile");
                }
            }
            
            $data["errors"] = new MessageBag([
                "password" => [
                     trans('login.error')
					//"Email and/or password invalid."/*LANG*/
                ]
            ]);

            $data["email"] = Input::get("email");

            return Redirect::route("user/login")
                ->withInput($data);
        }
		//die(var_dump($data));
        return View::make("user/login", $data);
    }

    public function requestAction()
    {
        $data = [
            "requested" => Input::old("requested")
        ];

        if (Input::server("REQUEST_METHOD") == "POST")
        {
            $validator = Validator::make(Input::all(), [
                "email" => "required"
            ]);

            if ($validator->passes())
            {
                $credentials = [
                    "email" => Input::get("email")
                ];

                Password::remind($credentials,
                    function($message, $user)
                    {
                        $message->from("chris@example.com");
                    }
                );

                $data["requested"] = true;

                return Redirect::route("user/request")
                    ->withInput($data);
            }
        }

        return View::make("user/request", $data);
    }

    public function resetAction()
    {
        $token = "?token=" . Input::get("token");

        $errors = new MessageBag();

        if ($old = Input::old("errors"))
        {
            $errors = $old;
        }

        $data = [
            "token"  => $token,
            "errors" => $errors
        ];

        if (Input::server("REQUEST_METHOD") == "POST")
        {
            $validator = Validator::make(Input::all(), [
                "email"                 => "required|email",
                "password"              => "required|min:6",
                "password_confirmation" => "required|same:password",
                "token"                 => "required|exists:token,token"
            ]);

            if ($validator->passes())
            {
                $credentials = [
                    "email" => Input::get("email")
                ];

                Password::reset($credentials,
                    function($user, $password)
                    {
                        $user->password = Hash::make($password);
                        $user->save();

                        Auth::login($user);        

                        return Redirect::route("user/profile");
                    }
                );
            }

            $data["email"]  = Input::get("email");
            $data["errors"] = $validator->errors();

            return Redirect::to(URL::route("user/reset") . $token)
                ->withInput($data);
        }

        return View::make("user/reset", $data);
    }

    public function profileAction()
    {
		$data ["HeaderTitle"]="PANEL DE USUARIO";
        return View::make("user/profile", $data);
    }

    public function logoutAction()
    {
        Auth::logout();
        return Redirect::route("user/login");
    }

	public function addAction()
    {
        $form = new UserForm();

        if ($form->isPosted())
        {
            if ($form->isValidForAdd())
            {				
				$id = User::create([
					"email"			=> 	Input::get("email"),
					"password"		=>	Hash::make(Input::get("password"))						
				])->id;
				$this->defaultGroup($id,2);
				
				return Redirect::route("user/profile");
			}

            return Redirect::route("user/add")->withInput([
                "email"   => Input::get("email"),
                "errors" => $form->getErrors()
            ]);
        }

        return View::make("user/add", [
            "form" => $form,
			"HeaderTitle"=>"ADD USER"
        ]);
    }
	public function defaultGroup($_idUser,$_idGroup)
    {
        $idUser    = $_idUser;
		$idGroup = $_idGroup;
        $user = User::findOrFail($idUser);
        $user->groups()->sync(array($idGroup));
    }
}
