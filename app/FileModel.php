<?php

namespace App;
use Illuminate\Support\Facades;

class FileModel{

	public function createTable($name){
		$res = DB::statement("CREATE TABLE $name (id int not null auto_increment 
			primary key, filename varchar(255) not null, filecontent longblob");
		return $res;
	}

	public function deleteUser($name){
		$res = DB::delete("DROP TABLE $name");
		return $res;
	}

	public function getFile($name,$filename){
		$res = DB::select("SELECT filename,filecontent FROM $name WHERE filename=$filename");
		return $res;
	}
	
	public function deleteFile
}
?>
