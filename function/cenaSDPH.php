<?php
// Funkce pro pøidání DPH
function cenaSDPH($cenaBezDPH) {
    $DPH = 0.21; // 21% DPH
    $cenaSDPH = $cenaBezDPH * (1 + $DPH);
    return $cenaSDPH;
}
