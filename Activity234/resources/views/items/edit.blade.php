@extends('layouts.app')

@section('title', 'Edit visit - Hinunangan shop visits')

@section('content')
    <span class="page-eyebrow">Update record</span>
    <h2 class="page-title">Edit {{ $item->shop_name }}</h2>
    <p class="page-lead">Update the saved record and keep the visit log accurate.</p>

    <form method="POST" action="{{ route('items.update', $item) }}" class="form-panel" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('items._form', ['buttonLabel' => 'Update visit'])
    </form>
@endsection
