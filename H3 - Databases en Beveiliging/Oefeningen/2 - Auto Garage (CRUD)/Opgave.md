# Opgave: H3 Oefening 2

## 2 - Auto Garage (CRUD)

---

### Opgave:
*Op dit moment nog geen validatie of sanitizatie inbouwen*
- Baseer je op jouw eerder gemaakte code in "1 - Leerlingentabel (CRUD)" om de oefening te voltooien
- Maak een nieuwe database in phpMyAdmin (http://localhost:8000/phpmyadmin) aan, met naam: "garage"
- Voeg een tabel toe: "vehicles", met velden: "id" (A.I., int), "model_name" (varchar), "brand_name" (varchar), "owner_full_name" (varchar), "created_at" (timestamp)
- Maak een website dat meerdere pagina's bevat (index.php, add.php, delete.php, edit.php)
- Op index.php toon je een tabel waarin elke auto (en elke kolom) uit jouw database verschijnt
- Voeg één knop bovenaan toe in index.php die verwijst naar de interne pagina: add.php
- In add.php staat een formulier om een nieuwe auto in de garage toe te voegen
- In de tabel staat een kolom om "Acties" met twéé knoppen per auto: "Bewerk" en "Verwijder" (knop is bvb: <a href="edit.php?id=ID"> Bewerk </a>)
- Delete en edit werken op basis van de GET parameter: id
- delete.php verwijdert de auto met zijn ID onmiddelijk en stuurt je vervolgens terug naar index.php
- update.php toont een form (POST) om een auto te updaten. Als je bevestigt met een <button type="submit">Bevestig aanpassingen</button>, dan wordt de auto info bijgewerkt in de tabel én je wordt teruggestuurd naar index.php