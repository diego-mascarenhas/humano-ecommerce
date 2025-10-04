<?php

namespace Idoneo\HumanoEcommerce\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class ProductController extends BaseController
{
	public function index()
	{
		return view('humano-ecommerce::products.index');
	}

	public function create()
	{
		return view('humano-ecommerce::products.create');
	}
}


