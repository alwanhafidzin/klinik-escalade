<?php

header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1">
  <thead>
    <tr>
      <th>Nomor</th>
      <th>Nama Dokter</th>
      <th>Spesialis</th>
      <th>Total Pemeriksaan</th>
    </tr>
  </thead>

  <tbody>

    <?php $i = 1;
    foreach ($perdokter->result() as $result89) : ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $result89->nama_dokter ?></td>
        <td>Dokter <?php echo $result89->spesialis ?></td>
        <td>Rp. <?php echo $result89->money; ?> </td>
      </tr>

    <?php $i++;
    endforeach; ?>
  </tbody>

</table>