<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

  /**
   * The accessors to append to the model's array form.
   *
   * @var array
   */
  protected $appends = [
    'image_url',
  ];

  /**
   * Get the profile photo URL attribute.
   *
   * @return string
   */
  public function getImageUrlAttribute()
  {
    if (is_null($this->image)) {
        return null;
    } else {
        return Storage::disk('public')->url($this->image);
    }
  }
}