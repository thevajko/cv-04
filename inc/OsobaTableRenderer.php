<?php
require_once __DIR__ . '/Osoba.php';

class OsobaTableRenderer {
    /**
     * Vygeneruje HTML tabuľku zo zoznamu osôb.
     * @param Osoba[] $osoby
     * @return string
     */
    public static function renderTable(array $osoby): string {
        $html = '<table border="1" cellpadding="5" cellspacing="0">';
        $html .= '<thead><tr>';
        $html .= '<th>Meno</th><th>Priezvisko</th><th>Pohlavie</th><th>Rok narodenia</th>';
        $html .= '</tr></thead><tbody>';
        foreach ($osoby as $osoba) {
            if (!$osoba instanceof Osoba) continue;
            $html .= '<tr>';
            $html .= '<td>' . htmlspecialchars($osoba->getMeno()) . '</td>';
            $html .= '<td>' . htmlspecialchars($osoba->getPriezvisko()) . '</td>';
            $html .= '<td>' . htmlspecialchars($osoba->getPohlavie()) . '</td>';
            $html .= '<td>' . htmlspecialchars((string)$osoba->getRokNarodenia()) . '</td>';
            $html .= '</tr>';
        }
        $html .= '</tbody></table>';
        return $html;
    }
}

