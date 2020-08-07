<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class MusicController extends Controller //MUSIC
{
    public function MusicStore() {
        $collection = (new MongoDB\Client)->Project->Music;
        $musicCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $musics = $collection->find([], ["limit" => 12, "skip" => ($page-1) * 12]);  
        return view('Music.Index', ['musics' => $musics, 'musicCount' => $musicCount]);
    }

    //USER

    public function AddComment() {
        $collection = (new MongoDB\Client)->Project->Music;
        $comment = [
            "user_id" => request('userid'),
            "comment" => request('comment'),
            "date" => date("Y-m-d H:i:s")            ];
        $music= $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('musicid')) ]);
        $Comments = $music->Comments;
        if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
            $Comments = [$comment];
        } else {
            $Comments = [$comment, ...$Comments];
        }
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request('musicid'))
        ],[
            '$set' => [ 'Comments' => $Comments ]
        ]);

        return redirect("/musics/".request('musicid'));
    }

    public function Details($id) {
        $collection = (new MongoDB\Client)->Project->Music;
        $music = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
        return view('Music.Details', [ "music" => $music]);
    }

    //ADMIN

    public function Index() {
        $collection = (new MongoDB\Client)->Project->Music;
        $musics = $collection->find();
        return view('Admin.Music.Index', ['musics' => $musics]);
    }

    public function Create() {
        $collection = (new MongoDB\Client)->Project->Music;
        $music = $collection->find();
        return view('Admin.Music.Create', [ "musics" => $music ]);
    }

    public function Store() {
        $music = [
            "genre" => request("genre"),
            "artist_name" => request("artist_name"),
            "track_name" => request("track_name"),
            "popularity" => request("popularity"),
            "Memory" => request("Memory"),
            "key" => request("key"),
            "Rating" => [],
            "Comments" => []
        ];
        $collection = (new MongoDB\Client)->Project->Music;
        $insertOneResult = $collection->insertOne($music);
        return redirect("/admin/music");
    }

    public function Edit($id) {
        $collection = (new MongoDB\Client)->Project->Music;
        $music = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Music.Edit', [ "music" => $music ]);
    }    
    
    public function Update(){
        $collection = (new MongoDB\Client)->Project->Music;
        $music = [
            "genre" => request("genre"),
            "artist_name" => request("artist_name"),
            "track_name" => request("track_name"),
            "popularity" => request("popularity"),
            "Memory" => request("Memory"),
            "key" => request("key"),
            "Rating" => [],
            "Comments" => []
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("musicid"))
        ], [
            '$set' => $music
        ]);
        return redirect('/admin/music/');
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->Project->Music;
        $music = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Music.Delete', [ "music" => $music ]);
    }
    
    public function Remove(){
        $collection = (new MongoDB\Client)->Project->Music;
        $deleteOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("musicid"))
        ]);
        return redirect('/admin/music/');
    }

    public function Show($id) {
        $collection = (new MongoDB\Client)->Project->Music;
        $music = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Music.Details', [ "music" => $music ]);
    }

}