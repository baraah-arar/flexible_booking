<?php

namespace App\Policies;

use App\Models\UserProfile;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserProfilePolicy
{
    use HandlesAuthorization;

    public function create(UserProfile $userProfile){
        return $userProfile->role == 2; //admin
    }

    public function update(UserProfile $userProfile, UserProfile $userProfile2){
        return $userProfile->role == 2; //admin
    }

    public function delete(UserProfile $userProfile, UserProfile $userprofile2){
        return $userProfile->role == 2; //admin
    }
}
