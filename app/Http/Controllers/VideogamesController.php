<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class VideogamesController extends Controller
{
    public function VideogameStore() {
        $collection = (new MongoDB\Client)->Project->Videogames;
        $videogameCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $videogames = $collection->find([], ["limit" => 12, "skip" => ($page-1) * 12]);  
        return view('Videogames.Index', ['videogames' => $videogames, 'videogameCount' => $videogameCount]);
    }

    //User

    public function AddComment() {
        $collection = (new MongoDB\Client)->Project->Videogames;
        $comment = [
            "user_id" => request('userid'),
            "comment" => request('comment'),
            "date" => date("Y-m-d H:i:s")            ];
        $videogame= $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('videogameid')) ]);
        $Comments = $videogame->Comments;
        if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
            $Comments = [$comment];
        } else {
            $Comments = [$comment, ...$Comments];
        }
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request('videogameid'))
        ],[
            '$set' => [ 'Comments' => $Comments ]
        ]);

        return redirect("/videogames/".request('videogameid'));
    }

    public function Details($id) {
        $collection = (new MongoDB\Client)->Project->Videogames;
        $videogame = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
        return view('Videogames.Details', [ "videogame" => $videogame]);
    }

    //ADMIN

    public function Index() {
        $collection = (new MongoDB\Client)->Project->Videogames;
        $videogames = $collection->find();  
        return view('Admin.Videogames.Index', ['videogames' => $videogames]);
    }

    public function Create() {
        $collection = (new MongoDB\Client)->Project->Videogames;
        $videogame = $collection->find();
        return view('Admin.Videogames.Create', [ "videogames" => $videogame ]);
    }

    public function Store() {
        $videogame = [
            "name" => request("name"),
            "platform" => request("platform"),
            "developer" => request("developer"),
            "publisher" => request("publisher"),
            "realese_date" => request("realese_date"),
            "user_score" => request("user_score"),
            "Rating" => [],
            "Comments" => []
        ];
        $collection = (new MongoDB\Client)->Project->Videogames;
        $insertOneResult = $collection->insertOne($videogame);
        return redirect("/admin/videogames");
    }

    public function Edit($id) {
        $collection = (new MongoDB\Client)->Project->Videogames;
        $videogame = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Videogames.Edit', [ "videogame" => $videogame ]);
    }    
    
    public function Update(){
        $collection = (new MongoDB\Client)->Project->Videogames;
        $videogame = [
            "name" => request("name"),
            "platform" => request("platform"),
            "developer" => request("developer"),
            "publisher" => request("publisher"),
            "realese_date" => request("realese_date"),
            "user_score" => request("user_score"),
            "Rating" => [],
            "Comments" => []
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("videogameid"))
        ], [
            '$set' => $videogame
        ]);
        return redirect('/admin/videogames/');
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->Project->Videogames;
        $videogame = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Videogames.Delete', [ "videogame" => $videogame ]);
    }
    
    public function Remove(){
        $collection = (new MongoDB\Client)->Project->Videogames;
        $deleteOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("videogameid"))
        ]);
        return redirect('/admin/videogames/');
    }

    public function Show($id) {
        $collection = (new MongoDB\Client)->Project->Videogames;
        $videogame = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Videogames.Details', [ "videogame" => $videogame ]);
    }

}