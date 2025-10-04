<?php

namespace Idoneo\HumanoEcommerce\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class OrderController extends BaseController
{
	public function index()
	{
		return view('humano-ecommerce::orders.index');
	}

	public function show($order)
	{
		return view('humano-ecommerce::orders.show', ['orderId' => $order]);
	}
}


