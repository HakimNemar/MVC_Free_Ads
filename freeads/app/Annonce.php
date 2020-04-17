<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Annonce extends Model
{
    public function create(array $data) 
    {
        // DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle']);
        DB::table('annonces')->insert($data);
    }

    public function read($id)
    {
        $user = DB::table('annonces')->where('id', $id)->first();
        return $user;
    }

    public function read_all() 
    {
        $sth = DB::select('select * from annonces');
        return $sth;
    }

    public function readMyAnnonces($id) 
    {
        $user = DB::table('annonces')->where('editor_id', $id)->get();
        return $user;
    }
}
