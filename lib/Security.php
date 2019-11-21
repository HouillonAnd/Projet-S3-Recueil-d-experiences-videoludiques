<?php
    class Security {

        private static $seed = 'JVuhYizrVIifTMBXQVLP';

        static public function getSeed() {
            return self::$seed;
        }

        public static function chiffrer($texte_en_clair) {
            $texte_chiffre = hash('sha256', $texte_en_clair.Security::getSeed());
            return $texte_chiffre;
        }
    }
?>