<?php declare(strict_types=1);

namespace Core\Common\Account\Infrastructure\Repository;

use Core\Common\Account\Domain\Repository\RepositoryInterface;
use Core\Common\Account\Domain\Entity\UserEntity;
use Core\Common\Account\Domain\Aggregate\AccountAggregate;
use Core\Shared\Domain\ValueObject\User\UserId;
use Core\Shared\Infrastructure\Eloquent\User as UserEloquent;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\{DB, Log};

final class EloquentRepository implements RepositoryInterface
{
    private readonly UserEloquent $eloquent;

    public function __construct(UserEloquent $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function all(): array
    {
        return $this->eloquent->query()->withOnly(
            relations: 'roles'
        )->orderBy(
            column: 'created_at',
            direction: 'desc'
        )->get(
            columns: [
                'id',
                'avatar',
                'first_name',
                'last_name',
                'email',
                'created_at',
                'updated_at',
                'status',
            ]
        )->all();
    }

    public function find(UserId $id): UserEloquent
    {
        return $this->eloquent->query()->findOrFail(
            id: $id->asString(),
            columns: [
                'id',
                'avatar',
                'first_name',
                'last_name',
                'email',
                'created_at',
                'status',
            ]
        );
    }

    public function save(AccountAggregate $aggregate): bool
    {
        try {
            return DB::transaction(
                callback: function() use($aggregate) {
                    $user = $this->eloquent->query()->updateOrCreate(
                        attributes: ['id' => $aggregate->getId()],
                        values: $aggregate
                    );

                    return $user->roles()->sync(
                        ids: $aggregate->roles()->getId()
                    );
                },
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
                code: $e->getCode(),
                previous: $e
            );
        } catch (\Exception $e) {
            Log::error(
                message: 'General Error: ' . $e->getMessage(),
                context: [
                    'code' => $e->getCode()
                ]
            );

            throw new \RuntimeException(
                message: 'Unknown Error Occurred While Saving User.',
                code: 500,
                previous: $e
            );
        }
    }

    public function remove(UserId $id): bool
    {
        try {
            return DB::transaction(
                callback: function() use($id) {
                    return $this->eloquent->query()->where(
                        column: 'id',
                        operator: '=',
                        value: $id->asString()
                    )->delete();
                },
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
                message: 'Error Deleting User: ' . $e->getMessage(),
                code: $e->getCode(),
                previous: $e
            );
        } catch (\Exception $e) {
            Log::error(
                message: 'General Error: ' . $e->getMessage(),
                context: [
                    'code' => $e->getCode()
                ]
            );

            throw new \RuntimeException(
                message: 'Unknown Error Occurred While Deleting User.',
                code: 500,
                previous: $e
            );
        }
    }
}
