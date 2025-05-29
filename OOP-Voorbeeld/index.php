<?php
session_start();
require_once 'classes.php';

if (!isset($_SESSION['gebruiker'])) {
    $_SESSION['gebruiker'] = serialize(new Gebruiker("Jan"));
}

$gebruiker = unserialize($_SESSION['gebruiker']);

// Verwerken van formulier
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $actie = $_POST['actie'] ?? '';

    if ($actie === 'nieuwe_rekening') {
        $naam = $_POST['rekening_naam'];
        $nummer = $_POST['rekening_nummer'];
        $saldo = floatval($_POST['start_saldo']);
        $rekening = new Bankrekening($naam, $nummer, $saldo);
        $gebruiker->voegRekeningToe($rekening);

    } elseif ($actie === 'transactie_toevoegen') {
        $type = $_POST['type'];
        $bedrag = floatval($_POST['bedrag']);
        $datum = $_POST['datum'];
        $beschrijving = $_POST['beschrijving'];
        $rekeningNummer = $_POST['rekening'];

        $rekening = $gebruiker->getRekening($rekeningNummer);
        if (!$rekening) {
            echo "❌ Ongeldige bankrekening.";
        } else {
            if ($type === 'inkomst') {
                $inkomst = new Inkomst($bedrag, $datum, $beschrijving, $rekening);
                $gebruiker->voegInkomstToe($inkomst);
            } elseif ($type === 'uitgave') {
                $isVast = isset($_POST['is_vast']) ? true : false;
                $uitgave = new Uitgave($bedrag, $datum, $beschrijving, $isVast, $rekening);
                $gebruiker->voegUitgaveToe($uitgave);
            }
        }
    }

    if ($actie === 'verwijder_rekening') {
        $nummer = $_POST['rekening_verwijderen'];
        $gebruiker->verwijderRekening($nummer);
    
    } elseif ($actie === 'bewerk_rekening') {
        $oudNummer = $_POST['rekening_bewerken'];
        $nieuweNaam = $_POST['nieuwe_naam'];
        $nieuwNummer = $_POST['nieuw_rekeningnummer'];
        $gebruiker->wijzigRekening($oudNummer, $nieuweNaam, $nieuwNummer);
    }

    $_SESSION['gebruiker'] = serialize($gebruiker);
}


$overzicht = $gebruiker->getOverzicht();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Maandelijks Budget</title>
</head>
<body>
    <h1>Hallo, </h1>

    <h2>Bankrekening toevoegen</h2>
    <form method="post">
        <label>Rekeningnaam:</label>
        <input type="text" name="rekening_naam" required><br>

        <label>Rekeningnummer:</label>
        <input type="text" name="rekening_nummer" required><br>

        <label>Startsaldo (€):</label>
        <input type="number" step="0.01" name="start_saldo" required><br>

        <input type="hidden" name="actie" value="nieuwe_rekening">
        <button type="submit">Toevoegen</button>
    </form>

    <h2>Bankrekening verwijderen</h2>
    <form method="post">
        <label>Kies rekening:</label>
        <select name="rekening_verwijderen">
            <?php foreach ($gebruiker->getRekeningen() as $rek): ?>
                <option value="<?= $rek->getRekeningNummer() ?>">
                    <?= $rek->getRekeningNaam() ?> (<?= $rek->getRekeningNummer() ?>)
                </option>
            <?php endforeach; ?>
        </select>
        <input type="hidden" name="actie" value="verwijder_rekening">
        <button type="submit">Verwijder</button>
    </form>

    <h2>Bankrekening aanpassen</h2>
    <form method="post">
        <label>Kies rekening:</label>
        <select name="rekening_bewerken">
            <?php foreach ($gebruiker->getRekeningen() as $rek): ?>
                <option value="<?= $rek->getRekeningNummer() ?>">
                    <?= $rek->getRekeningNaam() ?> (<?= $rek->getRekeningNummer() ?>)
                </option>
            <?php endforeach; ?>
        </select><br>

        <label>Nieuwe naam:</label>
        <input type="text" name="nieuwe_naam" required><br>

        <label>Nieuw rekeningnummer:</label>
        <input type="text" name="nieuw_rekeningnummer" required><br>

        <input type="hidden" name="actie" value="bewerk_rekening">
        <button type="submit">Wijzig</button>
    </form>


    <h2>Transacties toevoegen</h2>
    <form method="post">
        <label>Type:</label>
        <select name="type">
            <option value="inkomst">Inkomst</option>
            <option value="uitgave">Uitgave</option>
        </select><br>

        <label>Bedrag:</label>
        <input type="number" step="0.01" name="bedrag" required><br>

        <label>Datum:</label>
        <input type="date" name="datum" required><br>

        <label>Beschrijving:</label>
        <input type="text" name="beschrijving" required><br>

        <label>Bankrekening:</label>
    <select name="rekening" required>
        <?php foreach ($gebruiker->getRekeningen() as $rek): ?>
            <option value="<?= $rek->getRekeningNummer() ?>">
                <?= $rek->getRekeningNaam() ?> (<?= $rek->getRekeningNummer() ?>) – €<?= number_format($rek->getSaldo(), 2) ?>
            </option>
        <?php endforeach; ?>
    </select><br>

        <label>Vaste last?</label>
        <input type="checkbox" name="is_vast"><br>

        <input type="hidden" name="actie" value="transactie_toevoegen">
        <button type="submit">Toevoegen</button>
    </form>

<hr>
<h2>Financieel Overzicht</h2>

    <h3>Inkomsten:</h3>
    <ul>
        <?php foreach ($overzicht['inkomsten'] as $i): ?>
            <li><?= $i->getDatumFormatted() ?> - €<?= $i->getBedrag() ?> - <?= $i->getBeschrijving() ?></li>
        <?php endforeach; ?>
    </ul>

    <h3>Uitgaven:</h3>
    <ul>
        <?php foreach ($overzicht['uitgaven'] as $u): ?>
            <li><?= $u->getDatumFormatted() ?> - €<?= $u->getBedrag() ?> - <?= $u->getBeschrijving() ?> 
                (<?= $u->isVasteLast() ? "Vast" : "Variabel" ?>)
            </li>
        <?php endforeach; ?>
    </ul>

    <h3>Begroting: €<?= $overzicht['saldo'] ?></h3>

    <h2>Overzicht alle Rekeningen</h2>
<ul>
    <?php foreach ($overzicht['rekeningen'] as $rekening): ?>
        <li>
        <?= $rekening->getRekeningNaam() ?> (<?= $rekening->getRekeningNummer() ?>): 
        €<?= number_format($rekening->getSaldo(), 2) ?>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>
