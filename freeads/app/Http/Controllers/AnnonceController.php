<?php

namespace App\Http\Controllers;

use App\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnnonceController extends Controller
{
    public function __construct()
    {
        $this->req = new Annonce();
    }

    public function Allannonces()
    {
        $auth = Auth::user();
        $annonces = $this->req->read_all();
        return view("Allannonces", compact("annonces", "auth"));
    }

    public function annonce($id)
    {
        $auth = Auth::user();
        $annonce = $this->req->read($id);
        return view("annonce", compact("annonce", "auth"));
    }

    public function createAnnonce() 
    { 
        return view("createAnnonce");
    }

    public function saveAnnonce(Request $request)
    {
        if ($request) {        
            $validateData = $request->validate([
                'title' => 'required|min:2',
                'description' => 'required|min:5',
                'photo' => 'required',
                'prix' => 'required'
            ]);
        }
        
        if ($validateData) {
            $auth = Auth::user();
            $this->req->create([
                'editor_id' => $auth->id,
                'titre' => $request['title'],
                'description' => $request['description'],
                'photographie' => $request['photo'],
                'prix' => $request['prix'],
            ]);
            return redirect()->route('annonces');
        }
    }

    public function myAnnonces($id) 
    {
        $annonces = $this->req->readMyAnnonces($id);
        return view("myAnnonces",compact("annonces"));
    }

    public function editAnnonce($id)
    {
        $annonce = $this->req->read($id);
        return view("editAnnonce", compact("annonce"));
    }

    public function saveEdit($id, Request $request)
    {
        if ($request) {    
            $validateData = $request->validate([
                'title' => 'required|min:2',
                'description' => 'required|min:5',
                'photo' => 'required',
                'prix' => 'required'
            ]);
        }
        
        if ($validateData) {
            DB::table('annonces')->where('id', $id)->update([
                'titre' => $request['title'],
                'description' => $request['description'],
                'photographie' => $request['photo'],
                'prix' => $request['prix'],
                ]);

            $request->session()->flash('success', 'Your annonce is updated !');
            return redirect()->route('edit.Annonce', $id);
        }
    }
}