<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model {
  protected $fillable = [
    'is_public',
    'title',
    'image',
    'link',
    'start_at',
    'end_at'
  ];

  protected $table = 'banners';
}