<link rel="stylesheet" href="public/css/style.css">

<br>
<h1>Overzivht Mankement</h1>
<br>



<h2>Instructor Naam: <?= $data["instructorName"] ?></h2>
<h2>Emailadres: <?= $data["Email"] ?></h2>
<h2>Kenteken auto: <?= $data["Kenteken"] ?></h2>

<table border="1">
    <thead>
        <th>Datum</th>
        <th>Mankement</th>
    <tbody>
        <?= $data['rows']; ?>
    </tbody>
    </thead>
</table>
<br>
<br>
<a href="<?= URLROOT; ?>/Mankement/addMankement/<?= $data['MankementId']  ?>">
    <input type="button" value="Onderwerp toevoegen">
</a>