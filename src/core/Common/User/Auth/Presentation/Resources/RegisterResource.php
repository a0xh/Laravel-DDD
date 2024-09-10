<?php declare(strict_types=1);

namespace Core\Common\User\Auth\Presentation\Resources;

use Core\Common\User\Auth\Presentation\Requests\RegisterRequest;
use Illuminate\Http\Resources\Json\JsonResource;

final class RegisterResource extends JsonResource
{
    public function toArray(RegisterRequest $request): array
    {
        return [
            'first_name' => $this->first_name,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
