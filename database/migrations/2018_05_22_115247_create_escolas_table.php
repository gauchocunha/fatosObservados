<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateEscolasTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('escolas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subordinacao', 100)->comment('text|Subordinação|Entre com a subordinação.');
            $table->string('nome', 100)->comment('text|Nome|Entre com o nome da escola.');
            $table->string('decreto', 100)->comment('text|Decreto|Entre com o decreto.');
            $table->string('diretor', 100)->comment('text|Diretor|Entre com o nome do diretor da escola.');
            $table->string('email', 100)->comment('text|e-mail|Entre com o e-mail da escola.');
            $table->string('telefoneEscola', 15)->comment('text|Telefone da escola|Entre com o telefone da escola.');
            $table->string('telefoneDiretor', 15)->comment('text|Telefone do diretor|Entre com o telefone do diretor.');
            $table->string('cep', 8)->comment('text|CEP|Entre com o CEP.');
            $table->string('logradouro', 100)->comment('text|Logradouro|Entre com o logradouro.');
            $table->string('bairro', 100)->comment('text|Bairro|Entre com o bairro.');
            $table->string('cidade', 100)->comment('text|Cidade|Entre com a cidade.');
            $table->string('uf', 2)->comment('text|UF|Entre com a UF, com dois caracteres.');
            $table->string('numero', 10)->comment('text|Número|Entre com o número.');
            $table->string('complemento', 100)->nullable()->comment('text|Complemento|Entre com um complemento, se for o caso.');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('escolas');
    }
}