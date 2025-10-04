@extends('layouts/layoutMaster')

@section('title', __('Order Details'))

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
	<div class="d-flex flex-column justify-content-center">
		<h4 class="mb-1 mt-3">{{ __('Order Details') }}</h4>
		<p class="text-muted">{{ __('View order summary and items') }}</p>
	</div>
</div>

<div class="card p-4">{{ __('Humano Stores order details placeholder') }} #{{ $orderId }}</div>
@endsection


