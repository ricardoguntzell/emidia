<?php
    
    namespace emidia\Http\Controllers;
    
    use emidia\Recipe;
    use Illuminate\Http\Request;
    
    class RecipeController extends Controller
    {
    
        /**<b>Listagem das receitas</b>*/
        public function index()
        {
            $recipes = Recipe::all();
            
            return view('recipe.index')->with('recipes', $recipes);
        }
    
        /**<b>Listagem detalhada da receita</b>*/
        public function show($nameUrl)
        {
            $recipe = Recipe::where('name_url', $nameUrl)->get();
            
            if (!empty($recipe)) {
                return view('recipe.show')->with('recipe', $recipe);
            } else {
                return redirect()->action('RecipeController@index');
            }
        }
    
        /**<b>Formulário de cadastro da receita</b>*/
        public function create()
        {
            return view('recipe.create');
        }
    
        /**<b>Rotina para efetuar a criação do registro da receita no BD</b>*/
        public function store(Request $request)
        {
            $Recipe = new Recipe();
            $recipeSlug = $Recipe->setNameUrl($request->title);
            $recipeIng = $Recipe->setNameIngredient($request->ingredient);
            
            
            $recipe = [
                'title' => $request->title,
                'name_url' => $recipeSlug,
                'ingredient' => $recipeIng,
                'method_of_preparation' => $request->method_of_preparation
            ];
            
            $Recipe::create($recipe);
            
            return redirect()->action('RecipeController@index');
        }
    
        /**<b>Formulário de edição da receita</b>*/
        public function edit($nameUrl)
        {
            $recipe = Recipe::where('name_url', $nameUrl)->get();
            
            if (!empty($recipe)) {
                return view('recipe.edit')->with('recipe', $recipe[0]);
            } else {
                return redirect()->action('RecipeController@index');
            }
        }
    
        /**<b>Rotina para efetuar a alteração do registro da receita no BD</b>*/
        public function update(Request $request, $id)
        {
            $Recipe = new Recipe();
            $recipeSlug = $Recipe->setNameUrl($request->title);
            $recipeIng = $Recipe->setNameIngredient($request->ingredient);
            
            $recipe = Recipe::find($id);
            
            $recipe->title = $request->title;
            $recipe->name_url = $recipeSlug;
            $recipe->ingredient = $recipeIng;
            $recipe->method_of_preparation = $request->method_of_preparation;
            $recipe->modification_date = date("Y-m-d H:i");
            
            $recipe->save();
            
            return redirect()->action('RecipeController@index');
        }
    
        /**<b>Rotina para efetuar a exclusão do registro da receita no BD</b>*/
        public function destroy($nameUrl)
        {
            $recipe = Recipe::where('name_url', $nameUrl)->get();
            
            if (!empty($recipe)) {
                $recipe[0]->delete();
            }
            
            return redirect()->action('RecipeController@index');
        }
        
    }
