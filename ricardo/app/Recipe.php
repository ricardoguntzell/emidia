<?php
    
    namespace emidia;
    
    use Illuminate\Database\Eloquent\Model;
    
    class Recipe extends Model
    {
        protected $table = 'Recipes';
        
        protected $fillable = ['title', 'name_url', 'ingredient', 'method_of_preparation', 'creation_date', 'modification_date'];
        
        public $timestamps = FALSE;
        
        /**
         * <b>setNameUrl</b>
         * Método para criar a URL amigável
         * @param string $title
         * @return string $recipeSlug.
         */
        public function setNameUrl($title)
        {
            
            //Formata a string, removendo caracteres indesejados, espaços e etc.
            $recipeSlug = str_slug($title);
            
            //Recupera os registros de receitas
            $recipes = $this->all();
            
            $i = 0;
            
            //Verifica se existe alguma receita com o mesmo titulo e então, o incremento é ativado.
            foreach ($recipes as $recipe) {
                if (str_slug($recipe->title) === $recipeSlug) {
                    $i++;
                }
            }
            
            //Caso a verificação feita acima tenha encontrado registros, a URL amigável receberá o nome
            //do título da receita formatado + a quantidade de registros de titulos iguais.
            if ($i > 0) {
                $recipeSlug = "{$recipeSlug}-{$i}";
            }
            
            return $recipeSlug;
        }
        
        /**
         * <b>setNameIngredient</b>
         * Método para formatar os ingredientes e deixar pronto para o front.
         * @param string $ingredient
         * @return string $ingredientFullg.
         */
        public function setNameIngredient($ingredient)
        {
            if (!empty($ingredient)) {
                $ingredientFull = join(";", $ingredient);
            }
            
            return $ingredientFull;
        }
        
    }
