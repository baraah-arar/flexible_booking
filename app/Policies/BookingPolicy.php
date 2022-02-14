<?php

namespace App\Policies;

use App\Models\Booking;
use App\Models\BookingService;
use App\Models\UserProfile;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookingPolicy
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
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(UserProfile $userProfile, Booking $booking)
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
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(UserProfile $userProfile, Booking $booking)
    {
        return $userProfile->role == 2; //admin
        //
    }
    

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(UserProfile $userProfile, Booking $booking)
    {
        return $userProfile->role == 2; //admin
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(UserProfile $userProfile, Booking $booking)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(UserProfile $userProfile, Booking $booking)
    {
        //
    }
}
