<?php

use App\UserModel;
use App\FileModel;
use Illuminate\Support\Facades;

namespace App\Http\Controllers;

class UserManageController extends Controller
{
	public function checkExistence($name){
		$res = DB::select("select username from index where username='$name'");
		if(!empty($res[0]))
			return true;
		else 
			return false;
	}

	public function createUser($name){	
		$res = FileModel::createTable($name);
		return response()->json(['status'=>$res]);
	}

	public function deleteUser($name){
		$res = FileModel::deleteUser($name);
		if ( $res == 1){
			$res = DB::statement("DELETE FROM index WHERE username=$name");
				return response()->json(['status'=>$res]);
		}else
			return response()->json(['status' => 0]);
	}
}
