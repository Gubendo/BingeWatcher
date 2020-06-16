CREATE TABLE utilisateur (
    id_utilisateur SERIAL PRIMARY KEY,
    mail VARCHAR(30),
    password VARCHAR(50)
);

CREATE TABLE film_utilisateur (
    id_user INT REFERENCES utilisateur (id_utilisateur),
    id_film INT,
    note INT,
    vu BOOLEAN
)
