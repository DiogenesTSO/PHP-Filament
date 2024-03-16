<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presentes extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'categoria',
        'descricao',
        'imagem',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($presentes) {
            $presentes->descricao = strip_tags($presentes->descricao);
        });
    }
}
