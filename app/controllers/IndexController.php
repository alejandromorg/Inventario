<?php

class IndexController extends BaseController {

	public function indexAction()
	{
		 return Redirect::route("user/login");
	}
}
