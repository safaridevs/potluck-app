<?php

namespace App\Http\Controllers;

use App\Models\Potluck;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Show the form for creating a new item.
     *
     * @param  \App\Models\Potluck  $potluck
     * @return \Illuminate\View\View
     */
    public function create(Potluck $potluck)
    {
        $categories = Category::all();
        return view('items.create', compact('potluck', 'categories'));
    }

    /**
     * Store a newly created item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Potluck  $potluck
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Potluck $potluck)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
        ]);

        $potluck->items()->create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('potlucks.show', $potluck)->with('success', 'Item added successfully.');
    }
}
