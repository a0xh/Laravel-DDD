<?php declare(strict_types=1);

namespace Core\Common\Auth\Presentation\Request;

use Core\Shared\Presentation\Request\FormRequest;

final class LogoutRequest extends FormRequest
{
	public function rules(): array
	{
		return [];
	}
}
