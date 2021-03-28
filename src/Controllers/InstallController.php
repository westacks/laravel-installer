<?php

namespace WeStacks\Laravel\Installer\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use WeStacks\Laravel\Installer\Helpers\RequirementsChecker;

class InstallController extends Controller
{
    public function requirements()
    {
        $requirements = RequirementsChecker::check(config('installer.requirements'));
        return view('installer::requirements', compact('requirements'));
    }
}