<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DeletedUser extends Model {
  protected $fillable = [
    'email',
    'avatar',
    'nickname',
    'gender',
    'age',
    'sexality',
    'area',
    'introduction',
  ];

  protected $table = 'deleted_users';

  /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
      'avatar_url',
    ];

  /**
   * Get the profile photo URL attribute.
   *
   * @return string
   */
  public function getAvatarUrlAttribute()
  {
      if (is_null($this->avatar)) {
          return 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y';
      } else {
          return Storage::disk('public')->url($this->avatar);
      }
  }
}