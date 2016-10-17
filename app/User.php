<?php

namespace App;

use App\Traits\Eloquent\Presentable;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Presentable;

    /**
     * Atributos que podem ser atribuídos em massa.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * Atributos que não devem aparecer na forma de JSON do modelo.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Todos os usuários que este usuário segue.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function follows()
    {
        return $this->belongsToMany(self::class, 'follows', 'follower_id');
    }

    /**
     * Todas as idéias que este usuário tenha interagido de alguma
     * forma.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function ideas()
    {
        return $this->belongsToMany(Idea::class)->withPivot('favourited', 'removed', 'approved', 'preapproved');
    }

    /**
     * Todos os pivots da relação entre usuários e idéias.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ideaUser()
    {
        return $this->hasMany(IdeaUser::class);
    }

    /**
     * Todas as idéias que este usuário favoritou.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function favourited()
    {
        return $this->ideas()->where('favourited', true);
    }

    /**
     * Todas as idéias que este usuário moveu para a lixeira.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function removed()
    {
        return $this->ideas()->where('removed', true);
    }

    /**
     * Todas as idéias que este usuário aprovou.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function approved()
    {
        return $this->ideas()->where('approved', true);
    }

    /**
     * Todas as idéias que este usuário pré-aprovou.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function preapproved()
    {
        return $this->ideas()->where('preapproved', true);
    }

    /**
     * Adiciona uma idéia aos itens visualizados.
     *
     * @param  \App\Idea  $idea
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function see(Idea $idea)
    {
        $idea->ideaUserAuthenticated = $this->ideaUser()->firstOrCreate(['idea_id' => $idea->id]);
        return $idea;
    }

    /**
     * Adiciona uma idéia aos favoritos.
     *
     * @param  \App\Idea  $idea
     * @return boolean
     */
    public function favourite(Idea $idea)
    {
        return $this->ideaUser()->firstOrCreate(['idea_id' => $idea->id])->favourite();
    }

    /**
     * Remove uma idéia.
     *
     * @param  \App\Idea  $idea
     * @return boolean
     */
    public function remove(Idea $idea)
    {
        return $this->ideaUser()->firstOrCreate(['idea_id' => $idea->id])->remove();
    }

    /**
     * Aprova uma idéia.
     *
     * @param  \App\Idea  $idea
     * @return boolean
     */
    public function approve(Idea $idea)
    {
        return $this->ideaUser()->firstOrCreate(['idea_id' => $idea->id])->approve();
    }

    /**
     * Pré-aprova uma idéia.
     *
     * @param  \App\Idea  $idea
     * @return boolean
     */
    public function preapprove(Idea $idea)
    {
        return $this->ideaUser()->firstOrCreate(['idea_id' => $idea->id])->preapprove();
    }

    /**
     * Gera um link para o gravatar do usuário.
     *
     * @param  Integer  $size
     * @return string
     */
    public function gravatar($size = 150)
    {
        return sprintf('https://secure.gravatar.com/avatar/%s?s=%s', md5($this->email), $size);
    }

    /**
     * Verifica se o usuário atual é um administrador.
     *
     * @return bool
     */
    public function isAdministrator()
    {
        return $this->administrator;
    }
}
