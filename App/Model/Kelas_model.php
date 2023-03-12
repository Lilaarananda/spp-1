<?php

class Kelas_model {
  private $table = "kelas";
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getAllKelas(){
    $this->db->query("SELECT * FROM {$this->table}");
    return $this->db->resultAll();
  }

  public function getKelasById($id){
    $this->db->query("SELECT * FROM {$this->table} WHERE id = :id");
    $this->db->bind("id", $id);
    return $this->db->result();
  }

  public function addKelas($data){
    $this->db->query("INSERT INTO {$this->table} VALUES(:id, :nama, :kompetensi_keahlian)");
    $this->db->bind("id", $data['id']);
    $this->db->bind("nama", $data['nama']);
    $this->db->bind("kompetensi_keahlian", 'kompetensi_keahlian');
    return $this->db->rowCount();
}
  
public function editKelas($data){
  $this->db->query("UPDATE {$this->table} SET nama = :nama, kompetensi_keahlian = :kompetensi_keahlian WHERE id = :id"); 
  $this->db->bind("id", $data['id']);
  $this->db->bind("nama", $data['nama']);
  $this->db->bind("kompetensi_keahlian", $data['kompetensi_keahlian']);
  $this->db->rowCount();
}

public function deleteKelas($data){
  $this->db->query("DELETE FROM {$this->table} WHERE id = :id");
  $this->db->bind("id", $data['id']);
  return $this->db->rowCount();
}
}