<?php
require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$user = new \App\Models\Administrator();
$user->nom = 'Admin';
$user->prenom = 'Principal';
$user->telephone = '0123456789';
$user->adresse = '123 Rue Admin';
$user->region = 'Île-de-France';
$user->code_postal = '75001';
$user->email = 'admin@example.com';
$user->password = \Illuminate\Support\Facades\Hash::make('Password123!');
$user->role = 'admin';
$user->save();

echo 'Admin créé avec succès';