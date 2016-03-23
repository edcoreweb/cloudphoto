<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Gallery;
use Illuminate\Http\Request;

use App\Http\Requests;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::where('user_id', auth()->user()->id)->get();

        return view('galleries.index', compact('galleries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required']);

        $gallery = new Gallery(['name' => e($request->get('name'))]);

        auth()->user()->galleries()->save($gallery);

        return $gallery;
    }

    /**
     * Display the specified resource.
     *
     * @param Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        return view('galleries.show', compact('gallery'));
    }

    /**
     * Upload and save files to gallery.
     *
     * @param Gallery $gallery
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Gallery $gallery, Request $request)
    {
        $file = $request->file('file');

        $this->validate($request, [
            'file' => 'required|mimes:jpeg,bmp,png|max:10000'
        ]);

        $name = md5(microtime()) . '.' . $file->getExtension();

        $file->move(public_path('photos/' . auth()->user()->id), $name);

        $photo = new Photo(['name' => $name]);

        $gallery->photos()->save($photo);

        return response()->json($photo, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gallery::findOrFail($id)->delete();

        return response()->json(null, 204);
    }
}
