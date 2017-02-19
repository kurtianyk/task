<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'contacts';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'surname', 'phone_number', 'birth_day', 'info'];

  /**
   * Get user the owner of this contact
   */
   public function user()
   {
     return $this->belongsTo(User::class);
   }
}
