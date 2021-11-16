<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	public $timestamps = false;
	protected $table = 'companies';
	protected $fillable = ['id', 'name', 'email', 'phone', 'website', 'logo'];

	public function employees()
	{
		return $this->hasMany(Employee::class);
	}

	public static function add($fields, $id=null)
 	{

		if(!$id)
			$article = new static;
		else
			$article = self::find($id);
		$article->fill($fields);
		$article->save();
		return $article;
	}

	public static function get_companies()
 	{
		$articles = self::with('employees')->select('id', 'name', 'email', 'phone', 'website', 'logo')->get();
		return $articles;
	}

	public static function get_company($id)
 	{
		$article = self::with('employees')->select('id', 'name', 'email', 'phone', 'website', 'logo')->find($id);
		return $article;
	}

}
