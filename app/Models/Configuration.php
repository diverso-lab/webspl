<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

/**
 * Class Configuration
 *
 * @property $id
 * @property $name
 * @property $template_type
 * @property $security
 * @property $performance
 * @property $socials
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Configuration extends Model
{

    static $rules = [
      'name' => 'required',
      'template_type' => 'required',
      'security' => 'required',
      'performance' => 'required',
      'socials' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'name','template_type','security','performance','socials'];

    public function user() {
      return $this->belongsTo(User::class);
    }



}
