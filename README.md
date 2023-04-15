# Webtech-Backend
Webtech-Backend is een simpele PHP framework gemaakt voor de eindopdracht voor Webtechnologie II 22-23.
## Disclaimer
Voor deze proof-of-concept is het mogelijk om als nieuwe gebruiker zelf te kiezen welke rol je hebt bij het registeren.

## Usage
Om gebruik te maken van dit framework zijn er een paar voorstappen nodig:
### Setup Database
1. Download en configureer MySQL 
2. Download het osiris_clone.sql bestand. Dit is voor het opzetten van tables en test data.
3. Login op MySQL en Creeer een lege database als volgt:
    ```bash
    CREATE DATABASE [database_naam];
    ```
3. Log uit op MySQL en importeer het sql bestand als volgt:
    ```bash
    mysql -u [username] -p [database_naam] < [directory]\osiris_clone.sql
    ```
4. Optioneel: Check of het importeren is gelukt als volgt:
    ```bash
    mysql -u [username] -p
    USE [database_naam];
    SHOW TABLES;
    ```
    Als het goed is staan hier nu de volgende 3 tables:
    * exams
    * user_exams
    * users
5. Hernoem het .env_example bestand naar .env en vul je database gegevens in.

Zodra de database is opgezet en het .env bestand is correct gevuld, kun je het project starten met:
```bash
php -S localhost:3000
```

### Test logins
#### Administrator
Email: testemail@email.com
Wachtwoord: 123

#### Docent
Email: test@test.nl
Wachtwoord: 123

#### Student
Email: je.j.meijer@st.hanze.nl
Wachtwoord: 12345
