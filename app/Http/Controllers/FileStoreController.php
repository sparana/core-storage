<?php

namespace App\Http\Controllers;

use App\FileModel;
use App\ReqChecker;
use Illuminate\Http\Request;
use MongoDB;

class FileStoreController extends Controller
{
	private $db;

	public function __construct(){
		$this->db = (new MongoDB\Client)->filesapi;
	}

	public function deleteFile(Request $req) {

	}

	public function getFile(Request $req) {
		$arr = json_decode($req->getContent());
		$res = $this->db->$arr['username']->findOne(["username"=>$arr['username'] , "filename"=>$arr['filename']]);
		return response()->json(MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($res)));
	}

	public function listFile($name) {
		$res = $this->db->$name;
	}

	public function uploadFile(Request $request) {	
		$arr = json_decode($req->getContent());
		$res = $this->db->$name->insertOne(json_decode($request->getContent()));
		return response()->json(["inserted" => $res->getInsertedCount()]);
	}
}
