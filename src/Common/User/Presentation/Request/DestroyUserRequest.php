<?php declare(strict_types=1);

namespace Core\Common\User\Presentation\Request;

use Core\Shared\Presentation\Request\FormRequest;

final class DestroyUserRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'id' => ['bail', 'required', 'string', 'uuid', 'exists:users,id']
		];
	}

	protected function prepareForValidation(): void
    {
    	if ($this->route('id')) {
            $this->merge(['id' => $this->route('id')]);
        }
    }
}
