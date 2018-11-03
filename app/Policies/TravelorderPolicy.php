<?php

namespace App\Policies;

use App\User;
use App\Travelorder;
use Illuminate\Auth\Access\HandlesAuthorization;

class TravelorderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the travelorder.
     *
     * @param  \App\User  $user
     * @param  \App\Travelorder  $travelorder
     * @return mixed
     */
    public function view(User $user, Travelorder $travelorder)
    {
        //
    }

    /**
     * Determine whether the user can create travelorders.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the travelorder.
     *
     * @param  \App\User  $user
     * @param  \App\Travelorder  $travelorder
     * @return mixed
     */
    public function update(User $user, Travelorder $travelorder)
    {
        //
    }

    /**
     * Determine whether the user can delete the travelorder.
     *
     * @param  \App\User  $user
     * @param  \App\Travelorder  $travelorder
     * @return mixed
     */
    public function delete(User $user, Travelorder $travelorder)
    {
        //
    }

    /**
     * Determine whether the user can restore the travelorder.
     *
     * @param  \App\User  $user
     * @param  \App\Travelorder  $travelorder
     * @return mixed
     */
    public function restore(User $user, Travelorder $travelorder)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the travelorder.
     *
     * @param  \App\User  $user
     * @param  \App\Travelorder  $travelorder
     * @return mixed
     */
    public function forceDelete(User $user, Travelorder $travelorder)
    {
        //
    }
}
