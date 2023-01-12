<link rel="stylesheet" href="public/css/style.css">


<h1>Overzivht Mankement</h1>
<br>
<br>


<h1><?= $data["title"]; ?></h1>

<li>
    <a href="<?= URLROOT; ?>/homepages/index">homepage</a>
</li>

<li>
    <a href="<?= URLROOT; ?>/countries/index">Landenoverzicht</a>
</li>

<li>
    <a href="<?= URLROOT; ?>/lessen/index">Lesrooster weergeven</a>
</li>


<h2>Instructor Naam: <?= $data["instructorName"] ?></h2>
<table border="1">
    <thead>
        <th>Datum</th>
        <th>Tijd</th>
        <th>Naam leerling</th>
        <th>Lesinfo</th>
        <th>Onderwerp</th>
    <tbody>
        <?= $data['rows']; ?>
    </tbody>
    </thead>
</table>