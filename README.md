1️⃣ Prérequis :
PHP 8.3+
Composer
Symfony CLI
Un serveur SQL (MySQL, PostgreSQL, SQLite...)
Git

2️⃣ Cloner le projet :
git clone https://github.com/NicoMass7/Vehiloc.git
cd Vehiloc

3️⃣ Installer les dépendances :
composer install

4️⃣ Configurer l'environnement :
Copiez le fichier .env et adaptez les valeurs selon votre base de données :
DATABASE_URL="mysql://user:password@127.0.0.1:3306/vehiloc?serverVersion=8.0"

5️⃣ Générer la base de données : 
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load

6️⃣ Lancer le serveur Symfony :
symfony server:start
