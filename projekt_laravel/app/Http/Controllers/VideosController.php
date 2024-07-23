<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateVideoRequest;
use App\Models\Category;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class VideosController extends Controller
{

    

    /**
     * Pobieramy listę filmów
     */

     public function index() {
        //return Auth::user();
        $videos = Video::latest()->get();
        return view('videos.index')->with('videos', $videos);
     }

     /**
      * Jeden film
      */

    public function show($id) {
        $video = Video::findOrFail($id);
        return view('videos.show')->with('video', $video);
    }

    /**
     * Wyświetla formularz dodawania filmu
     */

     public function create() {
        $categories = Category::pluck('name', 'id');
        return view('videos.create')->with('categories', $categories);
     }

     /**
      * Zapisuje film do bazy
      */

      public function store(CreateVideoRequest $request) {
        $video = new Video($request->all());
        $video->user_id = Auth::id();
        $video->save();
        $categoryIds = $request->input('CategoryList');
        $video->categories()->attach($categoryIds);
        Session::flash('video_created', 'Twój film został zapisany');
        return redirect('videos');
      }

      /**
       * Formularz edycji filmu
       */

      public function edit($id) {
        $video = Video::findOrFail($id);
        $categories = Category::pluck('name', 'id');
        return view('videos.edit', compact('video', 'categories'));
      }

      /**
       * Aktualizacja filmu
       */

       public function update($id, CreateVideoRequest $request) {
            $video = Video::findOrFail($id);
            $video->update($request->all());
            $video->categories()->sync($request->input('CategoryList'));
            return redirect('videos/' . $id);
       }
}
