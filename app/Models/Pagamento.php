<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pagamento extends Model
{
   protected $primaryKey = 'id';
   protected $table = 'Pagamento';
   protected $fillable = ['nome','retorno'];
    public  $timestamps   = false;
}
