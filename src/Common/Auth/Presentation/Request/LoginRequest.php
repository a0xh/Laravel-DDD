<?php declare(strict_types=1);

namespace Core\Common\Auth\Presentation\Request;

use Core\Shared\Presentation\Request\FormRequest;
use Illuminate\Validation\Rules\Password;

final class LoginRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'email' => [
				'bail', 'required', 'email', 'max:255', 'exists:users,email'
			],
			'password' => ['bail', 'required', 'string', 'min:8'],
		];
	}
}
