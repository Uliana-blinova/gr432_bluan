<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;

class User extends Model implements IdentityInterface
{
   use HasFactory;

   public $timestamps = false;
   protected $primaryKey = 'user_id';

   protected $fillable = [
       'full_name',
       'login',
       'password',
       'role'
   ];

   protected static function booted()
   {
       static::created(function ($user) {
           $user->password = md5($user->password);
           $user->save();
       });
   }

   public function findIdentity(int $user_id)
   {
       return self::where('user_id', $user_id)->first();
   }

   public function getId(): int
   {
       return $this->user_id;
   }

   public function attemptIdentity(array $credentials)
   {
       return self::where(['login' => $credentials['login'],
           'password' => md5($credentials['password'])])->first();
   }
}
