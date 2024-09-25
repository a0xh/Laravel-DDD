<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Application\Command;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;

final class UpdateUserCommand
{
    public function __construct(
        public readonly string $firstName,
        public readonly ?string $lastName,
        public readonly string $email,
        public readonly string $password,
        public readonly ?UploadedFile $avatar,
        public readonly string $status,
        public readonly string $roleId
    ) {}

    public function toArray(): array
    {
    	return [
            'avatar' => $this->avatar,
            'firstName' => $this->firstName,
    		'lastName' => $this->lastName,
            'status' => $this->status,
            'email' => $this->email,
            'role_id' => $this->roleId,
            'password' => Hash::make(
                value: $this->password,
                options: []
            )
    	];
    }
}
