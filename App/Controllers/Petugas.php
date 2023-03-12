<?php
    class Petugas extends Controller
    {
        public function index()
        {
            $this->view('home/petugas/index');
        }


        public function TransaksiPetugas()
        {
            $data['transaksi'] = $this->model('Transaksi_model')->getAllTransaksi();
            $this->view('home/petugas/transaksiPetugas/transaksi', $data);
        }
    }