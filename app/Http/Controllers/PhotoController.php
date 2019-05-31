<?php

namespace App\Http\Controllers;

use App\Photo;
use App\PhotoType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $photoTypes = PhotoType::all();
        $userPhotos = auth()->user()->photos;
        $photos = [];
        foreach ($userPhotos as $photo) {
            $photos[$photo->photo_type_id] = $photo->name;
        }
        return view('photo.add', compact('photoTypes', 'photos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('files')) {
            $files = $request->files->all();
            foreach ($files['files'] as $key => $file) {
                if (!is_null($file)) {
                    $file_name = $key . '_' . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(storage_path('/app/public/photo/' . auth()->user()->id . '/'), $file_name);

                    Photo::updateOrCreate([
                        'user_id' => auth()->user()->id,
                        'photo_type_id' => $key,
                    ], [
                        'name' => $file_name,
                    ]);
                }
            }
        } else {
            return redirect()->back()->with('error', 'Nie dodałeś zdjęć');
        }
        Artisan::call('cache:clear');
        Auth::logout();
        return redirect()->route('photo.thankyoupage');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Photo $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        //
    }

    public function thankyoupage()
    {
        return view('photo.thankyoupage');
    }
}
