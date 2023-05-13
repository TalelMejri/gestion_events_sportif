<?php

namespace App\Policies;

use App\Models\EvenementSportif;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventSportifPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
       return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EvenementSportif  $evenementSportif
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, EvenementSportif $evenementSportif)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->role=="Organisateur";
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EvenementSportif  $evenementSportif
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, EvenementSportif $evenementSportif)
    {
        return ((($user->role=='Organisateur')&&($user->id==$evenementSportif->user_id))||($user->role=='Admin'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EvenementSportif  $evenementSportif
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, EvenementSportif $evenementSportif)
    {
        return (($user->role=="Admin")&&($user->id==$evenementSportif->user_id));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EvenementSportif  $evenementSportif
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, EvenementSportif $evenementSportif)
    {
        return $user->role=="Admin";
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EvenementSportif  $evenementSportif
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, EvenementSportif $evenementSportif)
    {
        return false;
    }
}
