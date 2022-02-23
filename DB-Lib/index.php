<?php

require_once('./Database/db.php');

DB::Connect();

DB::CreateDB('');

DB::Insert('users', [
    'name' => 'Kevin',

]);
