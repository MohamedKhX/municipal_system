<?php

namespace App\Policies;

use App\Models\ReportType;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReportTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_report::type');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ReportType $reportType): bool
    {
        return $user->can('view_report::type');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('manage_report::type');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ReportType $reportType): bool
    {
        return $user->can('manage_report::type');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ReportType $reportType): bool
    {
        return $user->can('manage_report::type');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('manage_report::type');
    }
}
