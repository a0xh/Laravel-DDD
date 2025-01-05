<?php declare(strict_types=1);

namespace Core\Common\Role\Infrastructure\Repository;

use Core\Common\Role\Domain\Entity\Role;
use Core\Common\Role\Domain\Repository\RoleRepositoryInterface;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\{DB, Log};

final class TransactionRoleRepository implements RoleRepositoryInterface
{
	private private(set) QueryRoleRepository $query;

	public function __construct(QueryRoleRepository $query)
	{
		$this->query = $query;
	}

	public function save(Role $role): void
	{
		try {
	        DB::transaction(
	            callback: fn () => $this->query->save(role: $role),
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
	            message: 'Error Saving Role: ' . $e->getMessage(),
	            code: (int) $e->getCode(),
	            previous: $e
	        );
	    }
	}

	public function delete(Role $role): void
	{
		try {
	        DB::transaction(
	            callback: fn () => $this->query->delete(role: $role),
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
	            message: 'Error Saving Role: ' . $e->getMessage(),
	            code: (int) $e->getCode(),
	            previous: $e
	        );
	    }
	}
}
