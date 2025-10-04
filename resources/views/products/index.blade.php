@extends('layouts/layoutMaster')

@section('title', __('Products'))

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
	<div class="d-flex flex-column justify-content-center">
		<h4 class="mb-1 mt-3">{{ __('Products') }}</h4>
		<p class="text-muted">{{ __('Manage your products') }}</p>
	</div>
	<div class="mt-3 mt-md-0">
		<a href="{{ route('products.create') }}" class="btn btn-primary"><i class="ti ti-plus me-1"></i> {{ __('Add Product') }}</a>
	</div>
</div>

<div class="card p-4">{{ __('Humano Stores products list placeholder') }}</div>
@endsection


