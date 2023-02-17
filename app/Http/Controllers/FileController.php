<?php

namespace App\Http\Controllers;

use App\Models\File;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FileController extends Controller
{
    public function index(){
        $files = File::latest()->get();
        return Inertia::render('FileUpload',compact('files'));
    }
    public function store(Request $request){
        Validator::make($request->all(),[
            'title'=>'required',
            'file'=>'required'

        ])->validate();

        $fileName = time().'.'.$request->file->extension();
        $request->file->move(public_path('uploads',$fileName));

        File::create(['title'=>$request->title,
            'name'=>$fileName]);

        return redirect()->route('file.upload');
    }
}
