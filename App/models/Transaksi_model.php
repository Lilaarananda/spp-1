<?php

class Kelas_model {
  private $table = "transaksi";
  private $pembayaran ='pembayaran';
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getAllTransaksi(){
    $this->db->query("SELECT * FROM {$this->table}");
    return $this->db->resultAll();
  }

  public function getTransaksiById($id){
    $this->db->query("SELECT * FROM {$this->table} WHERE id = :id");
    $this->db->bind("id", $id);
    return $this->db->result();
  }

  public function addTransaksi($data){
    $this->db->query("INSERT INTO {$this->table} VALUES(NULL, :tahun_ajaran, :nominal)");
            $this->db->bind('tahun_ajaran', $data['tahun_ajaran']);
            $this->db->bind('nominal', $data['nominal']);
            return $this->db->rowCount();
}
  
public function editKelas($data){
  $this->db->query("UPDATE {$this->table} SET tahun_ajaran = :tahun_ajaran, nominal = :nominal WHERE id = :id");
            $this->db->bind('id', $data['id']);
            $this->db->bind('tahun_ajaran', $data['tahun_ajaran']);
            $this->db->bind('nominal', $data['nominal']);
            return $this->db->rowCount();
}

public function deletePembayaran($data){
  $this->db->query("DELETE FROM {$this->table} WHERE id = :id");
  $this->db->bind("id", $data['id']);
  return $this->db->rowCount();
}
}