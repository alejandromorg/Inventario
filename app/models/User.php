<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent  implements UserInterface, RemindableInterface
{
    protected $table = "user";
    protected $hidden = ["password"];
	
	protected $guarded = [
        "id",
        "created_at",
        "updated_at",
        "deleted_at"
    ];
	
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getReminderEmail()
    {
        return $this->email;
    }

    public function groups()
    {
        return $this->belongsToMany("Group")->withTimestamps();
    }		
    public function datas()
    {
        return $this->belongsToMany('Data')->withTimestamps();
    }
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

  public function getRememberTokenName()
  {
    return "remember_token";
  }	
	
	
}