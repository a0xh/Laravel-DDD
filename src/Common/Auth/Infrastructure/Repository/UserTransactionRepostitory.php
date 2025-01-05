<?php declare(strict_types=1);

namespace Core\Common\Account\Infrastructure\Repository;

use Illuminate\Support\Facades\{Log, DB};
use App\Repositories\Interface\UserRepostitoryInterface;
use Illuminate\Database\QueryException;
use App\Repositories\Eloquent\UserEloquentRepostitory;
use Illuminate\Support\Str;

final class UserTransactionRepostitory implements UserRepostitoryInterface
{
	private readonly UserEloquentRepostitory $transaction;

	public function __construct(UserEloquentRepostitory $eloquent)
	{
		$this->transaction = $eloquent;
	}

	public function create(array $attributes): bool
	{
		try {
            return DB::transaction(
                callback: function() use($attributes): bool {
                    return $this->transaction->create(attributes: $attributes);
                },
                attempts: 3
            );
        }

        catch (QueryException $e) {
            Log::error(
                message: Str::of(
                    value: 'Ошибка добавления пользователя: '
                )->finish(
                    cap: $e->getMessage()
                )->toString(),
                context: [
                    'code' => (int) $e->getCode(),
                    'bindings' => $e->getBindings(),
                    'sql' => $e->getSql()
                ]
            );

            throw new \RuntimeException(
                message: Str::of(
                    value: 'Транзакция добавления пользователя не прошла: '
                )->finish(
                    cap: $e->getMessage()
                )->toString(),
                code: (int) $e->getCode(),
                previous: $e
            );
        }
	}

	public function update(int $id, array $values): bool
	{
		try {
            return DB::transaction(
                callback: function() use($id, $values): bool {
                    return $this->transaction->update(id: $id, values: $values);
                },
                attempts: 3
            );
        }

        catch (QueryException $e) {
            Log::error(
                message: Str::of(
                    value: 'Ошибка обновлении пользователя: '
                )->finish(
                    cap: $e->getMessage()
                )->toString(),
                context: [
                    'code' => (int) $e->getCode(),
                    'bindings' => $e->getBindings(),
                    'sql' => $e->getSql()
                ]
            );

            throw new \RuntimeException(
                message: Str::of(
                    value: 'Транзакция обновления пользователя не прошла: '
                )->finish(
                    cap: $e->getMessage()
                )->toString(),
                code: (int) $e->getCode(),
                previous: $e
            );
        }
	}

	public function delete(int $id): bool
    {
		try {
            return DB::transaction(
                callback: function() use($id): bool {
                    return $this->transaction->delete(id: $id);
                },
                attempts: 3
            );
        }

        catch (QueryException $e) {
            Log::error(
                message: Str::of(
                    value: 'Ошибка удаления пользователя: '
                )->finish(
                    cap: $e->getMessage()
                )->toString(),
                context: [
                    'code' => (int) $e->getCode(),
                    'bindings' => $e->getBindings(),
                    'sql' => $e->getSql()
                ]
            );

            throw new \RuntimeException(
                message: Str::of(
                    value: 'Транзакция удаления пользователя не прошла: '
                )->finish(
                    cap: $e->getMessage()
                )->toString(),
                code: (int) $e->getCode(),
                previous: $e
            );
        }
    }
}
