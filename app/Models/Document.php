<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'Documents'; 
    protected $primaryKey = 'DocumentID'; 
    protected $fillable = ['Title', 'DateReceived', 'Type', 'Status', 'DisposableDate', 'ResponsiblePerson'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'document_user', 'document_id', 'user_id');
    }

    public function archives()
    {
        return $this->belongsToMany(Archive::class, 'document_archive', 'document_id', 'archive_id');
    }
}