<?php declare(strict_types=1);

namespace Core\Shared\Presentation\Actions;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseAction;

class Action extends BaseAction
{
    use AuthorizesRequests, ValidatesRequests;
}
