<?php
 
class GroupSeeder
  extends DatabaseSeeder
{
  public function run()
  {
    $groups = [
    [
        "id" => 1,
        "name" => "ADMIN"
    ],
	[
        "id" => 2,
        "name" => "USUARIO"
    ]

    ];
  
    foreach ($groups as $group) {
      Group::create($group);
    }
  }
}
