<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TbPegawai
 * 
 * @property int $id_pegawai
 * @property string $nama_pegawai
 * @property string $alamat
 * @property string $no_telp
 * @property string $email
 * @property string $password
 * 
 * @property Collection|TbJamKerja[] $tb_jam_kerjas
 * @property Collection|TbStaf[] $tb_stafs
 * @property Collection|TbSupir[] $tb_supirs
 *
 * @package App\Models
 */
class TbPegawai extends Model
{
	protected $table = 'tb_pegawai';
	protected $primaryKey = 'id_pegawai';
	public $timestamps = false;

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'nama_pegawai',
		'alamat',
		'no_telp',
		'email',
		'password'
	];

	public function tb_jam_kerjas()
	{
		return $this->hasMany(TbJamKerja::class, 'id_pegawai');
	}

	public function tb_stafs()
	{
		return $this->hasMany(TbStaf::class, 'id_pegawai');
	}

	public function tb_supirs()
	{
		return $this->hasMany(TbSupir::class, 'id_pegawai');
	}
}
