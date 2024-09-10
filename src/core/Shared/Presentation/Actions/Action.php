<?php declare(strict_types=1);

namespace Core\Shared\Presentation\Actions;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Action extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
