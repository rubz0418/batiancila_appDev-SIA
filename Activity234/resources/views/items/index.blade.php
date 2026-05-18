@extends('layouts.app')

@section('title', 'All visits - Hinunangan shop visits')

@push('styles')
<style>
    .toolbar {
        display: flex;
        align-items: end;
        justify-content: space-between;
        gap: 1rem;
        flex-wrap: wrap;
        margin-bottom: 1.25rem;
    }
    .search-form {
        display: flex;
        gap: 0.65rem;
        flex-wrap: wrap;
    }
    .search-form input {
        min-width: min(320px, 100%);
        border: 1px solid rgba(15, 23, 42, 0.14);
        border-radius: 999px;
        padding: 0.65rem 0.9rem;
        font: inherit;
        background: #fff;
    }
    .visit-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    .visit-card {
        display: grid;
        grid-template-columns: 104px minmax(0, 1fr) auto;
        align-items: center;
        gap: 1rem;
        padding: 1rem 1.15rem 1rem 1rem;
        background: var(--card);
        border: 1px solid var(--card-border);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-md);
        color: inherit;
    }
    .visit-card__thumb {
        width: 104px;
        height: 80px;
        border-radius: 12px;
        overflow: hidden;
        background: linear-gradient(180deg, #eef2f6 0%, #e2e8f0 100%);
        border: 1px solid var(--card-border);
        display: grid;
        place-items: center;
        padding: 4px;
    }
    .visit-card__thumb img {
        max-width: 100%;
        max-height: 100%;
        width: auto;
        height: auto;
        object-fit: contain;
        display: block;
    }
    .visit-card__title {
        margin: 0;
        font-size: 1.125rem;
        font-weight: 700;
        letter-spacing: -0.02em;
    }
    .visit-card__desc {
        margin: 0.35rem 0 0;
        font-size: 0.875rem;
        color: var(--text-muted);
        line-height: 1.4;
    }
    .visit-card__meta {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-top: 0.65rem;
    }
    .pill {
        display: inline-flex;
        align-items: center;
        padding: 0.25rem 0.65rem;
        font-size: 0.75rem;
        font-weight: 600;
        border-radius: 999px;
        background: #f1f5f9;
        color: var(--text-muted);
    }
    .pill--accent {
        background: var(--accent-soft);
        color: #0f766e;
    }
    .card-actions {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        flex-wrap: wrap;
        justify-content: flex-end;
    }
    .link-button {
        border: 0;
        background: transparent;
        color: #b91c1c;
        font: inherit;
        font-weight: 700;
        cursor: pointer;
        padding: 0.25rem;
    }
    .empty-state {
        padding: 2rem;
        background: var(--card);
        border: 1px solid var(--card-border);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm);
    }
    .pagination {
        margin-top: 1.5rem;
    }
    @media (max-width: 720px) {
        .visit-card {
            grid-template-columns: 84px minmax(0, 1fr);
        }
        .visit-card__thumb {
            width: 84px;
            height: 70px;
        }
        .card-actions {
            grid-column: 1 / -1;
            justify-content: flex-start;
        }
    }
</style>
@endpush

@section('content')
    <span class="page-eyebrow">CRUD directory</span>
    <h2 class="page-title">Hinunangan shop visit records</h2>
    <p class="page-lead">Add, view, update, delete, search, and paginate real records saved in the database.</p>

    <div class="toolbar">
        <form method="GET" action="{{ route('items.index') }}" class="search-form">
            <input type="search" name="search" value="{{ old('search', $search) }}" placeholder="Search shop, category, or location">
            <button type="submit" class="btn">Search</button>
            @if ($search)
                <a href="{{ route('items.index') }}" class="btn btn-outline">Clear</a>
            @endif
        </form>
        <a href="{{ route('items.create') }}" class="btn">Add new visit</a>
    </div>

    @if ($items->count())
        <ul class="visit-list">
            @foreach ($items as $item)
                <li class="visit-card">
                    <div class="visit-card__thumb">
                        <img src="{{ asset($item->image ?: 'images/shops/mr-diy.png') }}" alt="{{ $item->shop_name }} in Hinunangan" loading="lazy" decoding="async">
                    </div>
                    <div>
                        <h3 class="visit-card__title">{{ $item->shop_name }}</h3>
                        <p class="visit-card__desc">{{ $item->description }}</p>
                        <div class="visit-card__meta">
                            <span class="pill pill--accent">{{ $item->visit_date?->format('M d, Y') }}</span>
                            <span class="pill">{{ $item->location }}</span>
                        </div>
                    </div>
                    <div class="card-actions">
                        <a href="{{ route('items.show', $item) }}">View</a>
                        <a href="{{ route('items.edit', $item) }}">Edit</a>
                        <form method="POST" action="{{ route('items.destroy', $item) }}" onsubmit="return confirm('Delete this shop visit record?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="link-button">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="pagination">
            {{ $items->links() }}
        </div>
    @else
        <div class="empty-state">
            <strong>No visit records yet.</strong>
            <p>Add your first shop visit record to start the database-backed CRUD system.</p>
            <a href="{{ route('items.create') }}" class="btn">Add first visit</a>
        </div>
    @endif
@endsection
