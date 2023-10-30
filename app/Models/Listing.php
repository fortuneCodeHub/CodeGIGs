<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Listing extends Model
{
    use HasFactory;

    // Fillable Porperties
    // Another way to do this is to go to the file AppServiceProvider using this root url app/Providers/AppServiceProvider.php
    // protected $fillable = ["title", "company", "location", "website", "email", "description", "tags"];


    // How to make filters wiith laravel
    public function scopeFilter($query, array $filters)
    {
        if ($filters["tag"] ?? false) {
            $query->where("tags", "like", "%". request("tag"). "%");
        }

        if ($filters["search"] ?? false) {
            $query->where("title", "like", "%". request("search"). "%")
            ->orWhere("description", "like", "%". request("search"). "%")
            ->orWhere("tags", "like", "%". request("search"). "%");
        }
    }

    // Define relationship between Listing Model and User Model
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
