<main id="main" class="main">

    <div class="pagetitle">
      <h1 align="center">Petugas</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('home/halaman_utama') ?>">Home</a></li>
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

             
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Hewan</th>
                    <th scope="col">Usia Hewan</th>
                    <th scope="col">Kesehatan Hewan</th>
                    <th scope="col">Jenis Kelamin Hewan</th>
                    <th scope="col">Status Hewan</th>
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

  