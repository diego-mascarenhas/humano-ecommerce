@extends('layouts/layoutMaster')

@section('title', __('Orders'))

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
	<div class="d-flex flex-column justify-content-center">
		<h4 class="mb-1 mt-3">{{ __('Orders') }}</h4>
		<p class="text-muted">{{ __('Manage orders') }}</p>
	</div>
</div>

<div class="card p-4">{{ __('Humano Stores orders list placeholder') }}</div>
@endsection


