<?php

namespace App\Http\Controllers;

use App\Sport;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sports.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('sports.edit')->with([
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $sport = new Sport();
        $sport->fill($request->all());
        $sport->save();
        if ($request->user_id) {
            $sport->users()->save(User::find($request->user_id));
        } else {
            $sport->users()->save(Auth::user());
        }

        return view('sports.show')->with([
            'sport' => $sport
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sport $sport
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Sport $sport)
    {
        $games = Auth::user()->games()->whereSportId($sport->id)->orderBy('score', 'desc')->get();
        $users = $sport->users;
        return view('sports.show')->with([
            'sport' => $sport,
            'games' => $games,
            'users' => $users
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sport $sport
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Sport $sport)
    {
        return view('sports.edit')->with([
            'sport' => $sport,
            'users' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Sport $sport
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, Sport $sport)
    {
        $sport->name = $request->name;
        $sport->save();

        return redirect()->route('sports.show', $sport->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sport $sport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sport $sport)
    {
        //
    }
}
