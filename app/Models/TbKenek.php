<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TbKenek
 * 
 * @property int $id_kenek
 * @property int $id_pegawai
 * @property string $transport
 * @property string $rit_angkutan
 * 
 * @property TbPegawai $tb_pegawai
 *
 * @package App\Models
 */
class TbKenek extends Model
{
	protected $table = 'tb_kenek';
	protected $primaryKey = 'id_kenek';
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
