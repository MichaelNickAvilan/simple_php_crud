# Simple PHP CRUD
Is a simple REST API without authentication, only for testing purposes.
## Raw PHP API
### Installation
Clone this repository to your local LAMP environment
```sh
git clone https://github.com/MichaelNickAvilan/simple_php_crud.git
```
Create a database called systemsapp and create the following table
```sh
CREATE TABLE `systems` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `creation_date` datetime NOT NULL,
  `modification_date` datetime NOT NULL
)
```
Modify the .env file to fit your local configuation
```sh
DB_HOST=localhost
DB_USER=root
DB_PASSWORD=
DB_NAME=systemsapp
```

### routes
| Route | Description | Verb | Payload |
| ------ | ------ | ------ | ------ |
| http://localhost/appsystem/api/system | Returns all the registers of the systems table | GET | N/A |
| http://localhost/appsystem/api/system/1 | Returns a specific register | GET | N/A |
| http://localhost/appsystem/api/system | Inserts a register | POST | { "name" : "The system name" } |
| http://localhost/appsystem/api/system/{id} | Updates a register | PUT | { "name" : "The system name" } |
| http://localhost/appsystem/api/system/{id} | Deletes a register | DELETE | N/A |

## Laravel API
### Installation
Clone this repository to your local LAMP environment
```sh
git clone https://github.com/MichaelNickAvilan/simple_php_crud.git
```
Execute the following commands
```sh
cd apilaravel
composer install
php artisan migrate
```
### routes
| Route | Description | Verb | Payload |
| ------ | ------ | ------ | ------ |
| http://localhost/apilaravel/public/api/systems | Returns all the registers of the systems table | GET | N/A |
| http://localhost/apilaravel/public/api/systems/1 | Returns a specific register | GET | N/A |
| http://localhost/apilaravel/public/api/systems | Inserts a register | POST | { "name" : "The system name" } |
| http://localhost/apilaravel/public/api/systems/{id} | Updates a register | PUT | { "name" : "The system name" } |
| http://localhost/apilaravel/public/api/systems/{id} | Deletes a register | DELETE | N/A |
