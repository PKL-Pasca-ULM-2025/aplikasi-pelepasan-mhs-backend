<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php form_open_multipart(site_url('alumni_terbaik_ulm/save')) ?>
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="no_tpa_nim">No TPA/NIM</label>
        <input type="text" name="no_tpa_nim" id="no_tpa_nim" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="prodi_pilihan_id">Program Studi Pilihan</label>
        <select name="prodi_pilihan_id" id="prodi_pilihan_id" class="form-control" required>
            <?php foreach ($prodiPilihan as $prodi): ?>
                <option value="<?= $prodi->id ?>"><?= esc($prodi->nama_prodi) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="tahun_lulus">Tahun Lulus</label>
        <input type="number" name="tahun_lulus" id="tahun_lulus" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="prodi_terakhir">Program Studi Terakhir</label>
        <input type="text" name="prodi_terakhir" id="prodi_terakhir" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="fakultas_terakhir">Fakultas Terakhir</label>
        <input type="text" name="fakultas_terakhir" id="fakultas_terakhir" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="nim_terakhir">NIM Terakhir</label>
        <input type="number" name="nim_terakhir" id="nim_terakhir" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="ipk">IPK</label>
        <input type="number" name="ipk" id="ipk" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="predikat">Predikat</label>
        <select name="predikat" id="predikat" class="form-control" required>
            <option value="sangat_memuaskan">Sangat Memuaskan</option>
            <option value="pujian">Pujian</option>
        </select>
    </div>
    <div class="form-group">
        <label for="no_hp">No HP</label>
        <input type="text" name="no_hp" id="no_hp" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="berkas">Upload Berkas</label>
        <input type="file" name="berkas" id="berkas" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <?php form_close() ?>
</body>

</html>