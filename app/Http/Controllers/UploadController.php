<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Jobs\ProcessPhoto;
use App\Photo;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**
     * Upload and save files to gallery.
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload($id, Request $request)
    {
        $file = $request->file('file');

        $this->validate($request, [
            'file' => 'required|mimes:jpeg,bmp,png|size:10000'
        ]);

        $gallery = Gallery::findOrFail($id);

        $name = md5(microtime()) . $file->getExtension();

        $file->move(public_path('photos'), $name);

        $photo = new Photo(['name' => $name]);

        $gallery->photos()->save($photo);

        $this->dispatch(new ProcessPhoto($photo));

        return response()->json($photo, 201);
    }
}
