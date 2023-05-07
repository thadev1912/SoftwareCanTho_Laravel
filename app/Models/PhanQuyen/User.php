<?php
  namespace  App\Models\PhanQuyen;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

//use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'hoten',
        'email',
        'password',
        'api_token',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
   public function hasPermission($route)
      {
        $routes=$this->routes();
        //dd(in_array($route,$routes)); xác nhận mã rotue trong mạng đã okay!!!       
        return in_array($route,$routes) ? true :false;
         
      }
    public function routes()
       {
        //$route=$this->getPermissions();
      
        $route=[];     
        foreach($this->getPermissions as $info)
         {
           $data=json_decode($info->permissions);
           foreach($data as $dt)
           {
            if(!in_array($dt,$route))
              {
                array_push($route,$dt);
              }
          
           }
         }
         //return ['nhanvien','phongban','chucvu'];
         //dd($route);
         return $route;
       }
    public function getPermissions()
       {
           return $this->belongsToMany(Role_Permission::class,'role_user','name','role_name');
        
       }
     

      
}
