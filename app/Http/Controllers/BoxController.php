<?php

namespace App\Http\Controllers;

use App\Models\Box;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Box::orderBy('label');
    
        if (request()->has('search')) {
            $query->where('label', 'like', '%' . request()->get('search', '') . '%');
        }
    
        $boxes = $query->get();
    
        return view("boxes.index", compact('boxes'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('boxes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        Box::create($validated);

        return redirect()->route('boxes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Box $box)
    {
        $box->load('BoxItems');
        $items = $box->BoxItems;

        return view('boxes.show', compact('box', 'items'));
    }





    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Box $box)
    {
        $this->authorize('update', $box);

        return view('boxes.update', compact('box'));
    }

    public function update(Request $request, Box $box)
    {
        $this->authorize('update', $box);

        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'location' => 'required|string|max:255'
        ]);

        $box->update($validated);

        return redirect(route('boxes.index'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Box $box)
    {
        $this->authorize('delete', $box);

        $box->BoxItems()->update(['box_id'=>null]);
        $box->delete();

        return redirect(route('boxes.index'));
    }
}
