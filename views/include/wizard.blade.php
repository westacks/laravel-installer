<div class="w-full py-6">
    <div class="flex">
        <div class="w-1/5">
            <div class="relative mb-2">
                @include('installer::include.icon', ['name' => 'home', 'active' => $step > 0])
            </div>
            <div class="text-xs text-center md:text-base">Setup Wizard</div>
        </div>

        <div class="w-1/5">
            <div class="relative mb-2">
                @include('installer::include.strip', ['active' => $step > 1])
                @include('installer::include.icon', ['name' => 'server', 'active' => $step > 1])
            </div>

            <div class="text-xs text-center md:text-base">Requirements</div>
        </div>

        <div class="w-1/5">
            <div class="relative mb-2">
                @include('installer::include.strip', ['active' => $step > 2])
                @include('installer::include.icon', ['name' => 'key', 'active' => $step > 2])
            </div>

            <div class="text-xs text-center md:text-base">Permissions</div>
        </div>

        <div class="w-1/5">
            <div class="relative mb-2">
                @include('installer::include.strip', ['active' => $step > 3])
                @include('installer::include.icon', ['name' => 'cog', 'active' => $step > 3])
            </div>

            <div class="text-xs text-center md:text-base">Environment</div>
        </div>

        <div class="w-1/5">
            <div class="relative mb-2">
                @include('installer::include.strip', ['active' => $step > 4])
                @include('installer::include.icon', ['name' => 'flag-checkered', 'active' => $step > 4])
            </div>

            <div class="text-xs text-center md:text-base">Finished</div>
        </div>
    </div>
</div>
