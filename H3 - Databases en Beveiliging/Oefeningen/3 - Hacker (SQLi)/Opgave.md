# Opgave: H3 Oefening 3

## 3 - Hacker (SQLi)

SQLi van het type: **In-Band**

⚡Goesting in meer? 

SQLi van het type: **Inferential/Blind** (uitdagend)

1) Zet error-logging uit: error_reporting(0)
2) Patch in jouw code enkel het type exploit dat je eerder gebruikte
3) Probeer bij een klasgenoot: dan is het pas echt "blind"

---

### Opgave:
- Deze oefening is een volledige ⭐Uitdaging.
- Toegepast op: "H3 Oefening 1 - Leerlingentabel (CRUD)"
- De kans is groot dat je nog geen sanitizatie en validatie hebt ingebouwd. Als dat wel zo is: dan kan je deze oefening niet doen (verwijder validatie en sanitizatie uit je code)
- Probeer de controle over te nemen van je database door enkel gebruik te maken van je website (geen aanpassingen in de code). Zorg ervoor dat je jouw eigen tabelstructuur goed in je hoofd hebt gevisualiseerd (neem het er eventueel bij)
- Maak een invoer in je formulier waarbij je probeert schade te verrichten in je database. Schade verrichten: tabel verwijderen
- Als het je gelukt is: proficiat! Je ziet nu dat dit gevaarlijk is. Probeer er nu voor te zorgen dat hackers geen schijn van kans meer hebben door de manier waarop je met $_GET en $_POST data omspringt te veranderen zodat niemand dit nog kan!