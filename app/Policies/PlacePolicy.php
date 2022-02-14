<?php

namespace App\Policies;

use App\Models\Place;
use App\Models\UserProfile;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlacePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(UserProfile $userProfile)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(UserProfile $userProfile, Place $place)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(UserProfile $userProfile)
    {
        return $userProfile->role == 2; //admin
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(UserProfile $userProfile, Place $place)
    {
        return in_array($userProfile->role, [3,2]); //admin , emp
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(UserProfile $userProfile, Place $place)
    {
        return $userProfile->role == 2; //admin
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(UserProfile $userProfile, Place $place)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(UserProfile $userProfile, Place $place)
    {
        //
    }
}
