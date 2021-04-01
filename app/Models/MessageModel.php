<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageModel extends Model
{
	protected $table = 'messages';

	protected $fillable = ['nombre','email','phone','mensaje'];


	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function note()
	{
		return $this->morphOne(Note::class, 'notable');
	}

	public function tags()
	{
		return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
	}
}
