 <?php

 class Admin extends Controller{
  public function index() {
    $data = [
      'user' => $this->model("User_model")->getAllUsers(),
    ];
    $this->view("templates/header");
    $this->view("admin/index");
    $this->view("templates/footer");
  }

  public function Petugas(){
    $data = [
      'petugas' =>$this->model("petugas_model")->getAllPetugas(),
    ];
    $this->view("templates/header/petugas");
    $this->view("admin/petugas/index");
    $this->view("templates/footer");
  }

  public function siswa(){
    $data = [
      'siswa' =>$this->model("siswa_model")->getAllSiswa(),
    ];
    $this->view("templates/header/siswa");
    $this->view("admin/siswa/index");
    $this->view("templates/footer");
  }

  public function kelas(){
    $data = [
        'kelas' => $this->model("Kelas_model")->getAllKelas(),
    ];
    $this->view("templates/header/kelas");
    $this->view("admin/kelas/index");
    $this->view("templates/footer");
}

  // add //
  public function addPetugas()
  {
    $this->view("templates/header");
    $this->view("admin/Petugas/add");
    $this->view("templates/footer");
  }

  public function addUser() {
    $this->view("templates/header");
    $this->view("admin/User/add");
    $this->view("templates/footer");
  }

  public function addSiswa() {
     $this->view("templates/header");
     $this->view("admin/Siswa/add");
     $this->view("templates/footer");
  }

  public function addKelas(){
    $this->view("templates/header");
    $this->view("admin/Kelas/Add");
    $this->view("templates/footer");
  }
// end add

// add Act
public function tambahKelasAct(){
  if($this->model("Kelas_model")->tambahPengguna($_POST) > 0){
      $id_pengguna = $this->model("Kelas_model")->getLastInsertedId();
      if($this->model("Kelas_model")->tambahSiswa($_POST, $id_pengguna) > 0){
          Flasher::setFlash("Kelas", "Berhasil Ditambahkan", "success");
          Redirect::to("admin/Kelas");
      } else{
          Flasher::setFlash("Kelas", "Gagal Ditambahkan", "danger");
          Redirect::to("admin/Kelas");
      }
  } else{
      Flasher::setFlash("Kelas", "Gagal Ditambahkan", "danger");
      Redirect::to("admin/Kelas");
  }
}
public function tambahPetugasAct(){
        if($this->model("Petugas_model")->tambahPengguna($_POST) > 0){
          $id_pengguna = $this->model("Petugas_model")->getLastInsertedId();
          if($this->model("Petugas_model")->tambahSiswa($_POST, $id_pengguna) > 0){
              Flasher::setFlash("Petugas", "Berhasil Ditambahkan", "success");
              Redirect::to("admin/Petugas");
          } else{
              Flasher::setFlash("Petugas", "Gagal Ditambahkan", "danger");
              Redirect::to("admin/Petugas");
          }
      } else{
          Flasher::setFlash("Petugas", "Gagal Ditambahkan", "danger");
          Redirect::to("admin/Petugas");
      }
  }

public function tambahSiswaAct(){
  if($this->model("Siswa_model")->tambahPengguna($_POST) > 0){
      $id_pengguna = $this->model("Siswa_model")->getLastInsertedId();
      if($this->model("User_model")->tambahSiswa($_POST, $id_pengguna) > 0){
          Flasher::setFlash("Siswa", "Berhasil Ditambahkan", "success");
          Redirect::to("admin/siswa");
      } else{
          Flasher::setFlash("Siswa", "Gagal Ditambahkan", "danger");
          Redirect::to("admin/siswa");
      }
  } else{
      Flasher::setFlash("Siswa", "Gagal Ditambahkan", "danger");
      Redirect::to("admin/siswa");
  }
}

// edit
  public function editPetugas($id) {
  $data = [
    'petugas' => $this->model("Petugas_model")->getPetugasById($id),
  ];
  $this->view("templates/header");
  $this->view("admin/Petugas/edit");
  $this->view("templates/footer");
  }

  public function editKelas($data) {
    $data = [
      'kelas' =>$this->model("Kelas_model")->getKelasByData($data),
    ];
    $this->view("templates/header");
    $this->view("admin/Kelas/edit");
    $this->view("template/footer");
  }

  public function editUser($id)
  {
    $data = [
      'user' => $this->model("user_model")->getUserById($id),
    ];
    $this->view("template/header");
    $this->view("admin/User/edit");
    $this->view("templates/footer");
  }

  public function editSiswa($data){
    $data = [
      'siswa' =>$this->model("siswa_model")->getSiswaByData($data),
    ];
    $this->view("templates/header");
    $this->view("admin/Siswa/edit");
    $this->view("templates/footer");
  }
// end edit

// edit act
public function editKelasAct(){
  if($this->model("Kelas_model")->editKelas($_POST) > 0){ 
      if($this->model("Kelas_model")->editKelas($_POST) > -1){
          Flasher::setFlash("kelas", "Berhasil Diedit", "success");
          Redirect::to("admin/Kelas");
      } else{
          Flasher::setFlash("Kelas", "Gagal Diedit", "danger");
          Redirect::to("admin/Kelas");
      }
  }
}

public function editSiswaAct(){
  if($this->model("Siswa_model")->editSiswa($_POST) > 0){ 
      if($this->model("Siswa_model")->editPengguna($_POST) > -1){
          Flasher::setFlash("Siswa", "Berhasil Diedit", "success");
          Redirect::to("admin/Siswa");
      } else{
          Flasher::setFlash("Siswa", "Gagal Diedit", "danger");
          Redirect::to("admin/Siswa");
      }
  }
}

public function editPetugasAct(){
  if($this->model("Petugas_model")->editPetugas($_POST) > 0){ 
      if($this->model("Petugas_model")->editPengguna($_POST) > -1){
          Flasher::setFlash("Petugas", "Berhasil Diedit", "success");
          Redirect::to("admin/petugas");
      } else{
          Flasher::setFlash("Petugas", "Gagal Diedit", "danger");
          Redirect::to("admin/petugas");
      }
  }
}

  // delete
  public function deleteKelas(){
    if($this->model("Kelas_model")->deleteKelas($_POST) > 0){ 
        Flasher::setFlash("Kelas", "Berhasil Dihapus", "success");
        Redirect::to("admin/Kelas");
    } else{
        Flasher::setFlash("Kelas", "Gagal Dihapus", "danger");
        Redirect::to("admin/Kelas");
    }
}

  public function deleteSiswa(){
    if($this->model("Siswa_model")->deleteSiswa($_POST) > 0){ 
        Flasher::setFlash("Siswa", "Berhasil Dihapus", "success");
        Redirect::to("admin/Siswa");
    } else{
        Flasher::setFlash("Siswa", "Gagal Dihapus", "danger");
        Redirect::to("admin/Siswa");
    }
}

  public function deletePetugas(){
    if($this->model("User_model")->deletePetugas($_POST) > 0){ 
        Flasher::setFlash("Petugas", "Berhasil Dihapus", "success");
        Redirect::to("admin/petugas");
    } else{
        Flasher::setFlash("Petugas", "Gagal Dihapus", "danger");
        Redirect::to("admin/petugas");
    }
}


// Pembayaran
public function pembayaran(){
  $data = [
    'pembayaran' => $this->$this->model("pembayaran_model")->getAllPembayaran(),
  ];
  $this->view("templates/header");
  $this->view("admin/pembayaran/add");
  $this->view("templates/footer");
}

public function tambahPembayaranAct(){
  if($this->model("Pembayaran_model")->tambahPembayaran($_POST) > 0){
      Flasher::setFlash("Pembayaran", "Berhasil Ditambahkan", "success");
      Redirect::to("admin/pembayaran");
  } else{
      Flasher::setFlash("Pembayaran", "Gagal Ditambahkan", "danger");
      Redirect::to("admin/pembayaran");            
  }
}

public function editPembayaranAct(){
  if($this->model("Pembayaran_model")->editPembayaran($_POST) > 0){
      Flasher::setFlash("Pembayaran", "Berhasil Diedit", "success");
      Redirect::to("admin/pembayaran");
  } else{
      Flasher::setFlash("Pembayaran", "Gagal Diedit", "danger");
      Redirect::to("admin/pembayaran");
  }
}

public function deletePembayaranAct(){
  if($this->model("Pembayaran_model")->deletePembayaran($_POST) > 0){
      Flasher::setFlash("Pembayaran", "Berhasil Dihapus", "success");
      Redirect::to("admin/pembayaran");
  } else{
      Flasher::setFlash("Pembayaran", "Gagal Dihapus", "danger");
      Redirect::to("admin/pembayaran");
  }
}

// transaksi
public function transaksi(){
  $data = [
      "siswa" => $this->model("User_model")->getAllSiswa(),
      "kelas" => $this->model("Kelas_model")->getAllKelas(),
  ];

  $this->view("templates/header");
  $this->view("admin/transaksi/index");
  $this->view("templates/footer");
}

public function transaksiDetailKelas($kelas_id){
  $data = [
      "siswa" => $this->model("User_model")->getAllSiswaByKelasId($kelas_id),
  ];

  $this->view("templates/header");
  $this->view("admin/transaksi/detailKelas");
  $this->view("templates/footer");
}

public function transaksiDetailSiswa($id, $pembayaran_id){
  $data = [
      "siswa" => $this->model("User_model")->getSiswaById($id),
      'transaksi' => $this->model("Transaksi_model")->getTransaksiBySiswaPembayaranId($id, $pembayaran_id),
      'totalPembayaran' => $this->model("Transaksi_model")->countTotalPembayaranSiswaById($id),
      'bulan' =>  ['Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'],
      'created' => true,
  ];

  $this->view("templates/header");
  $this->view("admin/transaksi/detailSiswa");
  $this->view("templates/footer");
}

public function transaksiAct(){
  if($this->model("Transaksi_model")->transaksi($_POST) > 0){
      Flasher::setFlash("Transaksi SPP", "Berhasil", "success");
      Redirect::to("admin/transaksiDetailSiswa/{$_POST['siswa_id']}/{$_POST['pembayaran_id']}");
  } else{
      Flasher::setFlash("Transaksi SPP", "Gagal", "danger");
      Redirect::to("admin/transaksiDetailSiswa/{$_POST['siswa_id']}/{$_POST['pembayaran_id']}");
  }
}

public function historyTransaksi(){
  $data = [
      'transaksi' => $this->model("Transaksi_model")->getAllTransaksi(),
      'section' => 'history_transaksi',
  ];
  
  $this->view("templates/header");
  $this->view("admin/transaksi/historyTransaksi");
  $this->view("templates/footer");
}
 }