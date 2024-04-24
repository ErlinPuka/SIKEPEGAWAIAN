<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TbJamKerja
 * 
 * @property int $id_jam_kerja
 * @property int $id_pegawai
 * @property string $jam_kerja
 * 
 * @property TbPegawai $tb_pegawai
 * @property Collection|TbStaf[] $tb_stafs
 *
 * @package App\Models
 */
class TbJamKerja extends Model
{
	protected $table = 'tb_jam_kerja';
	protected $primaryKey = 'id_jam_kerja';
	public $timestamps = false;

	protected $casts = [
		'id_pegawai' => 'int'
	];

	protected $fillable = [
		'id_pegawai',
		'jam_kerja'
	];

	public function tb_pegawai()
	{
		return $this->belongsTo(TbPegawai::class, 'id_pegawai');
	}

	public function tb_stafs()
	{
		return $this->hasMany(TbStaf::class, 'id_jam_kerja');
	}
}
