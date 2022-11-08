<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class News extends Model {
  protected $fillable = [
    'title',
    'content',
    'start_at',
    'end_at',
    'is_public',
    'url',
    'pdf',
    'pdf_title'
  ];

  protected $table = 'news';
}