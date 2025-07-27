<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'Daftar Buku'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 30px;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 960px;
        }
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .user-info {
            text-align: right;
        }

        
        .pagination {
            justify-content: center;
        }
        .pagination .page-item .page-link {
            border-radius: 0.3rem;
            margin: 0 3px;
            border: none;
            font-weight: 500;
            color: #0d6efd;
            background-color: #e9ecef;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .pagination .page-item.active .page-link {
        
            background-image: linear-gradient(to right, #0d6efd 0%, #0a58ca 100%);
            color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }
        .pagination .page-item:not(.active) .page-link:hover {
            background-color: #dee2e6;
            color: #0a58ca;
            transform: translateY(-1px);
        }
        .pagination .page-item.disabled .page-link {
            color: #6c757d;
            background-color: #f8f9fa;
            box-shadow: none;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <div class="header-container">
            <h1><?= esc($title ?? 'Daftar Buku'); ?></h1>
            <div class="user-info">
                <span>Selamat datang, <strong><?= esc(session()->get('nama_lengkap')); ?></strong>!</span>
                <a href="/logout" class="btn btn-outline-danger btn-sm ms-2">Logout</a>
            </div>
        </div>


        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <div class="d-flex justify-content-between mb-3">
            <a href="/buku/create" class="btn btn-primary">Tambah Buku Baru</a>
            <form action="/buku" method="get" class="d-flex">
                <input type="text" class="form-control me-2" name="keyword" placeholder="Cari buku..." value="<?= esc($keyword ?? ''); ?>">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </form>
        </div>

        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 + (5 * ( (isset($_GET['page_buku']) ? $_GET['page_buku'] : 1) - 1) ); ?>
                <?php if (!empty($buku)) : ?>
                    <?php foreach ($buku as $b) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= esc($b['judul']); ?></td>
                        <td><?= esc($b['penulis']); ?></td>
                        <td><?= esc($b['penerbit']); ?></td>
                        <td>
                            <a href="/buku/edit/<?= $b['id_buku']; ?>" class="btn btn-sm btn-warning">Edit</a>
                            <form action="/buku/delete/<?= $b['id_buku']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data buku ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        
        <div class="mt-4">
            <?= $pager->links('buku', 'custom_pagination'); ?>
        </div>
    </div>
</body>
</html>
