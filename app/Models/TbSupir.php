<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TbSupir
 * 
 * @property int $id_supir
 * @property int $id_pegawai
 * @property int $id_jam_kerja
 * @property string $transport
 * @property int $rit_angkutan
 * 
 * @property TbPegawai $tb_pegawai
 * @property TbJamKerja $tb_jam_kerja
 *
 * @package App\Models
 */
class TbSupir extends Model
{
	protected $table = 'tb_supir';
	protected $primaryKey = 'id_supir';
	public $timestamps = false;

	protected $casts = [
		'id_pegawai' => 'int',
		'id_jam_kerja' => 'int',
		'rit_angkutan' => 'int'
	];

	protected $fillable = [
		'id_pegawai',
		'id_jam_kerja',
		'transport',
		'rit_angkutan'
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
