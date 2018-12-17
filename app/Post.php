<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'post_id';

    protected $fillable = ['post','usuario_id'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }


}
