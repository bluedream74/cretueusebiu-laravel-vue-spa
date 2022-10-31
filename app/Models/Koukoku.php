<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Koukoku extends Model {
  protected $fillable = [
    'user_id',
    'description',
    'amount',
    'unit',
    'price',
    'date'
  ];

  protected $table = 'koukokus';
}