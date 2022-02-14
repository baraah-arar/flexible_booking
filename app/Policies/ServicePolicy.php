<?php

namespace App\Policies;

use App\Models\Service;
use App\Models\UserProfile;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicePolicy
{
    use HandlesAuthorization;

    public function create(UserProfile $user){
        return $user->role == 2; //admin
    }

    public function update(UserProfile $user, Service $service){
        // return $user->role == 2;
        return in_array($user->role, [3,2]); //admin , emp
    }

    public function delete(UserProfile $user, Service $service){
        return $user->role == 2; //admin
    }
}
