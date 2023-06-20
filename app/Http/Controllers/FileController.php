<?php

namespace App\Http\Controllers;

use App\Models\File as ModelsFile;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $files = scandir(storage_path('app/files/'));
        $data = [];
        foreach ($files as $row) {
            if ($row != '.' && $row != '..') {
                $data[] = [
                    'filename' => explode('.', $row)[0],
                    'url' => asset('app/files/' . $row)
                ];
            }
        }
        $file = ModelsFile::get();
        
        if (Session::has('folder')) {
            Session::remove('folder');
            Session::remove('filename');
        }
        return view('pages/file-manager', ['fileList' => $file], compact('data'));
           

    }

    public function open()
    {
        $file = File::get();
        $read = opendir('app/files' . '/' . $file);
    }


    public function store(Request $request)
    {
        $temporaryFolder = Session::get('folder');
        $namefile = Session::get('filename');

        for ($i = 0; $i < count($temporaryFolder); $i++) {
            $temporary = TemporaryFile::where('folder', $temporaryFolder[$i])->where('file', $namefile[$i])->first();

            if ($temporary) { //if exist

                ModelsFile::create([
                    'folder' => $temporaryFolder[$i],
                    'file' => $namefile[$i],
                ]);

                //hapus file and folder temporary
                $path = storage_path() . '/app/files/tmp/' . $temporary->folder . '/' . $temporary->file;
                if (File::exists($path)) {

                    Storage::move('files/tmp/' . $temporary->folder . '/' . $temporary->file, 'files/' . $temporary->folder . '/' . $temporary->file);

                    File::delete($path);
                    rmdir(storage_path('app/files/tmp/' . $temporary->folder));

                    //delete record in temporary table
                    $temporary->delete();
                }
            }
        }

        Session::remove('folder');
        Session::remove('filename');

        return response()->json(['status' => false, 'message' => 'Data Berhasil diupload']);
        // return redirect('/file-manager-page')->with('status', 'File has been uploaded Successfully!');
    }   
}
