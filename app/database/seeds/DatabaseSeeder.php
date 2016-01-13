<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		
		
		//$this->call("GroupSeeder");
		//$this->call("ResourceSeeder");
		//$this->call("UserSeeder");
		//$this->call("DetalleCodigoClasificacionSeeder");
		//$this->call("CodigoClasificacionSeeder");		
		//$this->call("ProductoSeeder");
		//$this->call("ProveedorSeeder");		
		//$this->call("UnidadEmpaqueSeeder");
		//$this->call("CompraSeeder");
		$this->call("StockSeeder");
		
		
	}

}
