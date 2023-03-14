<?php
    class Pembayaran_model
    {
        private $table = 'pembayaran';
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getAllPembayaran()
        {
            $this->db->query('SELECT * FROM ' . $this->table);
            return $this->db->resultAll();
        }

        public function getPembayaranById($id)
        {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
            $this->db->query($query);
            $this->db->bind('id', $id);
            return $this->db->result();
        }

        public function createPembayaran($data)
        {
            $this->db->query("INSERT INTO {$this->table} VALUES(NULL, :tahun_ajaran, :nominal)");
            $this->db->bind('tahun_ajaran', $data['tahun_ajaran']);
            $this->db->bind('nominal', $data['nominal']);
            return $this->db->rowCount();
        }

        public function updatePembayaran($data)
        {
            $this->db->query("UPDATE {$this->table} SET tahun_ajaran = :tahun_ajaran, nominal = :nominal WHERE id = :id");
            $this->db->bind('id', $data['id']);
            $this->db->bind('tahun_ajaran', $data['tahun_ajaran']);
            $this->db->bind('nominal', $data['nominal']);
            return $this->db->rowCount();
        }

        public function deletePembayaran($id)
        {
            $this->db->query("DELETE FROM {$this->table} WHERE id = :id");
            $this->db->bind('id', $id);
            return $this->db->rowCount();
        }

    }