<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
 
/**
 * Class Configuration
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Configuration extends Model
{

    static $rules = [
      'web_name' => ['required', 'unique:configurations,web_name', 'min:5', 'max:50', 'alpha_dash'],
      'admin_email' => ['required', 'min:5', 'max:50', 'email:rfc'],
      'theme' => 'required',
      'php' => 'required',
      'storage' => 'required',
      'search' => 'required',
      'paypal_payment' => 'required',
      'creditcard_payment' => 'required',
      'mobile_payment' => 'required',
      'security' => 'required',
      'backup' => 'required',
      'seo' => 'required',
      'twitter_socials' => 'required',
      'facebook_socials' => 'required',
      'youtube_socials' => 'required',
    ];

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'web_name', 'admin_email', 'theme', 'php', 'storage', 'search', 'paypal_payment', 'creditcard_payment', 'mobile_payment', 'security', 'backup', 'seo', 'twitter_socials', 'facebook_socials', 'youtube_socials'];

    public function user() {
      return $this->belongsTo(User::class);
    }



}
