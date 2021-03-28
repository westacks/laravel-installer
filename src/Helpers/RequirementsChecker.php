<?php

namespace WeStacks\Laravel\Installer\Helpers;

class RequirementsChecker
{
    public static function check(array $requirements)
    {
        $results = [ 'errors' => false ];

        foreach ($requirements as $type => $requirement) {
            switch ($type) {
                case 'php_version':
                    static::setResult(
                        $results, 'php', 'version',
                        version_compare(phpversion(), $requirement, '>=')
                    );
                    break;

                case 'php':
                    foreach ($requirements['php'] as $requirement) {
                        static::setResult(
                            $results, $type, $requirement,
                            extension_loaded($requirement)
                        );
                    }
                    break;

                case 'apache':
                    if (function_exists('apache_get_modules')) {
                        foreach ($requirements['apache'] as $requirement) {
                            static::setResult(
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

    private static function setResult(array &$results, string $type, string $requirement, bool $supports = true)
    {
        $results['requirements'][$type][$requirement] = $supports;
        $results['errors'] = $results['errors'] ? $results['errors'] : !$supports;
    }
}