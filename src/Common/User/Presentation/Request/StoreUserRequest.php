<?php declare(strict_types=1);

namespace Core\Common\User\Presentation\Request;

use Core\Shared\Presentation\Request\FormRequest;
use Illuminate\Validation\Rules\Password;

final class StoreUserRequest extends FormRequest
{
	public function rules(): array
	{
		$passwordValidation = Password::min(size: 8)->letters()->numbers()->symbols();

		return [
			'first_name' => ['bail', 'required', 'string', 'min:2', 'max:18'],
			'last_name' => ['bail', 'required', 'string', 'min:1', 'max:17'],
			'patronymic' => ['bail', 'nullable', 'string', 'min:6', 'max:19'],
			'phone' => ['bail', 'nullable', 'string', 'min:11', 'max:20', 'unique:users,phone'],
			'email' => [
				'bail', 'required', 'email:rfc,strict,spoof,dns', 'max:255', 'unique:users,email'
			],
			'password' => ['bail', 'required', 'string', $passwordValidation, 'confirmed'],
			'is_active' => ['bail', 'required', 'boolean'],
			'role_id' => ['bail', 'required', 'string', 'uuid', 'exists:roles,id'],
		];
	}

	protected function prepareForValidation(): void
    {
        if ($this->has('is_active')) {
            $this->merge(input: ['is_active' => filter_var(
            	value: $this->is_active,
                filter: FILTER_VALIDATE_BOOLEAN,
                options: FILTER_NULL_ON_FAILURE
            )]);
        }
    }
}
