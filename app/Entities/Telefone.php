<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 11/24/15
 * Time: 11:23 PM
 */

namespace CodeAgenda\Entities;


use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $table = 'telefones';
    protected $fillable = [
        'descricao',
        'codpais',
        'ddd',
        'prefixo',
        'sufixo'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }

    /**
     * @return string
     */
    public function getNumeroAttribute()
    {
        return "{$this->codPais} ({$this->ddd}) {$this->prefixo}-{$this->sufixo}";
    }
}