<?php

namespace CodeAgenda\Entities;


use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = 'pessoas';
    protected $fillable = [
        'nome',
        'apelido',
        'sexo'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function telefones()
    {
        return $this->hasMany(Telefone::class);
    }
}