<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
 * @property Collection|TbKenek[] $tb_keneks
 * @property Collection|TbPalet[] $tb_palets
 * @property Collection|TbPegMesin[] $tb_peg_mesins
 * @property Collection|TbPenggajian[] $tb_penggajians
 * @property Collection|TbPresensi[] $tb_presensis
 * @property Collection|TbSatpam[] $tb_satpams
 * @property Collection|TbStaf[] $tb_stafs
 * @property Collection|TbSupir[] $tb_supirs
 *
 * @package App\Models
 */
class TbPegawai extends Authenticatable
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

	public function tb_keneks()
	{
		return $this->hasMany(TbKenek::class, 'id_pegawai');
	}

	public function tb_palets()
	{
		return $this->hasMany(TbPalet::class, 'id_pegawai');
	}

	public function tb_peg_mesins()
	{
		return $this->hasMany(TbPegMesin::class, 'id_pegawai');
	}

	public function tb_penggajians()
	{
		return $this->hasMany(TbPenggajian::class, 'id_pegawai');
	}

	public function tb_presensis()
	{
		return $this->hasMany(TbPresensi::class, 'id_pegawai');
	}

	public function tb_satpams()
	{
		return $this->hasMany(TbSatpam::class, 'id_pegawai');
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
