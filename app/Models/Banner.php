<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model {
  protected $fillable = [
    'is_public',
    'title',
    'image',
    'link',
  ];

  protected $table = 'banners';
}