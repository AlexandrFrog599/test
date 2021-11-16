<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	public $timestamps = false;
	protected $table = 'employees';
	protected $fillable = ['id', 'first_name', 'last_name', 'email', 'phone', 'company_id'];

	public function companies()
		{return $this->belongsTo(Company::class);}


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

	public static function get_employees()
 	{
		$articles = self::with('companies')->select('id', 'first_name', 'last_name', 'email', 'phone', 'company_id')->get();
		return $articles;
	}

	public static function get_employee($id)
 	{
		$article = self::with('companies')->select('id', 'first_name', 'last_name', 'email', 'phone', 'company_id')->find($id);
		return $article;
	}

}
