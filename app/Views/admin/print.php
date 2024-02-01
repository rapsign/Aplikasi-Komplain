<?php
//import koneksi ke database
?>
<html>
<head>
  <title><?= $title; ?> </title>
  <link href="<?= base_url();?>/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h6 class="text-center mb-5 mt-5">DAFTAR KOMPLAIN KEJAKSAAN NEGERI</h6>
				<div class="data-tables datatable-dark">
					
                <table class="table table-bordered table-striped table-hover" id="mauexport" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th scope="col">Pengirim</th>
                        <th scope="col">Perihal</th>
                        <th scope="col">Tanggal</th>
                    </tr>
                </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($p as $file) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $file->email; ?></td>
                            <td><?= $file->subject; ?></td>
                            <td><?= $file->created_at; ?></td>
                            </tr>
                    <?php endforeach;?>
                    
                    </tbody>
            </table>
					
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            ,'excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>