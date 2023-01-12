<h1><?= $data['title']; ?></h1>

<h3>Datum: <?= $data["Date"] ?></h3>
<h5>Tijd: <?= $data["Time"] ?></h5>



<table border="1">
    <thead>
        <th>Onderwerp</th>
    </thead>
    <tbody>
        <?= $data['rows']; ?>
    </tbody>
</table>
<br>
<a href="<?= URLROOT; ?>/lessen/addTopic/<?= $data['lessonId']  ?>">
    <input type="button" value="Onderwerp toevoegen">
</a>