<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Query\Builder;

    /**
     * @method static Builder whereIdMarca($id_marca)
     * @method static Builder whereIdCarro($id_carro)
     */
    class Carro extends Model {
        protected $primaryKey = 'id_carro';

        protected $fillable = ['nome', 'motor', 'preco', 'url_foto', 'id_marca'];

        public function marca() {
            return $this->hasOne(Marca::class, 'id_marca', 'id_marca');
        }
    }
