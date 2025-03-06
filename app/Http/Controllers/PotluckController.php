<?php

namespace App\Http\Controllers;

use App\Models\Potluck;
use Illuminate\Http\Request;

class PotluckController extends Controller
{
    /**
     * Display a listing of the potlucks.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $potlucks = Potluck::all();
        return view('potlucks.index', compact('potlucks'));
    }

    /**
     * Show the form for creating a new potluck.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('potlucks.create');
    }

    /**
     * Store a newly created potluck in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        Potluck::create($request->all());

        return redirect()->route('potlucks.index')->with('success', 'Potluck created successfully.');
    }

    /**
     * Display the specified potluck.
     *
     * @param  \App\Models\Potluck  $potluck
     * @return \Illuminate\View\View
     */
    public function show(Potluck $potluck)
    {
        return view('potlucks.show', compact('potluck'));
    }

    /**
     * Show the form for editing the specified potluck.
     *
     * @param  \App\Models\Potluck  $potluck
     * @return \Illuminate\View\View
     */
    public function edit(Potluck $potluck)
    {
        return view('potlucks.edit', compact('potluck'));
    }

    /**
     * Update the specified potluck in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Potluck  $potluck
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Potluck $potluck)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        $potluck->update($request->all());

        return redirect()->route('potlucks.index')->with('success', 'Potluck updated successfully.');
    }

    /**
     * Remove the specified potluck from storage.
     *
     * @param  \App\Models\Potluck  $potluck
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Potluck $potluck)
    {
        $potluck->delete();

        return redirect()->route('potlucks.index')->with('success', 'Potluck deleted successfully.');
    }
}
