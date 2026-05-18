@extends('layouts.app')

@section('title', 'Activity 4 - Shop visit log form')

@section('content')
    <span class="page-eyebrow">Activity 4</span>
    <h2 class="page-title">Shop visit log form</h2>
    <p class="page-lead">A custom Laravel form for collecting shop visit log details with POST handling, CSRF protection, validation, old input, and clear error display.</p>

    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('form.store') }}" class="form-panel">
        @csrf

        <div class="form-grid">
            <div class="field">
                <label for="full_name">Full name</label>
                <input id="full_name" type="text" name="full_name" value="{{ old('full_name') }}" required minlength="3">
                @error('full_name')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="email">Email address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="age">Age</label>
                <input id="age" type="number" name="age" value="{{ old('age') }}" min="18" required>
                @error('age')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="barangay">Shop barangay</label>
                <select id="barangay" name="barangay" required>
                    <option value="">Choose barangay</option>
                    @foreach ($barangays as $barangay)
                        <option value="{{ $barangay }}" @selected(old('barangay') === $barangay)>{{ $barangay }}</option>
                    @endforeach
                </select>
                @error('barangay')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="visit_focus">Visit focus</label>
                <select id="visit_focus" name="visit_focus" required>
                    <option value="">Choose one</option>
                    <option value="store-observation" @selected(old('visit_focus') === 'store-observation')>Store observation</option>
                    <option value="service-check" @selected(old('visit_focus') === 'service-check')>Service check</option>
                    <option value="inventory-note" @selected(old('visit_focus') === 'inventory-note')>Inventory note</option>
                    <option value="location-review" @selected(old('visit_focus') === 'location-review')>Location review</option>
                </select>
                @error('visit_focus')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="preferred_date">Preferred visit date</label>
                <input id="preferred_date" type="date" name="preferred_date" value="{{ old('preferred_date') }}" required>
                @error('preferred_date')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="field field-full">
                <label for="message">Visit notes</label>
                <textarea id="message" name="message" required minlength="10">{{ old('message') }}</textarea>
                @error('message')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="actions" style="margin-top: 1rem;">
            <button type="submit" class="btn">Submit visit log</button>
            <a href="{{ route('items.index') }}" class="btn btn-outline">Back to records</a>
        </div>
    </form>
@endsection
