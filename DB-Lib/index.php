<?php

/******************************************************************************/
/*
  Author  - Kevin Duzguner
 */
/******************************************************************************/


require_once('./db.php');


// Conect() => Connect to Database
// CreateDB() => Create a Database from MYSQL
// Insert() => Insert value to your tbl
// Select() => Fetch all values from a databse

DB::Connect();

DB::CreateDB('');
echo '<br>';
DB::Insert('users', [
  'name' => 'Kevin',

]);

DB::Select('tbl_apies');
