<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    /**
     * Class Marca
     * @property string url_logo
     * @package App
     */
    class Marca extends Model {
        protected $primaryKey = 'id_marca';

        public function carros() {
            return $this->hasMany(Carro::class, 'id_marca', 'id_marca');
        }
    }
