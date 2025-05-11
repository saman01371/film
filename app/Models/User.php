<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Content\Comment;
use App\Models\Content\Post;
use App\Models\Market\Order;
use App\Models\Market\OrderItem;
use App\Models\Market\Payment;
use App\Models\Market\Product;
use App\Models\Ticket\Ticket;
use App\Models\Ticket\TicketAdmin;
use App\Models\User\Permission;
use App\Models\User\Role;
use App\Traits\Permissions\HasPermissionsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class User extends Authenticatable
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasPermissionsTrait;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'mobile', 'status',
        'user_type', 'activation', 'profile_photo_path', 'password','mobile_verified_at','email_verified_at','national_code'
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
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

  /*  public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }*/
    public function fullName(): Attribute
    {
        return new Attribute(
            get: fn () => $this->first_name .' ' . $this->last_name
        );
    }



    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }


    public function ticketAdmin(){
        return $this->hasOne(TicketAdmin::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }


    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function orderItems()
    {
        return $this->hasManyThrough(OrderItem::class, Order::class);
    }
}
