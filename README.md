# VAII Cvičenie 04
Momentálne je otvorená vetva __MAIN__, ktorá obsahuje _štartér_. Riešenie obsahuje vetva  __SOLUTION__.

### Jednoduché algoritmizačné úlohy
1. V cykle vypíšte čísla od 1 do 10, pričom v každom riadku vypíšte jedno číslo.
2. Naprogramujte výpočet faktoriálu pre čísla od 1 do 10.
   * Funkciu umiestnite do samostatného súboru a volajte ju z `index.php`.
   * Vyskúšajte ladenie a zmenu hodnoty premennej cykle.

### Osoby

1. V súbore `data/osoby.csv` sa nachádza zoznam osôb.
2. Načítajte tento zoznam a vypíšte ho v riadkoch. Dáta o osobe bude obsahovať samostatná trieda. 
Načítavanie dát môžete umiestniť do samostatnej triedy, ktorá po načítaní vráti pole osôb. 
3. Zobrazte zoznam osôb vo forme TEXTOVEJ tabuľky:

      ```php
      ----------------------------
      |Janka   |Jasna    |1980 |f|
      |Peter   |Fnukol   |1967 |m|
      |Patrik  |Hrkut    |2003 |m|
      |Patricia|Kukuricna|2010 |f|
      |Leopold |Chytil   |1980 |m|
      |Michal  |Duracik  |2015 |m|
      |Michaela|Michova  |1967 |f|
      |Jan     |Janech   |1996 |m|
      |Thor    |Odinson  |-9999|m|
      |Terezia |Zbozna   |2000 |f|
      |Gitka   |Nalepna  |1980 |f|
      |Joachim |Abdul    |1982 |m|
      |Zuzana  |Zuzulova |1998 |f|
      |Dalibor |Janda    |1998 |m|
      |Ibrahim |Maiga    |1998 |m|
      |Juraj   |Hnát     |2021 |m|
      |Jan     |Janka    |2013 |m|
      |Fedor   |Mravec   |1999 |m|
      |Alzbeta |Kapustova|2020 |f|
      |Matej   |Mesko    |1991 |m|   
      |Xenia   |Bojovnica|1987 |f|
      ----------------------------
      ```
   * Pozor na veľkosti buniek v jednotlivých stĺpcoch. Ich veľkosť sa rovná najdlhšej bunke z daného stĺpca.
   
4. Pod aktuálnu tabuľku vypíšte druhú tabuľku zoradenú podľa priezviska.
5. Pridajte výpis štatistík:
   * Najmladšiu a najstaršiu osobu v zozname
   * Počet mužov a žien 
   * Rok, v ktorom sa narodilo najviac osôb



## Ako nájsť branch môjho cvičenia?
Pokiaľ sa chcete dostať k riešeniu z cvičenia je potrebné otvoriť si príslušnú vetvu (_branch_), ktorej názov sa skladá:

__MIESTNOST__ + "-" + __HODINA ZAČIATKU__ + "-" + __DEN__

Ak teda navštevujete cvičenie pondelok o 08:00 v RA013, tak sa vetva bude volať: __RA013-08-PON__
