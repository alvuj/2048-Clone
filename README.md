# 2048 Klon

Ovo je web implementacija popularne igre 2048. Projekt uključuje osnovnu igru, sustav za prijavu korisnika i funkcionalnost za praćenje i ažuriranje najboljih rezultata.

## Sadržaj

- [Instalacija](#instalacija)
- [Upotreba](#upotreba)
- [Struktura Projekta](#struktura-projekta)
- [Doprinos](#doprinos)
- [Licenca](#licenca)

## Instalacija

1. Klonirajte repozitorij:
    ```bash
    git clone https://github.com/alvuj/2048-clone.git
    ```
2. Postavite MySQL bazu podataka koristeći `tbl_user.sql` datoteku:
    ```sql
    CREATE TABLE tbl_user (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_name VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        high_score INT DEFAULT 0
    );

    INSERT INTO tbl_user (user_name, password, high_score) VALUES
    ('user1', 'password1', 0),
    ('user2', 'password2', 0);
    ```

3. Konfigurirajte pristup bazi podataka u PHP datotekama (`provjera.php`, `update_high_score.php`, itd.).

## Upotreba

1. Pokrenite lokalni server (npr. XAMPP, WAMP).
2. Otvorite `index.html` u vašem web pregledniku da biste igrali igru.
3. Prijavite se koristeći `in3.php` i pratite svoje najbolje rezultate.

## Struktura Projekta

- `2048/index.html`: Glavna stranica koja omogućuje pristup igri i tablici najboljih rezultata.
- `2048/2048mp.php`: Glavna stranica igre koja prikazuje tablu i trenutne rezultate.
- `2048/3333.js`: JavaScript implementacija igre 2048. Sadrži logiku za pomicanje pločica i provjeru dostupnih poteza.
- `2048/3333.css`: CSS stilovi za igru.
- `2048/get.php`: PHP skripta za preuzimanje najboljih rezultata iz baze podataka.
- `2048/update_high_score.php`: PHP skripta za ažuriranje najboljih rezultata u bazi podataka.
- `2048/in3.php`: Forma za prijavu korisnika.
- `2048/tablica.php`: Prikazuje tablicu najboljih rezultata.
- `2048/provjera.php`: PHP skripta za provjeru korisničkih imena i rezultata.
- `tbl_user.sql`: SQL skripta za kreiranje i popunjavanje tablice korisnika.

## Doprinos

Dobrodošli su svi doprinosi! Molimo vas da otvorite issue ili pošaljete pull request sa vašim prijedlozima i ispravkama.

## Licenca

Ovaj projekt je licenciran pod MIT licencom. Pogledajte [LICENSE](LICENSE) za više informacija.
