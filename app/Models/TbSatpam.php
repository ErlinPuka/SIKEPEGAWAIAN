<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TbSatpam
 * 
 * @property int $id_satpam
 * @property int $id_pegawai
 * 
 * @property TbPegawai $tb_pegawai
 *
 * @package App\Models
 */
class TbSatpam extends Model
{
	protected $table = 'tb_satpam';
	protected $primaryKey = 'id_satpam';
	public $timestamps = false;

	protected $casts = [
		'id_pegawai' => 'int'
	];

	protected $fillable = [
		'id_pegawai'
	];

	public function tb_pegawai()
	{
		return $this->belongsTo(TbPegawai::class, 'id_pegawai');
	}
}
