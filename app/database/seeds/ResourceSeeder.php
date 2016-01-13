<?php
class ResourceSeeder
extends DatabaseSeeder
{
    public function run()
    {
		$tableresource = "resource";
		$tablegroupresource  = "group_resource";
		
		
		
        $resources = [
           /* [
                "pattern" => "/profile",
                "name"    => "user/profile",
                "target"  => "UserController@profileAction",
                "secure"  => true
            ],
			[
                "pattern" => "/logout",
                "name"    => "user/logout",
                "target"  => "UserController@logoutAction",
                "secure"  => true
            ],
            [
                "pattern" => "/group/index",
                "name"    => "group/index",
                "target"  => "GroupController@indexAction",
                "secure"  => true
            ],
            [
                "pattern" => "/group/add",
                "name"    => "group/add",
                "target"  => "GroupController@addAction",
                "secure"  => true
            ],
            [
                "pattern" => "/group/edit",
                "name"    => "group/edit",
                "target"  => "GroupController@editAction",
                "secure"  => true
            ],
            [
                "pattern" => "/group/delete",
                "name"    => "group/delete",
                "target"  => "GroupController@deleteAction",
                "secure"  => true
            ],
			[
                "pattern" => "/user/add",
                "name"    => "user/add",
                "target"  => "UserController@addAction",
                "secure"  => true
            ],
			
			[
                "pattern" => "/login",
                "name"    => "user/login",
                "target"  => "UserController@loginAction",
                "secure"  => false
				
            ],
            [
                "pattern" => "/request",
                "name"    => "user/request",
                "target"  => "UserController@requestAction",
                "secure"  => false
            ],
            [
                "pattern" => "/reset",
                "name"    => "user/reset",
                "target"  => "UserController@resetAction",
                "secure"  => false
            ],
            [
                "pattern" => "/",
                "name"    => "index",
                "target"  => "IndexController@indexAction",
                "secure"  => false
            ],
			[
                "pattern" => "/producto",
                "name"    => "producto/index",
                "target"  => "ProductoController@indexAction",
                "secure"  => true
            ],
			[
                "pattern" => "/producto/add",
                "name"    => "producto/add",
                "target"  => "ProductoController@addAction",
                "secure"  => true
            ],
			[
                "pattern" => "/producto/edit",
                "name"    => "producto/edit",
                "target"  => "ProductoController@editAction",
                "secure"  => true
            ],
			[
                "pattern" => "/producto/delete",
                "name"    => "producto/delete",
                "target"  => "ProductoController@deleteAction",
                "secure"  => true
            ],   
			[
                "pattern" => "/producto/addrow",
                "name"    => "producto/addrow",
                "target"  => "ProductoController@addrowAction",
                "secure"  => true
            ],
			[
                "pattern" => "nodisponible",
                "name"    => "",
                "target"  => "",
                "secure"  => true
            ],
			[
                "pattern" => "/proveedor",
                "name"    => "proveedor/index",
                "target"  => "ProveedorController@indexAction",
                "secure"  => true
            ],
			[
                "pattern" => "/proveedor/add",
                "name"    => "proveedor/add",
                "target"  => "ProveedorController@addAction",
                "secure"  => true
            ],
			[
                "pattern" => "/proveedor/edit",
                "name"    => "proveedor/edit",
                "target"  => "ProveedorController@editAction",
                "secure"  => true
            ],
			[
                "pattern" => "/proveedor/delete",
                "name"    => "proveedor/delete",
                "target"  => "ProveedorController@deleteAction",
                "secure"  => true
            ],   
			[
                "pattern" => "/proveedor/addrow",
                "name"    => "proveedor/addrow",
                "target"  => "ProveedorController@addrowAction",
                "secure"  => true
            ],
			[
                "pattern" => "/compra",
                "name"    => "compra/index",
                "target"  => "CompraController@indexAction",
                "secure"  => true
            ],
			[
                "pattern" => "/compra/add",
                "name"    => "compra/add",
                "target"  => "CompraController@addAction",
                "secure"  => true
            ],
			[
                "pattern" => "/compra/edit",
                "name"    => "compra/edit",
                "target"  => "CompraController@editAction",
                "secure"  => true
            ],
			[
                "pattern" => "/compra/delete",
                "name"    => "compra/delete",
                "target"  => "CompraController@deleteAction",
                "secure"  => true
            ],   
			[
                "pattern" => "/compra/addrow",
                "name"    => "compra/addrow",
                "target"  => "CompraController@addrowAction",
                "secure"  => true
            ],*/
			[
                "pattern" => "/stock",
                "name"    => "stock/index",
                "target"  => "StockController@indexAction",
                "secure"  => true
            ],
			[
                "pattern" => "/stock/add",
                "name"    => "stock/add",
                "target"  => "StockController@addAction",
                "secure"  => true
            ],
			[
                "pattern" => "/stock/edit",
                "name"    => "stock/edit",
                "target"  => "StockController@editAction",
                "secure"  => true
            ],
			[
                "pattern" => "/stock/delete",
                "name"    => "stock/delete",
                "target"  => "StockController@deleteAction",
                "secure"  => true
            ],   
			[
                "pattern" => "/stock/addrow",
                "name"    => "stock/addrow",
                "target"  => "StockController@addrowAction",
                "secure"  => true
            ],
        ];
        foreach ($resources as $resource)
        {
			DB::unprepared('ALTER TABLE '.$tableresource.' AUTO_INCREMENT = 1');
            DB::unprepared('ALTER TABLE '.$tablegroupresource.' AUTO_INCREMENT = 1');
            
			$r = Resource::create($resource);
			$id = Group::where('id','=',1)->first()->id;
			$r->groups()->attach(array($id));
		}
    }
}