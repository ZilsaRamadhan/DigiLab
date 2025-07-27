<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'Form Edit Buku'); ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
    </style>
</head>
<body>
    <div class="container mt-5" style="max-width: 700px;">
        <div class="card">
            <div class="card-header">
                <h1><?= esc($title ?? 'Form Edit Buku'); ?></h1>
            </div>
            <div class="card-body">
            
                <form action="/buku/update/<?= esc($buku['id_buku']); ?>" method="post">
                    <?= csrf_field(); ?>
                    
                    <input type="hidden" name="_method" value="PUT">
                    
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Buku</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?= esc($buku['judul']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="penulis" name="penulis" value="<?= esc($buku['penulis']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= esc($buku['penerbit']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                        <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?= esc($buku['tahun_terbit']); ?>" placeholder="YYYY">
                    </div>
                    <div class="mb-3">
                        <label for="sinopsis" class="form-label">Sinopsis</label>
                        <textarea class="form-control" id="sinopsis" name="sinopsis" rows="4"><?= esc($buku['sinopsis']); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Buku</button>
                    <a href="/buku" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
