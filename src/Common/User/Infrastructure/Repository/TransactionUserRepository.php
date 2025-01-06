<?php declare(strict_types=1);

namespace Core\Common\User\Infrastructure\Repository;

use Core\Common\User\Domain\Entity\User;
use Core\Common\User\Domain\Repository\UserRepositoryInterface;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\{DB, Log};

final class TransactionUserRepository implements UserRepositoryInterface
{
	private readonly private(set) QueryUserRepository $query;

	public function __construct(QueryUserRepository $query)
	{
		$this->query = $query;
	}

	public function save(User $user): void
	{
		try {
	        DB::transaction(
	            callback: fn () => $this->query->save(user: $user),
	            attempts: 3
	        );
	    }

	    catch (QueryException $e) {
	        Log::error(
	            message: 'Database Error: ' . $e->getMessage(),
	            context: [
	                'code' => $e->getCode(),
	                'bindings' => $e->getBindings(),
	                'sql' => $e->getSql()
	            ]
	        );

	        throw new \RuntimeException(
	            message: 'Error Saving User: ' . $e->getMessage(),
	            code: (int) $e->getCode(),
	            previous: $e
	        );
	    }
	}

	public function delete(User $user): void
	{
		try {
	        DB::transaction(
	            callback: fn () => $this->query->delete(user: $user),
	            attempts: 3
	        );
	    }

	    catch (QueryException $e) {
	        Log::error(
	            message: 'Database Error: ' . $e->getMessage(),
	            context: [
	                'code' => $e->getCode(),
	                'bindings' => $e->getBindings(),
	                'sql' => $e->getSql()
	            ]
	        );

	        throw new \RuntimeException(
	            message: 'Error Saving User: ' . $e->getMessage(),
	            code: (int) $e->getCode(),
	            previous: $e
	        );
	    }
	}
}
