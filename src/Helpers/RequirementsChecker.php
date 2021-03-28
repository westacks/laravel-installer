<?php

namespace WeStacks\Laravel\Installer\Helpers;

class RequirementsChecker
{
    public static function permissions(array $permissions)
    {
        $results = [ 'errors' => false ];

        foreach ($permissions as $folder => $permission) {
            static::setPermission(
                $results, $folder, $permission, 
                substr(sprintf('%o', fileperms(base_path($folder))), -4) >= $permission
            );
        }

        return $results;
    } 

    public static function requirements(array $requirements)
    {
        $results = [ 'errors' => false ];

        foreach ($requirements as $type => $requirement) {
            switch ($type) {
                case 'php_version':
                    static::setRequirements(
                        $results, 'php', 'version',
                        version_compare(phpversion(), $requirement, '>=')
                    );
                    break;

                case 'php':
                    foreach ($requirements['php'] as $requirement) {
                        static::setRequirements(
                            $results, $type, $requirement,
                            extension_loaded($requirement)
                        );
                    }
                    break;

                case 'apache':
                    if (function_exists('apache_get_modules')) {
                        foreach ($requirements['apache'] as $requirement) {
                            static::setRequirements(
                                $results, $type, $requirement,
                                in_array($requirement, apache_get_modules())
                            );
                        }
                    }
                    break;
            }
        }

        return $results;
    }

    private static function setRequirements(array &$results, string $type, string $requirement, bool $supports = true)
    {
        $results['requirements'][$type][$requirement] = $supports;
        $results['errors'] = $results['errors'] ? $results['errors'] : !$supports;
    }

    private static function setPermission(array &$results, string $folder, string $permission, bool $set)
    {
        $results['permissions'][] = [
            'folder' => $folder,
            'permission' => $permission,
            'set' => $set,
        ];
        $results['errors'] = $results['errors'] ? $results['errors'] : !$set;
    }
}