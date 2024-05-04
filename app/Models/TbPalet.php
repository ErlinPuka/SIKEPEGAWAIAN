<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TbPalet
 * 
 * @property int $id_palet
 * @property int $id_pegawai
 * @property int $id_jam_kerja
 * @property int $jumlah_palet
 * @property int $jenis_palet
 * 
 * @property TbJamKerja $tb_jam_kerja
 * @property TbPegawai $tb_pegawai
 *
 * @package App\Models
 */
class TbPalet extends Model
{
	protected $table = 'tb_palet';
	protected $primaryKey = 'id_palet';
	public $timestamps = false;

	protected $casts = [
		'id_pegawai' => 'int',
		'id_jam_kerja' => 'int',
		'jumlah_palet' => 'int',
		'jenis_palet' => 'int'
	];

	protected $fillable = [
		'id_pegawai',
		'id_jam_kerja',
		'jumlah_palet',
		'jenis_palet'
	];

	public function tb_jam_kerja()
	{
		return $this->belongsTo(TbJamKerja::class, 'id_jam_kerja');
	}

	public function tb_pegawai()
	{
		return $this->belongsTo(TbPegawai::class, 'id_pegawai');
	}
}
