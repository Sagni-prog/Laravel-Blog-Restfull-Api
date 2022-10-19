<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function index(){
     $notes = Note::all();
     return $notes;
    }
    public function save(Request $request){
        $note = Note::create(
            ['note' => $request->note]
        );    
        if($note){
            return ['status' => 200];
        }
    }
    public function update(Request $request,$id){
        $note = Note::where('id',$id)->update(['note' => $request->note]);

        if($note){
            return ['status' => 200];
        }  
    }
    public function remember(Request $request,$id){
        $note = Note::where('id',$id)->update(['remember' => $request->remember]);

        if($note){
            return ['status' => 200];
        }  
    }
    public function destroy(Request $request,$id){
         $note = Note::where('id',$id)->delete();
         
         if($note){
            return ['status' => 200];
           }
       }
   }
