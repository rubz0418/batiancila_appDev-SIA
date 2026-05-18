@extends('layouts.app')

@section('title', 'Add visit - Hinunangan shop visits')

@section('content')
    <span class="page-eyebrow">Create record</span>
    <h2 class="page-title">Add a shop visit</h2>
    <p class="page-lead">This form saves a new shop visit into the database with Laravel validation.</p>

    <form method="POST" action="{{ route('items.store') }}" class="form-panel" enctype="multipart/form-data">
        @csrf
        @include('items._form', ['buttonLabel' => 'Save visit'])
    </form>
@endsection
