<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IdeaUser extends Model
{
    /**
     * Define o nome da tabela utilizada por este modelo.
     *
     * @var string
     */
    protected $table = 'idea_user';

    /**
     * Atributos que podem ser atribuídos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'idea_id',
        'user_id',
        'favourited',
        'removed',
        'approved',
        'preapproved'
    ];

    /**
     * Atributos que devem ser transformados em data.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * Retorna a idéia relacionada com este modelo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }

    /**
     * Retorna o usuário relacionado com este modelo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Alterna a coluna favourited.
     *
     * @return boolean
     */
    public function favourite()
    {
        return $this->setAttribute('favourited', !$this->favourited)->save();
    }

    /**
     * Alterna a coluna removed.
     *
     * @return boolean
     */
    public function remove()
    {
        return $this->setAttribute('removed', !$this->removed)->save();
    }

    /**
     * Alterna a coluna approved.
     *
     * @return boolean
     */
    public function approve()
    {
        return $this->setAttribute('approved', !$this->approved)->save();
    }

    /**
     * Alterna a coluna preapproved.
     *
     * @return boolean
     */
    public function preapprove()
    {
        return $this->setAttribute('preapproved', !$this->preapproved)->save();
    }

    /**
     * Adiciona um filtro de usuário na query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \App\User  $user
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUser($query, User $user)
    {
        return $query->whereUserId($user->id);
    }
}
