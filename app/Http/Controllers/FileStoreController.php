<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class FileStoreController extends Controller
{
	private $db;

	public function __construct(){
		$this->db = (new MongoDB\Client)->testing;
	}

	public function deleteFile(Request $req) {
		$req = json_decode($req->getContent(),TRUE);
		$deleteResult = $this->db->{$req['username']}->deleteOne([
			'username'=>$req['username'],
			'filename'=>$req['filename']
		]);
		return response()->json(['status'=>$deleteResult->getDeletedCount()]);
	}

	public function getFile(Request $req) {
		$req = json_decode($req->getContent(),TRUE);
		$res = $this->db->{$req['username']}->find([
			'username'=>$req['username'],
			'filename'=>$req['filename']]);
		foreach($res as $var){
			$arrays[]= json_decode(MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($var)));
		}
		return response()->json($arrays);
	}

	public function listFile($name) {
		$res = $this->db->{$name}->find();
		foreach($res as $var){
			$arrays[]= json_decode(MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($var)));
		}
		return response()->json($arrays);
	}

	public function uploadFile(Request $req) {	
		$arr = json_decode($req->getContent(),TRUE);
		$insertdata = array(
			'username' => $arr['username'],
			'filename' => $arr['filename'],
			'filecontent' => $arr['filecontent']
		);
		$res = $this->db->{$arr['username']}->insertOne($insertdata);
		return response()->json(["status" => $res->getInsertedCount()]);
	}
}
