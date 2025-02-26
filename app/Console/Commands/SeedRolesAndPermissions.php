<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SeedRolesAndPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed roles and permissions';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $admin = Role::findOrCreate('admin');

        $newsView           = Permission::findOrCreate('view_news');
        $newManage          = Permission::findOrCreate('manage_news');

        $userView           = Permission::findOrCreate('view_user');
        $userManage         = Permission::findOrCreate('manage_user');

        $reportView         = Permission::findOrCreate('view_report');
        $reportManage       = Permission::findOrCreate('manage_report');

        $requestView        = Permission::findOrCreate('view_request');
        $requestManage      = Permission::findOrCreate('manage_request');

        $serviceView        = Permission::findOrCreate('view_service');
        $serviceManage      = Permission::findOrCreate('manage_service');

        $roleView           = Permission::findOrCreate('view_shield::role');
        $roleManage         = Permission::findOrCreate('manage_shield::role');

        $requestTypeView    = Permission::findOrCreate('view_request::type');
        $requestTypeManage  = Permission::findOrCreate('manage_request::type');

        $reportTypeView    = Permission::findOrCreate('view_report::type');
        $reportTypeManage  = Permission::findOrCreate('manage_report::type');

        $viewRole = Permission::findOrCreate('view_role');
        $viewAnyRole = Permission::findOrCreate('view_any_role');
        $deleteAnyRole = Permission::findOrCreate('delete_any_role');
        $deleteRole = Permission::findOrCreate('delete_role');
        $createRole = Permission::findOrCreate('create_role');
        $updateRole = Permission::findOrCreate('update_role');

        $admin->syncPermissions([
            $newsView,
            $newManage,
            $reportView,
            $reportManage,
            $requestView,
            $requestManage,
            $serviceView,
            $serviceManage,
            $requestTypeView,
            $requestTypeManage,
            $roleView,
            $roleManage,
            $userView,
            $userManage,
            $reportTypeView,
            $reportTypeManage,
            $viewRole,
            $viewAnyRole,
            $deleteAnyRole,
            $deleteRole,
            $createRole,
            $updateRole
        ]);
    }
}
