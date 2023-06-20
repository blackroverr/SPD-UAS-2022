<?php

namespace App\Http\Controllers;

use App\Models\Filemanager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class FilemanagerController extends Controller
{
    public function index()
    {
        $files = scandir(public_path('public/files'));
        $data = [];
        foreach ($files as $row) {
            if ($row != '.' && $row != '..') {
                $data[] = [
                    'name' => explode('.', $row)[0],
                    'url' => asset('public/files/' . $row)
                ];
            }
        }
        $file = Filemanager::get();
        return view('/pages/file-upload', ['fileList' => $file], compact('data'));
    }
    // save record
    public function store(Request $request)
    { 
        $file = $request->file('file');
   
        $filename = $file->getClientOriginalName();
        $file->move(public_path('public/files'), $filename);
       
   
        return response()->json(['success'=> $filename]);
    

        // $validatedData = $request->validate([
        //     'files' => 'required',
        //     'files.*' => 'mimes:csv,txt,xlx,xls,pdf,png,jpg,jpeg,mp4,mp3,docx,doc,pptx,ppt,sql'
        //     ]);
     
        //     if($request->hasfile('files'))
        //     {
        //         foreach($request->file('files') as $key => $file)
        //         {
        //             $name = $file->getClientOriginalName();
        //             $path = $file->move('public/files',$name);
    
        //             $insert[$key]['name'] = $name;
        //             $insert[$key]['path'] = $path;
    
        //         }
        //     }
     
            Filemanager::insert($request);
     
        //     return redirect('file-manager-page')->with('status', 'File has been uploaded Successfully');
     
        }
}
?>