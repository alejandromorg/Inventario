<?php
 
class UserSeeder
  extends DatabaseSeeder
{
  public function run()
  {
	$tableUser = "user"; 
	$tableUserGroup = "group_user";	
    $users = [
      [
        "username" => "alejandro",
        "password" => Hash::make("Stuttma98*"),
        "email"    => "alejandropriv@gmail.com"
      ],[
        "username" => "Mario",
        "password" => Hash::make("Stuttma98*"),
        "email"    => "alejandropriv@outlook.com"
      ]
    ];
	
	DB::unprepared('ALTER TABLE '.$tableUser.' AUTO_INCREMENT = 1');
	DB::unprepared('ALTER TABLE '.$tableUserGroup.' AUTO_INCREMENT = 1');
	
    foreach ($users as $user) {
		$u=User::create($user);
		$id=Group::where('name','=','ADMIN')->first()->id;
        $u->groups()->attach(array($id));
		
    }
  }
}
