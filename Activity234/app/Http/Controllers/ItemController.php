<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ItemController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('search')->trim()->toString();

        $items = Item::query()
            ->when($search, function ($query) use ($search) {
                $query->where('shop_name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%");
            })
            ->latest('visit_date')
            ->paginate(6)
            ->withQueryString();

        return view('items.index', compact('items', 'search'));
    }

    public function create(): View
    {
        return view('items.create', [
            'barangays' => Item::BARANGAYS,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateItem($request);
        $validated['image'] = $this->storeUploadedImage($request);

        Item::create($validated);

        return redirect()
            ->route('items.index')
            ->with('success', 'Shop visit record added successfully.');
    }

    public function show(Item $item): View
    {
        return view('items.show', compact('item'));
    }

    public function edit(Item $item): View
    {
        return view('items.edit', [
            'barangays' => Item::BARANGAYS,
            'item' => $item,
        ]);
    }

    public function update(Request $request, Item $item): RedirectResponse
    {
        $validated = $this->validateItem($request);
        $validated['image'] = $this->storeUploadedImage($request) ?? $item->image;

        $item->update($validated);

        return redirect()
            ->route('items.show', $item)
            ->with('success', 'Shop visit record updated successfully.');
    }

    public function destroy(Item $item): RedirectResponse
    {
        $item->delete();

        return redirect()
            ->route('items.index')
            ->with('success', 'Shop visit record deleted successfully.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validateItem(Request $request): array
    {
        return $request->validate([
            'shop_name' => ['required', 'string', 'min:3', 'max:120'],
            'description' => ['required', 'string', 'min:3', 'max:160'],
            'location' => ['required', Rule::in(Item::BARANGAYS)],
            'purpose' => ['required', 'string', 'min:10', 'max:1000'],
            'time_on_site' => ['required', 'string', 'max:60'],
            'visit_date' => ['required', 'date'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);
    }

    private function storeUploadedImage(Request $request): ?string
    {
        if (! $request->hasFile('image')) {
            return null;
        }

        $file = $request->file('image');
        $filename = Str::slug($request->string('shop_name')->toString())
            . '-'
            . now()->format('YmdHis')
            . '.'
            . $file->getClientOriginalExtension();

        $file->move(public_path('images/shops'), $filename);

        return 'images/shops/'.$filename;
    }
}
