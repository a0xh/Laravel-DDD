<?php declare(strict_types=1);

namespace Core\Web\Shared\Presentation\Actions;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseAction;

class Action extends BaseAction
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
