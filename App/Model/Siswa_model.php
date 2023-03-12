<?php

class petugas_model {
  private $table = "siswa";
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getAllSiswa(){
    $this->db->query("SELECT * FROM {$this->table}");
    return $this->db->resultAll();
  }

  public function getSiswaById($id){
    $this->db->query("SELECT * FROM {$this->table} WHERE id = :id");
    $this->db->bind("id", $id);
    return $this->db->result();
  }

  public function addSiswa($data){
    $this->db->query("INSERT INTO {$this->table} VALUES(:id, :NISN, :NIS, :nama, :alamat, :kelas_id, :pengguna_id, :pembayaran_id)");
    $this->db->bind("id", $data['id']);
    $this->db->bind("NISN", $data['NISN']);
    $this->db->bind("NIS", $data['NIS']);
    $this->db->bind("nama", $data['nama']);
    $this->db->bind("alamat", $data['alamat']);
    $this->db->bind("kelas_id", $data['kelas_id']);
    $this->db->bind("pengguna_id", $data['pengguna_id']);
    $this->db->bind("pembayaran_id", $data['pembayaran_id']);
    return $this->db->rowCount();
}
  
public function editPetugas($data){
  $this->db->query("UPDATE {$this->table} SET nisn = :nisn, nis = :nis, nama = :nama, alamat = :alamat, telepon = :telepon, kelas_id = :kelas_id, pengguna_id = :pengguna_id, pembayaran_id = :pembayaran_id WHERE id = :id");
  $this->db->bind('id', $data['id']);
  $this->db->bind('nisn', $data['nisn']);
  $this->db->bind('nis', $data['nis']);
  $this->db->bind('nama', $data['nama']);
  $this->db->bind('alamat', $data['alamat']);
  $this->db->bind('telepon', $data['telepon']);
  $this->db->bind('kelas_id', $data['kelas_id']);
  $this->db->bind('pengguna_id', $data['pengguna_id']);
  $this->db->bind('pembayaran_id', $data['pembayaran_id']);
  return $this->db->rowCount();
}

public function deletePetugas($id){
  $this->db->query("DELETE FROM {$this->table} WHERE id = :id");
  $this->db->bind("id", $id['id']);
  return $this->db->rowCount();
}
}