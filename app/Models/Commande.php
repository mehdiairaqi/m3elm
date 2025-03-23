<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'service_id', 'status', 'adresse', 'description', 'username'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
