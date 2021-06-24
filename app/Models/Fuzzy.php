<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fuzzy extends Model
{
    //mulai fuzzy variabel
    protected $TGelTinggi       = 0;
    protected $TGelSedang       = 0;
    protected $TGelRendah       = 0;
    protected $intervalTGel     = 0;

    protected $ArusLambat   = 0;
    protected $ArusSedang   = 0;
    protected $ArusCepat    = 0;
    protected $intervalArus = 0;

    protected $GempaPutih       = 0;
    protected $GempaHijau       = 0;
    protected $GempaKuning      = 0;
    protected $GempaJingga      = 0;
    protected $GempaMerah       = 0;

    protected $StatusAman        = 0;
    protected $StatusAwas        = 0;
    protected $StatusBahaya      = 0;
    protected $intervalStatus    = 0;

    //selesai fuzzy variable

    //start fuzzy process value variable
    protected $TGelVal = 0;
    protected $ArusVal   = 0;
    protected $GempaVal   = 0;
    protected $StatusVal   = 0;

    protected $TGelSaveVal   = 0;
    protected $TGelUnsaveVal = 0;
    
    protected $ArusSaveVal   = 0;
    protected $ArusUnsaveVal = 0;
    
    protected $doLowVal  = 0;
    protected $doHighVal = 0;

    protected $ztLowVal   = 0;
    protected $ztMedVal   = 0;
    protected $ztHighVal  = 0;
    protected $minPredict = 2.3;
    //end fuzzy process value variable

    private function setValue($chro) {
        $this->TGelTinggi    = isset($chro['TGelTinggi']) ? $chro['TGelTinggi'] : 21;
        $this->TGelSedang    = isset($chro['TGelSedang']) ? $chro['TGelSedang'] : 29;
        $this->TGelRendah  = isset($chro['TGelRendah']) ? $chro['TGelRendah'] : 22;
        $this->intervalTGel = $this->tempUnsafeB - $this->tempSafeA;
        
        $this->ArusLambat    = isset($chro['ArusLambat']) ? $chro['ArusLambat'] : 5;
        $this->ArusSedang    = isset($chro['ArusSedang']) ? $chro['ArusSedang'] : 10;
        $this->ArusCepat  = isset($chro['ArusCepat']) ? $chro['ArusCepat'] : 6;
        $this->intervalArus = $this->phUnsafeB - $this->phSafeA;
    
        $this->gempa       = isset($chro['dor1']) ? $chro['dor1'] : 0;
        $this->dor2       = isset($chro['dor2']) ? $chro['dor2'] : 3;
        $this->dot1       = isset($chro['dot1']) ? $chro['dot1'] : 9;
        $this->dot2       = isset($chro['dot2']) ? $chro['dot2'] : 11;
        $this->intervalDO = $this->dot1 - $this->dor2;
    
        $this->ztr        = isset($chro['ztr']) ? $chro['ztr'] : 1.5;
        $this->zts        = isset($chro['zts']) ? $chro['zts'] : 3;
        $this->ztt        = isset($chro['ztt']) ? $chro['ztt'] : 15;
        $this->intervalZT = $this->zts - $this->ztr;        
        // $this->minPredict = count($chro) > 0 ? 2.34 : 4;
    }

}
