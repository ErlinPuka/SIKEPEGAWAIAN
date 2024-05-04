<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TbPresensi
 * 
 * @property int $id_presensi
 * @property int $id_pegawai
 * @property string $status_presensi
 * @property Carbon $tanggal
 * 
 * @property TbPegawai $tb_pegawai
 *
 * @package App\Models
 */
class TbPresensi extends Model
{
	protected $table = 'tb_presensi';
	protected $primaryKey = 'id_presensi';
	public $timestamps = false;

	protected $casts = [
		'id_pegawai' => 'int',
		'tanggal' => 'datetime'
	];

	protected $fillable = [
		'id_pegawai',
		'status_presensi',
		'tanggal'
	];

	public function tb_pegawai()
	{
		return $this->belongsTo(TbPegawai::class, 'id_pegawai');
	}
}
