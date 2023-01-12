<h1><?= $data['title']; ?></h1>


<form action="<?= URLROOT; ?>/countries/create" method="post">
    <table>
        <tbody>
            <tr>
                <td>Land</td>
                <td>
                    <input type="text" name="name" id="name">
                </td>
            </tr>
            <tr>
                <td>capitalCity</td>

                <td>
                    <input type=" text" name="capitalCity" id="capitalCity">
                </td>
            </tr>
            <tr>
                <td>continent</td>

                <td>
                    <input type=" text" name="continent" id="continent">

                </td>
            </tr>
            <tr>
                <td>population</td>

                <td>
                    <input type=" text" name="population" id="population">

                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Verzenden">
                </td>
            </tr>
        </tbody>
    </table>
</form>