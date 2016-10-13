<?php

namespace App;

use App\Traits\Eloquent\Presentable;

use Illuminate\Database\Eloquent\Model;


class Idea extends Model
{
    use Presentable;

    /**
     * Atributos que podem ser atribuídos em massa.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'phone', 'title', 'description'];

    /**
     * Todos os usuários que tenham interagido com esta idéia de
     * alguma forma.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('favourited', 'removed', 'approved', 'preapproved');
    }

    /**
     * Busca os modelos que relacionam uma idéia com um usuário.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ideaUser()
    {
        return $this->hasMany(IdeaUser::class);
    }

    /**
     * Busca o modelo que relaciona uma idéia com o usuário
     * autenticado.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function ideaUserAuthenticated()
    {
        return $this->hasOne(IdeaUser::class)->user(auth()->user());
    }
}
