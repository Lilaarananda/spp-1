<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-3 mt-5">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Kelas</h1>
    </div>

    <!-- Content Row -->
    <div class="col-xl-6 col-md-6 ml-3">
        <form action="<?= BASE_URL ?>admin/prosesEditKelas" method="post" class="form">
            <div class="form-group">
                <input type="hidden" class="form-control" id="id_kelas" name="id_kelas" value="<?= $data["kelas"]["id_kelas"] ?>" aria-describedby="idKls">
            </div>
            <div class="form-group">
                <label for="nama">Tingkat</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $data["kelas"]["nama"] ?>" aria-describedby="tingkatKls">
            </div>
            <div class="form-group">
                <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
                <input type="text" class="form-control" id="kompetensi_keahlian" name="kompetensi_keahlian" value="<?= $data["kelas"]["kompetensi_keahlian"] ?>" class="form-control" aria-describedby="kompetensi_keahlian">
            </div>

            <div class="d-sm-flex align-items-center justify-content-between">
                <a type="button" class="btn btn-secondary" data-dismiss="modal" href="<?= BASE_URL ?>admin/kelas">Batal</a>
                <button type="submit" class="btn btn-warning">Edit</button>
            </div>
        </form>
    </div>
gaada redirect?
</div>
</div>