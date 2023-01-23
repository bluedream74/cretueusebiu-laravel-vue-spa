<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

  /**
   * The accessors to append to the model's array form.
   *
   * @var array
   */
  protected $appends = [
    'pdf_url',
  ];

  /**
   * Get the profile photo URL attribute.
   *
   * @return string
   */
  public function getPdfUrlAttribute()
  {
    if (is_null($this->pdf)) {
        return null;
    } else {
        return Storage::disk('public')->url($this->pdf);
    }
  }
}