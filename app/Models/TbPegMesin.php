<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TbPegMesin
 * 
 * @property int $id_peg_mesin
 * @property int $id_pegawai
 * @property int $id_jam_kerja
 * @property int $mesin
 * 
 * @property TbPegawai $tb_pegawai
 * @property TbJamKerja $tb_jam_kerja
 *
 * @package App\Models
 */
class TbPegMesin extends Model
{
	protected $table = 'tb_peg_mesin';
	protected $primaryKey = 'id_peg_mesin';
	public $timestamps = false;

	protected $casts = [
		'id_pegawai' => 'int',
		'id_jam_kerja' => 'int',
		'mesin' => 'int'
	];

	protected $fillable = [
		'id_pegawai',
		'id_jam_kerja',
		'mesin'
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
