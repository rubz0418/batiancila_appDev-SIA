@extends('layouts.app')

@section('title', $item->shop_name.' - Hinunangan shop visits')

@push('styles')
<style>
    .detail-back { margin-bottom: 1.5rem; }
    .detail-photo {
        width: 100%;
        margin: 0 auto 1.25rem;
        padding: clamp(0.5rem, 2vw, 1rem);
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-md);
        background: linear-gradient(180deg, #eef2f6 0%, #e2e8f0 100%);
        border: 1px solid var(--card-border);
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 160px;
    }
    .detail-photo img {
        max-width: 100%;
        max-height: min(72vh, 720px);
        width: auto;
        height: auto;
        display: block;
        object-fit: contain;
    }
    .detail-hero {
        padding: 1.75rem 1.75rem 1.5rem;
        background: linear-gradient(135deg, var(--bg-0) 0%, #1e3a5f 55%, var(--bg-1) 100%);
        border-radius: var(--radius-lg);
        color: #fff;
        margin-bottom: 1.75rem;
        box-shadow: 0 16px 48px rgba(15, 23, 42, 0.2);
    }
    .detail-hero .page-eyebrow { color: #5eead4; }
    .detail-hero h2 {
        margin: 0;
        font-size: clamp(1.35rem, 3.5vw, 1.75rem);
        font-weight: 700;
        letter-spacing: -0.03em;
        line-height: 1.25;
    }
    .detail-hero__lead {
        margin: 0.75rem 0 0;
        font-size: 0.9375rem;
        color: var(--text-on-dark-muted);
        max-width: 32rem;
        line-height: 1.5;
    }
    .detail-grid {
        display: grid;
        gap: 1rem;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    }
    .detail-tile {
        padding: 1.25rem 1.35rem;
        background: var(--card);
        border: 1px solid var(--card-border);
        border-radius: var(--radius-md);
        box-shadow: var(--shadow-sm);
    }
    .detail-tile dt {
        font-size: 0.6875rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--text-muted);
        margin: 0 0 0.4rem;
    }
    .detail-tile dd {
        margin: 0;
        font-size: 1rem;
        font-weight: 500;
        color: var(--text);
        line-height: 1.5;
    }
    .detail-tile--wide { grid-column: 1 / -1; }
</style>
@endpush

@section('content')
    <div class="detail-back actions">
        <a href="{{ route('items.index') }}" class="btn btn-outline">Back to all visits</a>
        <a href="{{ route('items.edit', $item) }}" class="btn">Edit record</a>
    </div>

    <figure class="detail-photo">
        <img src="{{ asset($item->image ?: 'images/shops/mr-diy.png') }}" alt="Photo of {{ $item->shop_name }}, Hinunangan" decoding="async">
    </figure>

    <div class="detail-hero">
        <span class="page-eyebrow">Visit detail</span>
        <h2>{{ $item->shop_name }}</h2>
        <p class="detail-hero__lead">{{ $item->description }} - {{ $item->location }}, Southern Leyte</p>
    </div>

    <dl class="detail-grid">
        <div class="detail-tile">
            <dt>Visit date</dt>
            <dd>{{ $item->visit_date?->format('F d, Y') }}</dd>
        </div>
        <div class="detail-tile">
            <dt>Description</dt>
            <dd>{{ $item->description }}</dd>
        </div>
        <div class="detail-tile detail-tile--wide">
            <dt>Location</dt>
            <dd>{{ $item->location }} (Municipality of Hinunangan)</dd>
        </div>
        <div class="detail-tile detail-tile--wide">
            <dt>Purpose</dt>
            <dd>{{ $item->purpose }}</dd>
        </div>
        <div class="detail-tile">
            <dt>Time on site</dt>
            <dd>{{ $item->time_on_site }}</dd>
        </div>
        <div class="detail-tile">
            <dt>Image path</dt>
            <dd>{{ $item->image ?: 'Default shop image' }}</dd>
        </div>
    </dl>
@endsection
