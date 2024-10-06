<?php declare(strict_types=1);

namespace Core\Shared\Infrastructure\Illuminate;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Request;

final class Paginator extends LengthAwarePaginator
{
	public function __construct(array $items, int $perPage = 10)
	{
		parent::__construct(
			items: collect(value: $items)->slice(
				offset: (Request::get(
					key: 'page',
					default: 1
				) - 1) * $perPage,
				length: $perPage
			)->all(),
			total: count(value: $items),
			perPage: $perPage,
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