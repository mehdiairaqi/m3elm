<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'service_id', 'bio', 'status'];

    // Define the relationship with the service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
