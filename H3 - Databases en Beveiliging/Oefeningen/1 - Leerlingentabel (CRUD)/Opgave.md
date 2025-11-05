# Opgave: H3 Oefening 1

## 1 - Leerlingentabel (CRUD)

---

### Opgave:
*Op dit moment nog geen validatie of sanitizatie inbouwen*
- Maak een website dat meerdere pagina's bevat (index.php, add.php, delete.php, edit.php)
- Op index.php toon je een tabel waarin elke leerling in jouw database verschijnt
- Voeg één knop bovenaan toe in index.php die verwijst naar de interne pagina: add.php
- In add.php staat een formulier om een nieuwe leerling toe te voegen
- In de tabel staat een kolom om "Acties" met twéé knoppen per leerling: "Bewerk" en "Verwijder" (knop is bvb: <a href="edit.php?id=ID"> Bewerk </a>)
- Delete en edit werken op basis van de GET parameter: id
- delete.php verwijdert de leerling met zijn ID onmiddelijk en stuurt je vervolgens terug naar index.php
- update.php toont een form (POST) om een leerling te updaten. Als je bevestigt met een <button type="submit">Bevestig aanpassingen</button>, dan wordt de leerling info bijgewerkt in de tabel én je wordt teruggestuurd naar index.php