<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TbPenggajian
 * 
 * @property int $id_penggajian
 * @property int $id_pegawai
 * @property string $jenis_penggajian
 * @property int $total_gaji
 * @property Carbon $tanggal_penggajian
 * @property int $status
 * @property string $bulan_penggajian
 * 
 * @property TbPegawai $tb_pegawai
 *
 * @package App\Models
 */
class TbPenggajian extends Model
{
	protected $table = 'tb_penggajian';
	protected $primaryKey = 'id_penggajian';
	public $timestamps = false;

	protected $casts = [
		'id_pegawai' => 'int',
		'total_gaji' => 'int',
		'tanggal_penggajian' => 'datetime',
		'status' => 'int'
	];

	protected $fillable = [
		'id_pegawai',
		'jenis_penggajian',
		'total_gaji',
		'tanggal_penggajian',
		'status',
		'bulan_penggajian'
	];

	public function tb_pegawai()
	{
		return $this->belongsTo(TbPegawai::class, 'id_pegawai');
	}
}
