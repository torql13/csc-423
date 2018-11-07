<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $ss = "ThisTotallyIsntASecret";

    public function hashPassword($plainTextPass)
    {
        $initialhash = sha1($plainTextPass);
        $finalhash = sha1($initialhash.$this->ss);
        return $finalhash;
    }
}
