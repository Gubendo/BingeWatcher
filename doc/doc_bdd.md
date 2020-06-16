# Création et remplissage de la base

créer la base vide:

    $ sudo -u postgres createdb bingewatcher

créer les tables a partir du fichier

    $ psql -d bingewatcher -a -f [adapter le chemin si besoin]/data/db.sql
    
## Créer un user par lequel passer avec php

    $ psql
    # CREATE USER binge;
    # ALTER USER binge WITH PASSWORD 'binge';
lui donner les droits sur la base de données:
    
    $ psql -d bingewatcher
    # GRANT SELECT,UPDATE,INSERT ON TABLE utilisateur TO binge;
    # GRANT SELECT,UPDATE,INSERT ON TABLE film_utilisateur TO binge;
    # GRANT USAGE,SELECT ON SEQUENCE utilisateur_id_utilisateur_seq TO binge;
