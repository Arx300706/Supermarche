<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil - Caisse</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            color: #222;
            background: #f5f7f8;
        }

        .page {
            max-width: 720px;
            margin: 0 auto;
        }

        .panel {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 22px;
        }

        h1 {
            margin-top: 0;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        select {
            width: 100%;
            max-width: 460px;
            padding: 10px;
            border: 1px solid #bbb;
            border-radius: 4px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 16px;
            border: 0;
            border-radius: 4px;
            background: #0b62a3;
            color: #fff;
            cursor: pointer;
        }

        .error {
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
            background: #fdecec;
            color: #9d1c1c;
            border: 1px solid #f3baba;
        }
    </style>
</head>
<body>
<div class="page">
    <div class="panel">
        <h1>Gestion de caisse</h1>

        <?php if ($error): ?>
            <div class="error"><?= esc($error) ?></div>
        <?php endif; ?>

        <form method="post" action="/caisseSelect">

            <label for="caisse_id">Choisir une caisse</label>

            <select name="caisse_id" id="caisse_id" required>
                <option value="">Selectionner une caisse</option>

                <?php foreach ($caisses as $c): ?>
                    <option value="<?= esc($c['id']) ?>">
                        Caisse #<?= esc($c['id']) ?> |
                        <?= number_format((float) $c['montant_total'], 0, ',', ' ') ?> Ar |
                        <?= esc($c['date']) ?>
                    </option>
                <?php endforeach; ?>

            </select>

            <br>

            <button type="submit">Valider</button>

        </form>
    </div>
</div>

</body>
</html>
