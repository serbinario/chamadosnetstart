<?php

namespace Serbinario\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Endereco extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'endereco';

    protected $fillable = [ 
		'endereco',
		'cep',
		'bairros_id',
	];

	public function bairro()
	{
		return $this->belongsTo(Bairro::class, 'bairros_id');
	}
}