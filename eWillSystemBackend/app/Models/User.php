<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasApiTokens, HasRoles;

    protected $fillable = [
        "first_name",
        "last_name",
        "contact",
        "email",
        "username",
        "email",
        "nin",
        "tribe",
        "clan",
        "gender",
        "father",
        "mother",
        "date_of_birth",
        "original_address",
        "current_address",
        "marital_status",
        "password",
        "addedby",
        "will_id",
        "sub_package_id",
        "confirm_password",
    ];

    protected $hidden = ["password", "remember_token"];

    protected $casts = [
        "email_verified_at" => "datetime",
    ];

    public function rchildren()
    {
        return $this->hasMany(Child::class, "user_id", "id");
    }
    public function rdependant()
    {
        return $this->hasMany(Dependant::class, "user_id", "id");
    }
    public function rotherrelative()
    {
        return $this->hasMany(OtherRelative::class, "user_id", "id");
    }
    public function rguardian()
    {
        return $this->hasMany(Guardian::class, "user_id", "id");
    }
    public function rcreditor()
    {
        return $this->hasMany(Creditor::class, "user_id", "id");
    }
    public function rdebtor()
    {
        return $this->hasMany(Debtor::class, "user_id", "id");
    }
    public function rland()
    {
        return $this->hasMany(Land::class, "user_id", "id");
    }
    public function rhouse()
    {
        return $this->hasMany(House::class, "user_id", "id");
    }
    public function rlivestock()
    {
        return $this->hasMany(Livestock::class, "user_id", "id");
    }
    public function rbankaccounts()
    {
        return $this->hasMany(BankAccount::class, "user_id", "id");
    }
    public function rvehicle()
    {
        return $this->hasMany(Vehicle::class, "user_id", "id");
    }
    public function rotherproperty()
    {
        return $this->hasMany(OtherProperty::class, "user_id", "id");
    }
    public function rshare()
    {
        return $this->hasMany(Share::class, "user_id", "id");
    }
    public function rburialdetails()
    {
        return $this->hasMany(BurialDetial::class, "user_id", "id");
    }
    public function rexecutors()
    {
        return $this->hasMany(Executor::class, "user_id", "id");
    }
    public function rwitnesses()
    {
        return $this->hasMany(Witness::class, "user_id", "id");
    }
    public function rspouses()
    {
        return $this->hasMany(Spouse::class, "user_id", "id");
    }
    public function rrelatives()
    {
        return $this->hasMany(Relative::class, "user_id", "id");
    }
    public function rdisposition()
    {
        return $this->hasMany(PropertyDisposition::class, "user_id", "id");
    }
    public function rpropertydispositiondetails()
    {
        return $this->hasMany(
            PropertyDispositionDetail::class,
            "user_id",
            "id"
        );
    }
    public function sendEmailVerificationNotification()
    {
        $this->notify(new \Illuminate\Auth\Notifications\VerifyEmail());
    }
    public function imagesDocuments()
    {
        return $this->hasMany(ImageDocument::class, "user_id", "id");
    }

    public function role()
    {
        return $this->hasOne(Role::class); // Modify to fit your structure
    }

    public function audits()
    {
        return $this->hasMany(Audit::class, "user", "id");
    }

    public function subpackage()
    {
        return $this->belongsTo(SubPackage::class, "sub_package_id", "id");
    }
}
