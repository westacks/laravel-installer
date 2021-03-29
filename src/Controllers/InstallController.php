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

    public function env_editor_save(Request $request)
    {
        $request->validate([
            'env' => 'required|regex:/^[0-9A-Z_]*=.*$/gm'
        ]);

        file_put_contents(app()->environmentFilePath(), $request->input('env'));
        return redirect()->route('install.finish');
    }

    public function env_wizard()
    {
        $variables = config('installer.should_config');

        foreach ($variables as $var => $description) {
            $variables[$var] = [
                'label' => $description,
                'value' => getenv($var)
            ];
        }
        return view('installer::env-wizard', compact('variables'));
    }

    public function env_wizard_save(Request $request)
    {
        $variables = config('installer.should_config');

        foreach ($variables as $var => $description) {
            $variables[$var] = 'required|string';
        }
        $request->validate($variables);

        foreach ($request->all() as $key => $value) {
            $this->putenv($key, $value);
        }

        return redirect()->route('install.finish');
    }

    public function finish()
    {
        return view('installer::finish');
    }

    public function complete()
    {
        $this->putenv('APP_CONFIGURED', 'true');
        return redirect('/');
    }

    private function putenv(string $key, string $value = '')
    {
        if (!file_exists($path = app()->environmentFilePath())) {
            return false;
        }

        if (!preg_match("/^$key=.*$/m", file_get_contents($path))) {
            file_put_contents($path, PHP_EOL."$key=$value".PHP_EOL, FILE_APPEND);
        }

        else {
            file_put_contents($path, preg_replace(
                "/^$key=.*$/m",
                "$key=$value",
                file_get_contents($path)
            ));
        }

        return true;
    }
}
