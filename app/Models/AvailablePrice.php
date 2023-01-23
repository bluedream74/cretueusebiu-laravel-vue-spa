<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AvailablePrice extends Model {
  protected $fillable = [
    'user_id',
    'price_id',
  ];

  protected $table = 'available_prices';
}