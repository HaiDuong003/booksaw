<?php

namespace App\MoonShine\Pages;

use Illuminate\Support\Facades\DB;
use MoonShine\Resources\CustomPage;

class OrderPage extends CustomPage
{
	public string $title = 'Order Page';

	public string $alias = 'order';

	public function __construct()
	{
		parent::__construct(
			$this->title(),
			$this->alias(),
			$this->view()
		);
	}

	public function view(): string
	{
		// dd($order);
		return 'admin.order';
	}

	public function datas(): array
	{

		// dd($order);
		return [
			'orders' => DB::table('orders')->where('status', 0)->get(),
		];
	}
}
