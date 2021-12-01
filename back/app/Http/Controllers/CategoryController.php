<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller{

    // ancienne version de notre methode list
    /*
    public function list()
    {
        $categoriesList = [
            1 => [
                'id' => 1,
                'name' => 'Chemin vers O\'clock',
                'status' => 1
            ],
            2 => [
                'id' => 2,
                'name' => 'Courses',
                'status' => 1
            ],
            3 => [
             'id' => 3,
                'name' => 'O\'clock',
                'status' => 1
            ],
            4 => [
                'id' => 4,
                'name' => 'Titre Professionnel',
                'status' => 1
            ]
        ];
        // grace a response()->json() je peux convertir $categoriesList en JSON
        return response()->json($categoriesList);
    }
    */
    // ========= LISTE =========
    public function list()
    {
        // je récupère la liste de toute les catégories
        $categoriesList = Category::all();
        // pour la renvoyer au format json tout en envoyant aussi le code de reponse 200 ( tout c'est bien passsé !)
        //return response()->json($categoriesList, 200);
        return $this->sendJsonResponse($categoriesList);
        //echo "je suis dans list";
    }
    // ========= FIND ID =========
    public function item($categoryId)
    {
        /*
        $categoriesList = [
            1 => [
                'id' => 1,
                'name' => 'Chemin vers O\'clock',
                'status' => 1
            ],
            2 => [
                'id' => 2,
                'name' => 'Courses',
                'status' => 1
            ],
            3 => [
             'id' => 3,
                'name' => 'O\'clock',
                'status' => 1
            ],
            4 => [
                'id' => 4,
                'name' => 'Titre Professionnel',
                'status' => 1
            ]
        ];
        */
        $category = Category::find($categoryId);

        if(!empty($category)){
            return $this->sendJsonResponse($category);
        } else {
            abort(404);
        }


        /*
        if(array_key_exists($categoryId, $categoriesList)){
            $category = $categoriesList[$categoryId];
            return response()->json($category);
        }
        */
    }
    // ========= CREATION =========
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);
        $newCategory = Category::create($request->all());
        // $newCategory->title = $request->input('title');
        // $newCategory->completion = $request->input('completion');
        // $newCategory->status = $request->input('status');
        // $newCategory->category_id = $request->input('categoryId');
        if ($newCategory->save()) {
            return $this->sendJsonResponse($newCategory, 201);
        } else {
            return $this->sendEmptyResponse('Internal Server Error', 500);
        }
    }
    // ========= UPDATE =========
    public function update($id, Request $request){
        $category = Category::findOrFail($id);
        $category->update($request->all());
        if ($category->save()) {
            return $this->sendJsonResponse($category, 201);
        } else {
            return $this->sendEmptyResponse('Bad Request', 400);
        }
    }
    // ========= DELETE =========
    public function delete($id)
    {
        $deletedCategory = Category::findOrFail($id);
        if ($deletedCategory->delete()) {
            return response('Deleted Successfully', 200);
        } else {
            return response('Deleted Error', 500);
        }
    }

}
