<?php echo $data["title"]; ?>
<li>
  <a href="<?= URLROOT; ?>homepages/index">homepage</a>
</li>

<li>
  <a href="<?= URLROOT; ?>countries/index">Landenoverzicht</a>
</li>

<li>
  <a href="<?= URLROOT; ?>lessen/index">Lesrooster weergeven</a>
</li>
<a href="<?= URLROOT; ?>/countries/Create">New record</a>
<table>
  <thead>
    <th>id</th>
    <th>Land</th>
    <th>hoofdstad</th>
    <th>continent</th>
    <th>aantalinwoners</th>
  </thead>
  <tbody>
    <?= $data['countries'] ?>
  </tbody>
</table>
<a href="<?= URLROOT; ?>/homepages/index">terug</a>