<?php
// classes.php

abstract class FinanciëleTransactie {
    protected $bedrag;
    protected $datum;
    protected $beschrijving;

    public function __construct($bedrag, $datum, $beschrijving) {
        $this->bedrag = $bedrag;
        $this->datum = $datum;
        $this->beschrijving = $beschrijving;
    }

    abstract public function getType();

    public function getBedrag() {
        return $this->bedrag;
    }

    public function getDatum() {
        return $this->datum;
    }

    public function getBeschrijving() {
        return $this->beschrijving;
    }

    public function getDatumFormatted() {
        return date('d-m-Y', strtotime($this->datum));
    }
}

class Inkomst extends FinanciëleTransactie {
    private $rekening;

    public function __construct($bedrag, $datum, $beschrijving, Bankrekening $rekening) {
        parent::__construct($bedrag, $datum, $beschrijving);
        $this->rekening = $rekening;
        $this->rekening->stort($bedrag);
    }

    public function getType() {
        return "Inkomst";
    }

    public function getRekening() {
        return $this->rekening;
    }
}

class Uitgave extends FinanciëleTransactie {
    private $isVast;
    private $rekening;

    public function __construct($bedrag, $datum, $beschrijving, $isVast, Bankrekening $rekening) {
        parent::__construct($bedrag, $datum, $beschrijving);
        $this->isVast = $isVast;
        $this->rekening = $rekening;
        $this->rekening->neemOp($bedrag);
    }

    public function isVasteLast() {
        return $this->isVast;
    }

    public function getType() {
        return "Uitgave";
    }

    public function getRekening() {
        return $this->rekening;
    }
}
class Gebruiker {
    private $naam;
    private $inkomsten = [];
    private $uitgaven = [];
    private $rekeningen = [];

    public function __construct($naam) {
        $this->naam = $naam;
    }

    public function voegRekeningToe(Bankrekening $rekening) {
        $this->rekeningen[$rekening->getRekeningNummer()] = $rekening;
    }

    public function getRekeningen() {
        return $this->rekeningen;
    }

    public function getRekening($nummer) {
        return $this->rekeningen[$nummer] ?? null;
    }

    public function voegInkomstToe(Inkomst $inkomst) {
        $this->inkomsten[] = $inkomst;
    }

    public function voegUitgaveToe(Uitgave $uitgave) {
        $this->uitgaven[] = $uitgave;
    }

    public function getSaldo() {
        $totaal = 0;
        foreach ($this->rekeningen as $rekening) {
            $totaal += $rekening->getSaldo();
        }
        return $totaal;
    }

    public function getOverzicht() {
        return [
            'inkomsten' => $this->inkomsten,
            'uitgaven' => $this->uitgaven,
            'saldo' => $this->getSaldo(),
            'rekeningen' => $this->rekeningen
        ];
    }

    public function verwijderRekening($rekeningNummer) {
        if (isset($this->rekeningen[$rekeningNummer])) {
            unset($this->rekeningen[$rekeningNummer]);
        }
    }

    public function wijzigRekening($oudRekeningNummer, $nieuweNaam, $nieuwRekeningNummer) {
        if (isset($this->rekeningen[$oudRekeningNummer])) {
            $rekening = $this->rekeningen[$oudRekeningNummer];
            unset($this->rekeningen[$oudRekeningNummer]);
    
            $rekening->setRekeningNaam($nieuweNaam);
            $rekening->setRekeningNummer($nieuwRekeningNummer);
    
            $this->rekeningen[$nieuwRekeningNummer] = $rekening;
        }
    }
}



class Bankrekening {
    private $rekeningNaam;
    private $rekeningNummer;
    private $saldo;

    public function __construct($rekeningNaam, $rekeningNummer, $startSaldo = 0.0) {
        $this->rekeningNaam = $rekeningNaam;
        $this->rekeningNummer = $rekeningNummer;
        $this->saldo = $startSaldo;
    }

    public function stort($bedrag) {
        $this->saldo += $bedrag;
    }

    public function neemOp($bedrag) {
        $this->saldo -= $bedrag;
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function getRekeningNummer() {
        return $this->rekeningNummer;
    }

    public function getRekeningNaam() {
        return $this->rekeningNaam;
    }

    public function setRekeningNaam($naam) {
        $this->rekeningNaam = $naam;
    }

    public function setRekeningNummer($nummer) {
        $this->rekeningNummer = $nummer;
    }
}
