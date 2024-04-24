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
 * @property string $transport
 * @property string $rit_angkutan
 * 
 * @property TbPegawai $tb_pegawai
 *
 * @package App\Models
 */
class TbSupir extends Model
{
	protected $table = 'tb_supir';
	protected $primaryKey = 'id_supir';
	public $timestamps = false;

	protected $casts = [
		'id_pegawai' => 'int'
	];

	protected $fillable = [
		'id_pegawai',
		'transport',
		'rit_angkutan'
	];

	public function tb_pegawai()
	{
		return $this->belongsTo(TbPegawai::class, 'id_pegawai');
	}
}
