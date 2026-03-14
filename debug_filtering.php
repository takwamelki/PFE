<?php
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Support\Facades\DB;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "--- COLLECTIONS & COUNTS ---\n";
try {
    $collections = DB::connection('mongodb')->listCollections();
    foreach ($collections as $collection) {
        $name = $collection->getName();
        $count = DB::connection('mongodb')->table($name)->count();
        echo "- $name: $count\n";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\n--- PRODUCT SAMPLE ---\n";
try {
    $p = Produit::first();
    if ($p) {
        $attrs = $p->getAttributes();
        echo "QuantiteProduit: "; var_dump($attrs['QuantiteProduit'] ?? 'NOT FOUND');
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\n--- ORDER SAMPLE ---\n";
try {
    $o = Commande::first();
    if ($o) {
        $attrs = $o->getAttributes();
        echo "StatuCommande: "; var_dump($attrs['StatuCommande'] ?? 'NOT FOUND');
    } else {
        echo "No order found via Commande model.\n";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
