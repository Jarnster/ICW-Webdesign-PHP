# Opgave: H2 Oefening 2

## 2 - Kluis

---

Algemene Tip in H2:

Zet dit stukje PHP code bovenaan je project om de inhoud van GET en POST superglobals in te lezen:

```
<?php
print_r($_GET);
print_r($_POST);
?>
```

---

### Opgave:
- Maak een pagina die een PIN-code vraagt en je naar een extern webadres verwijst als de code juist is

- ➕Toevoeging: Zorg ervoor dat de PIN-code nu een wachtwoord (string) is. Het wachtwoord mag ook met hoofdletters geschreven zijn, en moet nog steeds juist gerekend worden.

- ⭐⭐Uitdaging: Bewaar het aantal pogingen. Blokkeer toegang indien er meer dan 4x onjuiste pogingen waren. 
  Toon ook het aantal pogingen over. Indien het aantal pogingen minder dan 2 bedraagt, moet de tekst rood zijn.

---

#### Wat je nodig hebt:​
- Gebruik van HTML forms

- HTML form's method instellen op POST

- Gebruik van isset of empty

- Gebruik van if/else if/else statements​

- Gebruik van echo

- Gebruik van headers

- ➕Toevoeging: String methods: strtolower

- ⭐⭐Uitdaging: Gebruik van SESSIONS, exit() of die()
