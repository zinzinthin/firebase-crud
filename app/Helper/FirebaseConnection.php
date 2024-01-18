<?php
 /*
 * configure the SDK to use this Service Account:
 *
 */
 namespace App\Helper;

 use Kreait\Firebase\Factory;
class FirebaseConnection{
    public static function connect() {
        $factory = (new Factory)->withServiceAccount(base_path(env('FIREBASE_CREDENTIALS')))
                                ->withDatabaseUri(env('FIREBASE_DATABASE_URL'));
        return $factory->createDatabase();
    }

}
