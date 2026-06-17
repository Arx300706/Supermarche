<!DOCTYPE html>
<html>
<head>
    <title>Accueil - Caisse</title>
</head>
<body>

<h1>Gestion de caisse</h1>

<form method="post" action="/caisseSelect">

    <label> Choisir une caisse</label><br><br>

    <select name="caisse_id" required>
        <option value=""> </option>

        <?php foreach ($caisses as $c): ?>
            <option value="<?= $c['id'] ?>">
                Caisse #<?= $c['id'] ?> |
                <?= $c['montant_total'] ?> Ar |
                <?= $c['date'] ?>
            </option>
        <?php endforeach; ?>

    </select>

    <br><br>

    <button type="submit">Valider</button>

</form>

</body>
</html>