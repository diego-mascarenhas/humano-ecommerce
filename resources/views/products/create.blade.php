@extends('layouts/layoutMaster')

@section('title', __('Add Product'))

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
	<div class="d-flex flex-column justify-content-center">
		<h4 class="mb-1 mt-3">{{ __('Add Product') }}</h4>
		<p class="text-muted">{{ __('Create a new product') }}</p>
	</div>
</div>

<div class="card p-4">{{ __('Humano Stores product create placeholder') }}</div>
@endsection


