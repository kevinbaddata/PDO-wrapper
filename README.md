# PDO-wrapper

```php
//check if the file has already been included
require_once ('./Database/db.php');


/* all class objects are dependent on the usage of
scope resolution operator (::) to access to static functions
*/

// connect to the database
DB::Connect(); 

// fetch all of the remaining rows in the result set.
DB::Select('tbl_users')

// arrow function to capture variables
 DB::Insert('tbl_users',[
        'email' => $email,
        'username' => $username,
        'password' => $password
    ]);

// done using database class? close connection
DB::CloseDB();

```
