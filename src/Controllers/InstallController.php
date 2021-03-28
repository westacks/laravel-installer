<?php

namespace WeStacks\Laravel\Installer\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use WeStacks\Laravel\Installer\Helpers\RequirementsChecker;

class InstallController extends Controller
{
    public function requirements()
    {
        $requirements = RequirementsChecker::requirements(config('installer.requirements'));
        return view('installer::requirements', compact('requirements'));
    }

    public function permissions()
    {
        $permissions = RequirementsChecker::permissions(config('installer.permissions'));
        return view('installer::permissions', compact('permissions'));
    }

    public function env()
    {
        return view('installer::env-select');
    }

    public function env_editor()
    {
        $env = file_get_contents(app()->environmentFilePath());
        return view('installer::env-editor', compact('env'));
    }

    public function env_wizard()
    {
        return view('installer::env-wizard');
    }
}