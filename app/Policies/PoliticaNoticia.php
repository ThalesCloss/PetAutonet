<?php

namespace App\Policies;

use App\User;
use App\Noticia;
use Illuminate\Auth\Access\HandlesAuthorization;

class PoliticaNoticia
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the noticia.
     *
     * @param  \App\User  $user
     * @param  \App\Noticia  $noticia
     * @return mixed
     */
    public function view(User $user, Noticia $noticia)
    {
        //
    }

    /**
     * Determine whether the user can create noticias.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
      return true;
          dd($user->papeisUsuario);
    }

    /**
     * Determine whether the user can update the noticia.
     *
     * @param  \App\User  $user
     * @param  \App\Noticia  $noticia
     * @return mixed
     */
    public function update(User $user, Noticia $noticia)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can delete the noticia.
     *
     * @param  \App\User  $user
     * @param  \App\Noticia  $noticia
     * @return mixed
     */
    public function delete(User $user, Noticia $noticia)
    {
        //
    }
}
