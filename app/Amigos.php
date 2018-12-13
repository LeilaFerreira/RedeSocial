<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amigos extends Model
{
   protected $table = 'tb_amigo';
  protected $primaryKey = 'amigo_id';

  protected $fillable = [ 'pessoa1', 'pessoa2'];
}