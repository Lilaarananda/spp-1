<?php
    class Siswa extends Controller
    {
        public function index()
        {
            $this->view('home/siswa/index');
        }


        public function TransaksiSiswa()
        {
            $data['transaksi'] = $this->model('Transaksi_model')->getAllTransaksi();
            $this->view('home/Siswa/transaksiSiswa/transaksi', $data);
        }
    }