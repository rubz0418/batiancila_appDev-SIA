<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class FormController extends Controller
{
    public function create(): View
    {
        return view('form.create', [
            'barangays' => Item::BARANGAYS,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'full_name' => ['required', 'string', 'min:3', 'max:120'],
            'email' => ['required', 'email', 'max:160'],
            'age' => ['required', 'numeric', 'min:18', 'max:120'],
            'barangay' => ['required', Rule::in(Item::BARANGAYS)],
            'visit_focus' => ['required', 'in:store-observation,service-check,inventory-note,location-review'],
            'preferred_date' => ['required', 'date', 'after_or_equal:today'],
            'message' => ['required', 'string', 'min:10', 'max:1000'],
        ], [
            'full_name.required' => 'Please enter your complete name.',
            'barangay.required' => 'Please choose the barangay where the shop visit will happen.',
            'visit_focus.required' => 'Please choose the focus of the shop visit log.',
            'preferred_date.after_or_equal' => 'The preferred visit date must be today or later.',
            'message.min' => 'Please add at least 10 characters so the visit details are clear.',
        ]);

        return redirect()
            ->route('form.create')
            ->with('success', 'Your shop visit log request was submitted successfully.');
    }
}
