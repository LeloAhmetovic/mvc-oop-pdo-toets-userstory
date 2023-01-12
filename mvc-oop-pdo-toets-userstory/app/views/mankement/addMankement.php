<h1><?= $data['title']; ?></h1>

<form action="<? URLROOT; ?>/lessen/addTopic" method="post">
    <label for="topic">Onderwerp</label>
    <input for="text" name="topic" id="topic">
    <input type="hidden" name="id" value="<?= $data['id']; ?>">
    <input type="submit" value="toevoegen">

</form>