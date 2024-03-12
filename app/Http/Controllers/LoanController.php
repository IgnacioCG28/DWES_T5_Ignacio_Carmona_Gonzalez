<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Loan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loan::with('loanItem', 'loanUser')->get();

        return view('loans.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
{
    $item = Item::find($request->id);

    return view('loans.create', compact('item'));
}




    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'item_id' => 'required|int',
            'due_date' => 'required|date|after_or_equal:today',
        ]);
        
        $validated['user_id'] = $user->id;
        $validated['checkout_date'] = now();


        Loan::create($validated);

        return redirect()->route('loans.index');
    }




    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Loan $loan)
    {
        $this->authorize('update', $loan);
        $loan->update(['returned_date' => now()]);
        $item = Item::find($loan->item_id);
    

        return redirect()->route('loans.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        //
    }
}
