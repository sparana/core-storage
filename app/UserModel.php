<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model{
	protected $table = 'index';
	protected $fillable = ['id', 'username', 'created_at', 'updated_at'];
}
?>
