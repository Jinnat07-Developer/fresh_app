<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Controllers\UserController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    private static $image,$imageName,$directory,$imageUrl,$user,$extension;

    public static function newUser($request)
    {
        if($request->file('profile_photo_path'))
        {
            self::$image    =$request->file('profile_photo_path');
            self::$directory='upload/user-images/';
            self::$imageUrl =imageUpload(self::$image, self::$directory);
        }
        else
        {
            self::$imageUrl= '/upload/10.jpg';
        }

        self::$user=new User();
        self::$user->name                =$request->name;
        self::$user->email               =$request->email;
        self::$user->mobile              =$request->mobile;
        self::$user->password            =bcrypt($request->password);
        self::$user->profile_photo_path  =self::$imageUrl;
        self::$user->save();

    }

    public static function updateUser($request, $id)
    {
        self::$user=User::find($id);

        if($request->file('profile_photo_path'))
        {
            if(file_exists(self::$user->profile_photo_path))
            {
                unlink(self::$user->profile_photo_path);
            }
            self::$image    =$request->file('profile_photo_path');
            self::$extension=self::$image->getClientOriginalExtension();
            self::$imageName=time().'.'.self::$extension;
            self::$directory='upload/user-images/';
            self::$image->move(self::$directory,self::$imageName);
            self::$imageUrl =self::$directory.self::$imageName;
        }
        else
        {
            self::$imageUrl= self::$user->profile_photo_path;
        }


        self::$user->name                =$request->name;
        self::$user->email               =$request->email;
        self::$user->mobile              =$request->mobile;
        if($request->password)
        {
            self::$user->password            =bcrypt($request->password);
        }
        self::$user->profile_photo_path  =self::$imageUrl;
        self::$user->save();
    }

    public static function deleteUser($id)
    {
        self::$user=User::find($id);
        if(file_exists(self::$user->profile_photo_path))
        {
            unlink(self::$user->profile_photo_path);
        }
        self::$user->delete();

    }

}
