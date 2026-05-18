@if ($errors->any())
    <div class="alert alert-error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-grid">
    <div class="field">
        <label for="shop_name">Shop name</label>
        <input id="shop_name" type="text" name="shop_name" value="{{ old('shop_name', $item->shop_name ?? '') }}" required minlength="3">
        @error('shop_name')
            <span class="field-error">{{ $message }}</span>
        @enderror
    </div>

    <div class="field">
        <label for="description">Shop category or description</label>
        <input id="description" type="text" name="description" value="{{ old('description', $item->description ?? '') }}" required>
        @error('description')
            <span class="field-error">{{ $message }}</span>
        @enderror
    </div>

    <div class="field">
        <label for="location">Location</label>
        <select id="location" name="location" required>
            <option value="">Choose barangay</option>
            @foreach ($barangays as $barangay)
                <option value="{{ $barangay }}" @selected(old('location', $item->location ?? '') === $barangay)>{{ $barangay }}</option>
            @endforeach
        </select>
        @error('location')
            <span class="field-error">{{ $message }}</span>
        @enderror
    </div>

    <div class="field">
        <label for="time_on_site">Time on site</label>
        <select id="time_on_site" name="time_on_site" required>
            @foreach (['15 minutes', '30 minutes', '45 minutes', '1 hour', '2 hours', 'More than 2 hours'] as $option)
                <option value="{{ $option }}" @selected(old('time_on_site', $item->time_on_site ?? '') === $option)>{{ $option }}</option>
            @endforeach
        </select>
        @error('time_on_site')
            <span class="field-error">{{ $message }}</span>
        @enderror
    </div>

    <div class="field">
        <label for="visit_date">Visit date</label>
        <input id="visit_date" type="date" name="visit_date" value="{{ old('visit_date', isset($item) ? $item->visit_date?->format('Y-m-d') : '') }}" required>
        @error('visit_date')
            <span class="field-error">{{ $message }}</span>
        @enderror
    </div>

    <div class="field">
        <label for="image">Image upload</label>
        <input id="image" type="file" name="image" accept="image/*">
        @isset($item)
            @if ($item->image)
                <span class="field-hint">Current image: {{ $item->image }}</span>
            @endif
        @endisset
        @error('image')
            <span class="field-error">{{ $message }}</span>
        @enderror
    </div>

    <div class="field field-full">
        <label for="purpose">Purpose of visit</label>
        <textarea id="purpose" name="purpose" required minlength="10">{{ old('purpose', $item->purpose ?? '') }}</textarea>
        @error('purpose')
            <span class="field-error">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="actions" style="margin-top: 1rem;">
    <button type="submit" class="btn">{{ $buttonLabel }}</button>
    <a href="{{ route('items.index') }}" class="btn btn-outline">Cancel</a>
</div>
