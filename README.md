# VAII Cvičenie 04
Momentálne je otvorená branch __MAIN__, ktorá obsahuje _štartér_. Riešenie obsahuje branch  __SOLUTION__.

### Jednoduchá algoritmizačná úloha
1. V cykle vypíšte čísla od 1 do 10, pričom v každom riadku vypíšte jedno číslo.
2. Naprogramujte výpočet faktoriálu.
   * Túto funkciu umiestnite do samostatného súboru a volajte ju z `index.php`.
   * Skúste cez krokovanie v debugu zmeniť hodnotu premennej.

### Osoby

1. V súbore `data/osoby.csv` sa nachádza zoznam osôb.
   3. Načítajte tento zoznam a vypíšte ho v riadkoch. Logiku načítavania umiestnite do samostatnej triedy, ktorá po načítaní vráti pole osôb. Dáta o osobe bude obsahovať samostatná trieda.
4. Vytvorte samostatnu logiku, ktorá zoznam osôb zobrazí vo forme TEXTOVEJ tabuľky, takto:
      ```php
      ----------------------------
      |Jasna    |Janka   |1980 |f|
      |Fnukol   |Peter   |1967 |m|
      |Hrkút    |Patrik  |2003 |m|
      |Kukuričná|Patricia|2010 |f|
      |Chytil   |Leopold |1980 |m|
      |Ďuráčik  |Michal  |2015 |m|
      |Michová  |Michaela|1967 |f|
      |Janech   |Ján     |1996 |m|
      |Odinson  |Thor    |-9999|m|
      |Zbožná   |Terézia |2000 |f|
      |Nálepná  |Gitka   |1980 |f|
      |Abdul    |Joáchim |1982 |m|
      |Zuzulová |Zuzana  |1998 |f|
      |Janda    |Dalibor |1998 |m|
      |Maiga    |Ibrahim |1998 |m|
      |Hnát     |Juraj   |2021 |m|
      |Janka    |Ján     |2013 |m|
      |Mravec   |Fedor   |1999 |m|
      |Kapustová|Alžbeta |2020 |f|
      |Bojovnica|Xenia   |1987 |f|
      ----------------------------
      ```
   * Pozor na veľkosti buniek v jednotlivých stĺpcoch. Ich veľkosť sa rovná najdlšej bunke z daného stĺpca.
5. Pod aktuálnu tabuľku vypísťe druhú zoradenú podľa priezviska
8. Pridajte výpis štatistík (logika opäť do samostatnej triedy):
   * Najmladšiu a najstaršiu osobu
   * Počet mužov a žien 
   * Rok v ktorom sa narodilo najviac osôb



## Ako nájsť branch môjho cvičenia?
Pokiaľ sa chcete dostať k riešeniu z cvičenia je potrebné otvoriť si príslušnú _branch_, ktorej názov sa skladá:

__MIESTNOST__ + "-" + __HODINA ZAČIATKU__ + "-" + __DEN__

Ak teda navštevujete cvičenie pondelok o 08:00 v RA323, tak sa branch bude volať: __RA323-08-PON__
