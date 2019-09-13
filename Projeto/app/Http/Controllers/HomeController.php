<?php

    namespace App\Http\Controllers;

    use App\Carro;
    use App\Marca;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Http\Request;

    class HomeController extends Controller {
        public function home(Request $request) {
            return view('home', ['marcas' => $this->getMarcas($request->nome, $request->preco_de, $request->preco_ate)]);
        }

        public function catalogo($id_marca) {
            return view('catalogo', ['carros' => $this->getCarros($id_marca)]);
        }

        public function cadastro() {
            return view('formulario');
        }

        public function edicao($id_carro) {
            return view('formulario', [
                'carro' => Carro::whereIdCarro($id_carro)->first(),
                'marcas' => $this->getMarcas()
            ]);
        }

        public function salvar(Request $request, $id_carro) {
            $carro = Carro::query()->find($id_carro);
            $carro->fill($request->all());
            $carro->save();
            return $this->catalogo($carro->id_marca);
        }

        /**
         * @param null $nome
         * @param null $preco_de
         * @param null $preco_ate
         * @return Builder[]|Collection
         */
        private function getMarcas($nome = null, $preco_de = null, $preco_ate = null) {
            $query = Marca::query();
            if (!empty($nome)) {
                $query->where('nome', 'ILIKE', "%$nome%");
            }
            if (!empty($preco_de)) {
                $query->whereHas('carros', /** @var Builder $carros */ function ($carros) use ($preco_de) {
                    $carros->where('preco', '>=', $preco_de);
                });
            }
            if (!empty($preco_ate)) {
                $query->whereHas('carros', /** @var Builder $carros */ function ($carros) use ($preco_ate) {
                    $carros->where('preco', '<=', $preco_ate);
                });
            }
            return $query->get();
        }

        private function getCarros($id_marca) {
            return Carro::whereIdMarca($id_marca)->get();
        }
    }
