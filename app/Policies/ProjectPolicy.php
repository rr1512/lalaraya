<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Common\Workspaces\Policies\WorkspacedResourcePolicy;

class ProjectPolicy extends WorkspacedResourcePolicy
{
    protected string $resource = Project::class;

    public function publish(User $user, Project $project)
    {
        return $this->hasPermission($user, 'projects.publish') &&
            $this->show($user, $project);
    }

    public function download(User $user, Project $project)
    {
        return $this->hasPermission($user, 'projects.download') &&
            $project->user_id === $user->id;
    }

    public function show(User $currentUser, $resource)
    {
        if ($resource->published) {
            return true;
        }

        return parent::show($currentUser, $resource);
    }
}
