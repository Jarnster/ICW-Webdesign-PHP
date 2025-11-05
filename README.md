# Webdesign: Cursus Dynamische Websites (met PHP)
## 6D Informatica- en Communicatiewetenschappen
*Gemaakt in 2025-2026 door Jarne Verlinden (6icw)*
*Vereist kennis van HTML, CSS, JS en SQL.*
*Doel: Educatief Gebruik (volgens LICENSE.md)*
*Deze repository blijft beschikbaar. Aanpassingen kunnen aangevraagd worden via Pull Requests.*

In deze README.md kan je de inhoudstabel vinden voor elk hoofdstuk. Alle PowerPoints, Oefeningen, ... staan in de individuele mappen van elk hoofdstuk.

---

## [H1] Intro

### Inhoud
- Wat is een dynamische website?
- Hoe werkt PHP? (Hypertext Preprocessor)
- Server-client model
- Situering binnen het OSI model
- HTTP: TCP-gebaseerd netwerkprotocol met Request & Response, Request Methods (GET/PUT/POST/DELETE)
- Syntax: echo, variabelen, operators, statements, loops, arrays
- Superglobals
- Headers
- Debugging: error logging, var_dump, print_r

---

## [H2] Gebruikersinvoer

In H1 werkten we met gegevens die we vooraf instelde. Nu gaan we, met behulp van formulieren en andere parameters (zoals $_GET) gebruikersinvoer accepteren.

### Inhoud
- HTML form elementen instellen om correct HTTP-request te maken ("method" attribute)
- $_POST, $_GET, $_SESSION, isset(), empty()
- String methods

---

## H3 Databases en Beveiliging:

### Inhoud:
- MySQL/MariaDB
- Gebruik van phpMyAdmin (PMA)
- Prepared statements (PDO)
- Create, Read, Update, Delete (CRUD)
- SQL Injectie
- Validatie en sanitizatie
- Password hashing
- Sessies uitgebreid
- Authenticatie: inloggen, registreren, uitloggen, beschermde pagina

### Oefeningen:
#### 1 - Leerlingentabel (CRUD)
*Op dit moment nog geen validatie of sanitizatie inbouwen*
- Maak een website dat meerdere pagina's bevat (index.php, add.php, delete.php, edit.php)
- Op index.php toon je een tabel waarin elke leerling in jouw database verschijnt
- Voeg één knop bovenaan toe in index.php die verwijst naar de interne pagina: add.php
- In add.php staat een formulier om een nieuwe leerling toe te voegen
- In de tabel staat een kolom om "Acties" met twéé knoppen per leerling: "Bewerk" en "Verwijder" (knop is bvb: <a href="edit.php?id=ID"> Bewerk </a>)
- Delete en edit werken op basis van de GET parameter: id
- delete.php verwijdert de leerling met zijn ID onmiddelijk en stuurt je vervolgens terug naar index.php
- update.php toont een form (POST) om een leerling te updaten. Als je bevestigt met een <button type="submit">Bevestig aanpassingen</button>, dan wordt de leerling info bijgewerkt in de tabel én je wordt teruggestuurd naar index.php

#### 2 - Hacker
- Deze oefening is een volledige 🔴Uitdaging.
- Toegepast op: "Oefening 1 - Leerlingentabel"
- De kans is groot dat je nog geen sanitizatie en validatie hebt ingebouwd. Als dat wel zo is: dan kan je deze oefening niet doen (verwijder validatie en sanitizatie uit je code)
- Probeer de controle over te nemen van je database door enkel gebruik te maken van je website (geen aanpassingen in de code). Zorg ervoor dat je jouw eigen tabelstructuur goed in je hoofd hebt gevisualiseerd (neem het er eventueel bij)
- Maak een invoer in je formulier waarbij je probeert schade te verrichten in je database. Schade verrichten: tabel verwijderen
- Als het je gelukt is: proficiat! Je ziet nu dat dit gevaarlijk is. Probeer er nu voor te zorgen dat hackers geen schijn van kans meer hebben door de manier waarop je met $_GET en $_POST data omspringt te veranderen zodat niemand dit nog kan!

#### 3 - Authenticatie
- Toegepast op: "Oefening 1 - Leerlingentabel"
- Zorg ervoor dat enkel ingelogde gebruikers leerlingen kunnen toevoegen, bewerken en verwijderen. Publieke gebruikers (=niet ingelogd) mogen enkel zien welke leerlingen er zijn.
- Maak een inlogpagina (login.php) en een registratiepagina (register.php)
- Maak gebruik van de Superglobal $_SESSION om de sessie te bewaren

---

## H4 Object-oriented programming (OOP):


---

## H5 Application Programming Interface (API):
