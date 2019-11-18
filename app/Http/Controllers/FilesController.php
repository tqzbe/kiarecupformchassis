<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\File;

class FilesController extends Controller
{
    public function store(Request $request) 
    {
        $result = 'failed';
        $location = 'files';

        if ( !empty($request->file('file')) ) {
            $file = $request->file('file');
            $storagePath = Storage::disk('public')->putFileAs($location, $file, time().'_'.$file->getClientOriginalName());

            if ( $storagePath ) {
                $file = new File;
                $file->name = basename($storagePath);
                $file->linkable_id = 0;
                $file->linkable_type = 'App\Email';
                $file->location = $location;
                
                if ( $file->save() ) {
                    $result = [
                        'id' => $file->id,
                        'name' => $file->name,
                        'location' => $location
                    ];
                }
            }

        }

        return $result;
    }

    public function delete(Request $request) 
    {
        $result = 'failed';

        if ( !empty($request->file_id) ) {

            $file = File::where('id', $request->file_id)->first();

            if ( !empty($file) ) {
                if ( Storage::disk('public')->exists($file->location.'/'.$file->name) ) {
                    if ( Storage::disk('public')->delete($file->location.'/'.$file->name) ) {
                        if ( $file->delete() ) {
                            $result = 'success';
                        }
                    }
                }
            }
        }

        return $result;
    }
}
