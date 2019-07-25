<?php

namespace App\Http\Controllers\Api;
use App\Movie;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function index(){
      $movies = Movie::all();
      return response()->json([
        'success' => true,
        'result' => $movies
      ]);
    }

    public function show($id){
      $movie = Movie::find($id);
      if (!empty($movie)) {
        return response()->json([
          'success' => true,
          'result' => $movie
        ]);
      }
      return response()->json([
        'success' => false,
        'error' => 'Non esiste un film con questo id: ' . $id
      ]);
    }

    public function store(Request $request){
      $data = $request->all();
      $newMovie = new Movie;
	    $newMovie->fill($data);
	    $newMovie->save();

      return response()->json([
        'success' => true,
        'result' => $newMovie
      ]);
    }

    public function update(Request $request, $id){
      $movie = Movie::find($id);
      $data = $request->all();
      if(!empty($movie)){
        $movie->update($data);
        return response()->json([
          'success' => true,
          'result' => $movie
        ]);
      }
      return response()->json([
        'success' => false,
        'error' => 'Non esiste un fil con questo id: ' . $id
      ]);
    }

    public function destroy($id){
      $movie = Movie::find($id);
      if(!empty($movie)){
        $movie->delete();
        return response()->json([
          'success' => true,
          'result' => []   // gli restituisco un array vuoto perchè il film non esiste più
        ]);
      }
      return response()->json([
        'success' => false,
        'error' => 'Non esiste un fil con questo id: ' . $id
      ]);
    }
}
