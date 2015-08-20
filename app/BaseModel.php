<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
	/**
	 * Register model event-hooks
	 * @return 
	 */
	public static function boot()
	{
		self::creating(function ($model) { return $model->beforeCreate(); });
		self::created(function ($model) { return $model->afterCreate(); });
		self::updating(function ($model) { return $model->beforeUpdate(); });
		self::updated(function ($model) { return $model->afterUpdate(); });
		self::saving(function ($model) { return $model->beforeSave(); });
		self::saved(function ($model) { return $model->afterSave(); });
		self::deleting(function ($model) { return $model->beforeDelete(); });
		self::deleted(function ($model) { return $model->afterDelete(); });

		return parent::boot();
	}
	public function beforeCreate() {}
	public function afterCreate() {}
	public function beforeUpdate() {}
	public function afterUpdate() {}
	public function beforeSave() {}
	public function afterSave() {}
	public function beforeDelete() {}
	public function afterDelete() {}
	public function beforeRestore() {}
	public function afterRestore() {}

	public function columns()
	{
		$conn = $this->getConnection();

		switch ( get_class($conn) )
		{
			case 'Illuminate\Database\MySqlConnection':
				$columns = \DB::select("DESCRIBE {$this->table}");
				array_walk($columns, function (&$column) {
					$column = $column->Field;
				});
			break;

			case 'Illuminate\Database\PostgresConnection':
				$columns = \DB::select(
					"SELECT column_name
					FROM information_schema.columns
					WHERE table_name ='{$this->table}'"
				);
				array_walk($columns, function (&$column) {
					$column = $column->column_name;
				});
			break;

			case 'Illuminate\Database\SQLiteConnection':
				$columns = \DB::select('PRAGMA table_info('.$this->table.')');
				array_walk($columns, function (&$column) {
					$column = $column->name;
				});
			break;
		}

		return $columns;
	}

}