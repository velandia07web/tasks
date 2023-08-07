<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

/**
 * Class DeveloperController
 * @package App\Http\Controllers
 */
class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $developers = Developer::paginate();

        return view('developer.index', compact('developers'))
            ->with('i', (request()->input('page', 1) - 1) * $developers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $developer = new Developer();
        return view('developer.create', compact('developer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Developer::$rules);

        $developer = Developer::create($request->all());

        return redirect()->route('developers.index')
            ->with('success', 'Developer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $developer = Developer::find($id);

        return view('developer.show', compact('developer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $developer = Developer::find($id);

        return view('developer.edit', compact('developer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Developer $developer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Developer $developer)
    {
        request()->validate(Developer::$rules);

        $developer->update($request->all());

        return redirect()->route('developers.index')
            ->with('success', 'Developer updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $developer = Developer::find($id)->delete();

        return redirect()->route('developers.index')
            ->with('success', 'Developer deleted successfully');
    }
}
