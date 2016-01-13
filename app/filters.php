<?php

Route::filter('auth', function()
{
    if (Auth::guest())
    {
	    if (Request::ajax())
	    {
		    return Response::make('Unauthorized', 401);
	    }
		
		    return Redirect::guest('/');
    }
	$return = 0;
    foreach (Auth::user()->groups as $group)
    {
		
		
	    foreach ($group->resources as $resource)
	    {
		
		    if ($resource->pattern == "/".Route::getCurrentRoute()->getPath())
		    {
				$return = 1;
		    }			
		}
		
	}

	if($return == 0){
		return Redirect::to('/profile');
	}
	else{
		
		return;
	}     
});

Route::filter("guest", function()
{
    if (Auth::check())
    {
		
		if(Route::getCurrentRoute()->getPath() == "login"){
			return Redirect::route("user/profile");						
		}
        //
    }
});

Route::filter("csrf", function()
{
    if (Session::token() != Input::get("_token"))
    {
        throw new Illuminate\Session\TokenMismatchException;
    }
});
