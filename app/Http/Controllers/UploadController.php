<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        //process upload from filepond
        $file = $request->file('file');
        $filename = date("Ymd") . $file->getClientOriginalName() ;
        $folder = now()->timestamp . '-' . $file->getClientOriginalName();

        $file->storeAs('files/tmp/' . $folder, $filename);

        TemporaryFile::create([
            'folder' => $folder,
            'file' => $filename
        ]);

        Session::push('folder', $folder); //save session  folder
        // folder = [item1, item2, item3];
        Session::push('filename', $filename); //save session filename

        return $filename;
    }

    public function destroy(Request $request)
    {
        //check data from temporaryfile
        $db = TemporaryFile::where('file', $request->file)->first();

        if($db){
            $path = storage_path() . '/app/files/tmp/' . $db->folder . '/' . $db->file;
            if (File::exists($path)) {
                File::delete($path);
                rmdir(storage_path('app/files/tmp/' . $db->folder));

                //delete record in table temporaryfile
                TemporaryFile::where([
                    'folder' =>  $db->folder,
                    'file' => $db->file
                ])->delete();
                return 'deleted';
            }

            else {
                return 'not found';
            }
        }
    }
}
