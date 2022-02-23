<?php

require_once('./db.php');

DB::Connect();

DB::CreateDB('');

DB::Insert('users', [
    'name' => 'Kevin',

]);
