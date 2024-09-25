<?php declare(strict_types=1);

namespace Core\Shared\Infrastructure\Illuminate;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Request;

final class Paginator extends LengthAwarePaginator
{
	public function __construct(array $collection) {
		parent::__construct(
			items: collect(value: $collection)->slice(
				offset: (Request::get(
					key: 'page',
					default: 1
				) - 1) * 10,
				length: 10
			)->values()->all(),
			total: count(value: $collection),
			perPage: 10,
			currentPage: Request::get(
				key: 'page',
				default: 1
			),
			options: [
			    'path' => Request::url(),
			    'query' => Request::query()
			]
		);
	}
}