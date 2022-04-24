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
      'admin_email' => 'required',
      'template' => 'required',
      'theme' => 'required',
      'content' => 'required',
      'security' => 'required',
      'performance' => 'required',
      'socials' => 'required',
      'email_server' => 'required',
      'backup' => 'required',
    ];

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'admin_email', 'template', 'theme', 'content', 'security','performance','socials', 'email_server', 'backup'];

    public function user() {
      return $this->belongsTo(User::class);
    }



}
