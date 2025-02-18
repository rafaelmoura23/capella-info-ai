<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaintOfTheDay extends Model
{
    use HasFactory;

    protected $table = 'saint_of_the_day';

    protected $fillable = ['nome_santo', 'dia', 'frase', 'imagem'];
}