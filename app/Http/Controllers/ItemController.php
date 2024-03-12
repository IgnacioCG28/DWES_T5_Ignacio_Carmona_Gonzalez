<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Item::with('ItemBox')->orderBy('box_id');

        if (request()->has('search')) {
            $query->where('name', 'like', '%' . request()->get('search', '') . '%');
        }

        $items = $query->get();

        return view("items.index", compact('items'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string|max:255',
            'price' => 'required|numeric',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
        ]);

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('pictures', 'public');
            $validated['picture'] = $path;


        }

        Item::create($validated);

        return redirect('items')->with('success', 'Item created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        $item->load('itemBox', 'itemLoan');
        $box = $item->itemBox;
        $loan = $item->itemLoan;

        return view('items.show', compact('box', 'item', 'loan'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item, Box $box)
    {
        $this->authorize('update', $item);

        $boxes = Box::all();

        return view('items.update', compact('item', 'boxes'));
    }

    public function update(Request $request, Item $item)
    {
        $this->authorize('update', $item);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'picture' => 'image|nullable',
            'price' => 'nullable|numeric',
            'box_id' => 'nullable|exists:boxes,id'

        ]);

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('pictures', 'public');
            $validated['picture'] = $path;


        }

        $item->update($validated);

        return redirect(route('items.show', $item));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $this->authorize('delete', $item);

        if ($item->picture) {
            Storage::delete($item->picture);
        }

        $item->itemLoan()->delete();
        $item->delete();

        return redirect(route('items.index'));
    }


}
