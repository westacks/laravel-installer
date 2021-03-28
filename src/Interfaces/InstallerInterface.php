<?php

namespace WeStacks\Laravel\Installer\Interfaces;

use WeStacks\Laravel\Installer\Worker;

interface InstallerInterface
{
    /**
     * This hook is executed before application is installed. All `.env` parameter already configured at this point.
     * @param null|Worker $worker 
     * @return void 
     */
    public function beforeInstall(?Worker $worker);

    /**
     * This hook describes app install proccess.
     * @param null|Worker $worker 
     * @return void 
     */
    public function install(?Worker $worker);

    /**
     * This hook is executed after application is installed. App should work after this point.
     * @param null|Worker $worker 
     * @return void 
     */
    public function afterInstall(?Worker $worker);

    /**
     * This hook is executed before application is updated.
     * @param null|Worker $worker 
     * @return void 
     */
    public function beforeUpdate(?Worker $worker);

    /**
     * This hook describes app update proccess.
     * @param null|Worker $worker 
     * @return void 
     */
    public function update(?Worker $worker);

    /**
     * This hook is executed after application is updated. App should work after this point.
     * @param null|Worker $worker 
     * @return void 
     */
    public function afterUpdate(?Worker $worker);
}