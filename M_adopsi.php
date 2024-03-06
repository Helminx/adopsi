<?php

namespace App\Models;
use CodeIgniter\Model;

class M_adopsi extends Model
{
 public function tampil($tabel){
 return $this->db->table($tabel)
 ->get()
 ->getResult();

 }

 public function getWhere($tabel,$where){
  return $this->db->table($tabel)
  ->getWhere($where)
  ->getRow();
 }
 
 public function tambah($tabel, $isi){
    return $this->db->table($tabel)
    ->insert($isi);
 }

 public function edit($tabel, $isi, $where){
    return $this->db->table($tabel)
    ->update($isi, $where);
 }

 public function hapus($tabel,$where){
   return $this->db->table($tabel)
    ->delete($where);
 }
//  public function joinnelson($tabel, $tabel2, $tabel3,$tabel4, $on, $on2,$on3, $id){
//  return $this->db->table($tabel)
//  ->join($tabel2, $on,'left')
//  ->join($tabel3, $on2,'left')
//  ->join($tabel4, $on3,'left')
//  ->orderby($id,'desc')
//  ->get()
//  ->getResult();

// }

public function join($tabel, $tabel2, $on, $id){
    return $this->db->table($tabel)
    ->join($tabel2, $on,'left')
    ->orderby($id,'desc')
    ->get()
    ->getResult();

 }

 // public function join2($tabel, $tabel2, $on, $id){
 //    return $this->db->table($tabel)
 //    ->join($tabel2, $on,'left')
 //    ->orderby($id,'desc')
 //    ->getWhere()
 //    ->getResult();

 // }

public function joinjul($tabel, $tabel2, $tabel3,$tabel4, $on, $on2,$on3, $id,$where){
 return $this->db->table($tabel)
 ->join($tabel2, $on,'left')
 ->join($tabel3, $on2,'left')
 ->join($tabel4, $on3,'left')
 ->orderby($id,'desc')
 ->getWhere($where)
 ->getResult();

}
protected $table; // Biarkan kosong, nanti akan diisi secara dinamis
    protected $primaryKey = 'id_barang';
    public function __construct()
    {
        parent::__construct();
        $this->table = 'lelang'; // Setel nama tabel secara dinamis saat membuat objek model
    }
    public function insertHistory($table, $data)
{
    return $this->db->table($table)->insert($data);
}
//     public function getPreviousHarga($id_barang)
//     {
//         $table = 'lelang'; // Set nama tabel ke 'lelang'
//         $result = $this->db->table($table)
//             ->select('harga_akhir')
//             ->where('id_barang', $id_barang)
//             ->get();

//         // Tambahkan penanganan kesalahan
//         if (!$result) {
//             die(var_dump($this->db->error())); // Cetak pesan kesalahan
//         }

//         $row = $result->getRow();

//         if ($row) {
//             return $row->harga_akhir;
//         } else {
//             return null; // Atau nilai default sesuai kebutuhan Anda
//         }
//     }

//     public function getHighestBidsByBarang()
//  {
//      return $this->db->table('bid')
//          ->select('id_barang, MAX(harga_terakhir) as max_harga_terakhir')
//          ->groupBy('id_barang')
//          ->get()
//          ->getResult();
//         }


}