<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-12">
                <h3>single upload</h3>
                <h4 class="text-danger"><?= $this->session->flashdata('status');?></h4>
                <div class="card">
                    <div class="card-header">
                        upload image
                    </div>
                    <div class="card-body">
                        <?= form_open_multipart('upload/file/add'); ?>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">gambar</label>
                            <div class="col-sm-8">
                                <input type="hidden" name="id" value="">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <Label class="custom-file-label" for="image">pilih file</Label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">simpan</button>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
                <div class="col-sm-12 mt-2">
                    <div class="card">
                        <div class="card-header">
                            hasil upload
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- cek gambar jika ada-->
                                <?php if($images): ?>
                                <?php foreach($images as $image) : ?>
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <img src="<?= base_url('assets/image/'.$image['image']); ?>"
                                                alt="<?= $image['title']; ?>" class="img-thumbnail">
                                        </div>
                                        <div class="card-footer">
                                            <a href="<?= base_url('upload/edit/'. $image['id']); ?>"
                                                class="btn btn-primary">edit</a>
                                            <a href="<?= base_url('upload/delete/'. $image['id']); ?>"
                                                class="btn btn-danger"
                                                onclick="return confirm('apakah yakin akan dihapus gambarnya?')">hapus</a>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <!-- jika tidak ada gambar -->
                                <?php else: ?>
                                <div class="col-sm-4">
                                    <h3 class="text-danger text-center">data masih kosong</h3>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
    </script>
    <script>
    // ketika klik pilih gambar 
    $('.custom-file-input').on('change', function() { //saat class input ini di tekan jalankan fungsi dibawah
        let fileName = $(this).val().split('\\').pop(); // variable untuk ambil value gambar
        $(this).next('.custom-file-label').addClass('selected').html(
            fileName); //cari class label berikut diambil dari variable fileName
    });
    </script>
</body>

</html>