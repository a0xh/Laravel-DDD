<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Presentation\Request;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'avatar' => [
                'bail', 'nullable', 'image', 'dimensions:max_width=1024,max_height=1024'
            ],
            'first_name' => [
                'bail', 'required', 'string', 'min:4', 'max:44'
            ],
            'last_name' => [
                'bail', 'nullable', 'string', 'min:4', 'max:44'
            ],
            'email' => [
                'bail', 'required', 'email:rfc,strict,spoof,dns', 'max:255', 'unique:users,email'
            ],
            'password' => [
                'bail', 'required', 'string', 'min:8', 'confirmed'
            ],
            'status' => [
                'bail', 'required', 'boolean', 'in:0,1'
            ],
            'role_id' => [
                'bail', 'required', 'string', 'max:255'
            ],
        ];
    }
}
