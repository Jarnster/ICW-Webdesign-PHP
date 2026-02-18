# Opgave: H3 Oefening 4

## 4 - Hacker (SQLi)

---

### Opgave - Experimenteer met `login_vulnerable.php`:
In deze opgave experimenteren we met een kwetsbaar stuk demo-code. Je zal zien wat er gebeurt als je validatie of sanitizatie negeert. In deze demo-code laten we bewust de "Prepare" stap van PDO achter ons. We hebben ook `echo` aangezet: je ziet nu live welke commando's de SQL server aangereikt krijgt.

Demo aanval op `login_vulnerable.php`:
*We kunnen aanmelden op élk account, zonder het wachtwoord juist in te voeren.*
Voer in: 
 - Username: admin
 - Password: ' OR '1'='1

=> Query wordt: SELECT * FROM users 
WHERE username = 'admin' 
AND password = '' OR '1'='1'

*Waarom? Omdat '1'='1' altijd waar is.*

*Als we nu een Session-systeem koppelde zoals in vorige oefeningen, heeft de hacker toegang tot het beheerdersaccount in onze applicaties*

### Vervolg:
Probeer exact dezelfde aanvallen uit te voeren op `login_safe.php`: kijk wat er wél en niet gaat!

### Extra:
💡Is er jou nog iets opgevallen? Goed bezig! Naast het overslaan van "prepared statements" hebben wij password_hash() en password_verify() ook overgeslagen! Als je goed hebt opgelet tijdens de presentaties, dan weet je dat wachtwoorden opslaan in de vorm van platte tekst: een doodzonde is!
