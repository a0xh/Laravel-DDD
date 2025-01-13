<?php declare(strict_types=1);

namespace Core\Common\Auth\Presentation\Request;

use Core\Shared\Presentation\Request\FormRequest;
use Illuminate\Validation\Rules\Password;

final class RegisterRequest extends FormRequest
{
	public function rules(): array
	{
		$passwordValidation = Password::min(size: 8)->letters()->numbers()->symbols();

		return [
			'first_name' => ['bail', 'required', 'string', 'min:2', 'max:18'],
			'last_name' => ['bail', 'required', 'string', 'min:1', 'max:17'],
			'email' => [
				'bail', 'required', 'email', 'max:255', 'unique:users,email'
			],
			'password' => ['bail', 'required', 'string', $passwordValidation, 'confirmed'],
		];
	}
}
