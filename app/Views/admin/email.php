<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container">
  <button onclick="window.print()" type="button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true">&nbsp; Print</i></button>
  <a href="<?= base_url('admin/delete/' . $s->id); ?>" onclick="return confirm('Apakah Anda Yakin?');" type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true">&nbsp; Hapus</i></a>
  <hr class="line">
  <style>
    .p1 {
      font-family: "Times New Roman", Times, serif;
      color: black;
    }

    hr.garis {
      border: 1px solid black;
    }

    .page {
      width: 21cm;
      min-height: 29.7cm;
      padding: 1cm;
      margin: 1cm auto;
      border: 1px black solid;
      border-radius: 5px;
      background: white;
    }

    .subpage {
      padding: 1cm;
      border: 1px black solid;
      height: 340mm;
      outline: 1cm transparent;
    }

    @page {
      size: A4;
      margin: 0;
    }

    @media print {
      @page {
        margin-bottom: 10px;
      }

      .navbar-nav,
      .btn,
      .line,
      footer,
      a#debug-icon-link {
        display: none;
      }

      .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
      }
    }
  </style>
  <div class="book">
    <div class="page">
      <div class="subpage">
        <div class="row">
          <div class="col-sm-3"><img src="<?= base_url(); ?>/img/logo2.png" width="130" class="mb-3"></div>
          <div class="col-sm-9 p1 text-center">
            <h8>KEJAKSAAN REPUBLIK INDONESIA</h8>
            <h6>KEJAKSAAN TINGGI SUMATERA SELATAN</h6>
            <h5>KEJAKSAAN NEGERI PALEMBANG</h5>
            <p class="h6">Jln.Gubernur H. Achmad Bastari No. 165 Keluaran Silaberanti Kecamatan Seberang Ulu 1 Jakabaring Palembang 30252 (0711)517527</p>
          </div>
        </div>
        <hr class="garis">
        <div class="row">
          <div class="col-sm-8">
            <dl class="row">
              <dt class="col-sm-2 p1">Kepada</dt>
              <dd class="col-sm-10 p1">: &nbsp<?= $s->kepada; ?></dd>

              <dt class="col-sm-2 p1">Perihal</dt>
              <dd class="col-sm-10 p1">: &nbsp<?= $s->subject; ?></dd>

              <dt class="col-sm-2 p1">Dari </dt>
              <dd class="col-sm-10 p1">: &nbsp<?= $s->email; ?></dd>
            </dl>
          </div>
          <div class="col-sm-4">
            <p class="h6 p1 float-right">Palembang, <?= date('d F Y', strtotime($s->created_at)); ?></p>
          </div>
        </div>
        <div class="text-center p1">Isi Komplain</div>
        <div class="text-justify p1 mt-3">
          <p><?= $s->complain; ?></p>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>