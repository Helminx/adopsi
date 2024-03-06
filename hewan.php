<main id="main" class="main">

    <div class="pagetitle">
      <h1 align="center">Petugas</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('home/petugas') ?>">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>
              <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>

              <!-- Table with stripped rows -->
              <a href="<?= base_url('home/tambah_hewan') ?>">
  <button class="btn btn-success">+ Tambah</button>
</a>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Hewan</th>
                    <th scope="col">Usia Hewan</th>
                    <th scope="col">Kesehatan Hewan</th>
                    <th scope="col">Jenis Kelamin Hewan</th>
                    <th scope="col">Status Hewan</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
      <?php

  $no=1;
  foreach($manda as $erwin){
  ?>  

  <tr>
    <td><?= $no++ ?></td>
    <td><?=$erwin->nama_hewan?></td>
    <td><?= $erwin ->usia_hewan?></td>
    <td><?= $erwin ->kesehatan_hewan?></td>
    <td><?= $erwin ->jk_hewan?></td>
    <td><?= $erwin ->status?></td>
   
      <td>
      <a href="<?= base_url('home/edit_hewan/' . $erwin ->id_hewan) ?>">
     <button class=" btn btn-warning">Edit</button>
    </a>

    <a href="<?= base_url('home/hapus_hewan/' . $erwin ->id_hewan) ?>">
     <button class=" btn btn-danger">Hapus</button>
      </a>
    </td>

  </tr>
  <?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  