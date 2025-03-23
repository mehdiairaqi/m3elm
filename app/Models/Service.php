<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'service_id', 
        'status', 
        'adresse',     // Add 'adresse' column to fillable array
        'description',
        'username', // The expert (user) offering the service
    ];

    // Relationship: An expert (user) can have only one service
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function experts()
    {
        return $this->hasMany(Expert::class);
    }
}
