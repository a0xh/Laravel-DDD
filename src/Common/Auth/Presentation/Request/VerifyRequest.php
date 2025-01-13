<?php declare(strict_types=1);

namespace Core\Common\Auth\Presentation\Request;

use Core\Shared\Presentation\Request\FormRequest;
use Illuminate\Validation\Rules\Password;

final class VerifyRequest extends FormRequest
{
	public function rules(): array
	{
		return [
            'expires' => ['bail', 'required', 'integer'],
            'signature' => ['bail', 'required', 'string', 'max:255'],
            'hash' => ['bail', 'required', 'string'],
        ];
	}
}
