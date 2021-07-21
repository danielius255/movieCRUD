<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scheduledMovies = Movie::orderBy('schedule', 'asc')->get();
        $Userid = \Auth::id();
        $userMovies = Movie::where('user_id', '=', $Userid)
            ->get();


        $movies = Movie::latest()->simplePaginate(5);
        return view('movies.index',compact('movies','userMovies','scheduledMovies'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'imdb'=>'required',
            'seen',
            'schedule' => 'required',
            'user_id' => 'required',
            ]);

        $movie = Movie::create(
            $request->only([
                'title',
                'description',
                'imdb',
                'seen',
                'schedule',
                'user_id',
            ])
        );

            if ($request->hasFile('image')) {

                $request->validate([
                    'image' => 'mimes:jpeg,bmp,png' 
                ]);
    
                
                $request->file('image')->store('movie','public');
    
               // $image = $request->file('image')->hashName();

               $path = Storage::disk('public')->path('movie/'.$request->file('image')->hashName()); 

               $movie ->addMedia($path)
                ->toMediaCollection();
            
            }

            return redirect()->route('movies.index')
                ->with('success','Movie added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('movies.show',compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit',compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'imdb'=>'required',
            'seen',
            'schedule' => 'required',
            ]);
           
            // $movie->update($request->all());

            $movie = $movie->update(
                $request->only([
                    'title',
                    'description',
                    'imdb',
                    'seen',
                    'schedule',
                ])
            );
            if ($request->hasFile('image')) {

                $request->validate([
                    'image' => 'mimes:jpeg,bmp,png' 
                ]);
    
                
                $request->file('image')->store('movie','public');
    
               // $image = $request->file('image')->hashName();

               $path = Storage::disk('public')->path('movie/'.$request->file('image')->hashName()); 

               $movie ->addMedia($path)
                ->toMediaCollection();
            
            }
           
            return redirect()->route('movies.index')
                ->with('success','Movie updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        

        return redirect()->route('movies.index')
            ->with('success','Movie deleted successfully');
    }
}
