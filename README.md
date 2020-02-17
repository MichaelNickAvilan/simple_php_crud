# Simple PHP CRUD
Is a simple REST API without authentication, only for testing purposes.

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
| Route | Description |
| ------ | ------ |
| http://localhost/appsystem/api/system | Returns all the registers of the systems table |
| http://localhost/appsystem/api/system/1 | Returns a specific register |