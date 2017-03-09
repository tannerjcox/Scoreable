<?php

namespace App\Http\Controllers;

use App\Team;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teams.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('teams.edit')->with([
            'users' => User::pluck('name', 'id')->toArray(),
            'canAddUsers' => Auth::user()->isAdmin()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $team = new Team();
        $team->fill($request->all());
        $team->save();
        $team->users()->save(Auth::user());

        return redirect()->route('teams.show', [
            'team' => $team
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Team $team)
    {
        return view('teams.show')->with([
            'team' => $team
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Team $team)
    {
        $addableUsers = User::whereNotIn('id', $team->users()->pluck('id'))->pluck('name', 'id')->toArray();
        return view('teams.edit')->with([
            'team' => $team,
            'users' => $addableUsers,
            'canAddUsers' => (Auth::user()->isAdmin() || ($team && $team->creator()->id == Auth::user()->id)) && $addableUsers
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $team->fill($request->all());
        $team->save();
        if ($request->user_id) {
            $team->users()->save(User::find($request->user_id));
        }

        return redirect()->route('teams.edit', [
            'team' => $team
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }
}
