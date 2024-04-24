<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TbStaf
 * 
 * @property int $id_staf
 * @property int $id_pegawai
 * @property int $id_jam_kerja
 * @property string $jabatan
 * 
 * @property TbPegawai $tb_pegawai
 * @property TbJamKerja $tb_jam_kerja
 *
 * @package App\Models
 */
class TbStaf extends Model
{
	protected $table = 'tb_staf';
	protected $primaryKey = 'id_staf';
	public $timestamps = false;

	protected $casts = [
		'id_pegawai' => 'int',
		'id_jam_kerja' => 'int'
	];

	protected $fillable = [
		'id_pegawai',
		'id_jam_kerja',
		'jabatan'
	];

	public function tb_pegawai()
	{
		return $this->belongsTo(TbPegawai::class, 'id_pegawai');
	}

	public function tb_jam_kerja()
	{
		return $this->belongsTo(TbJamKerja::class, 'id_jam_kerja');
	}
}
