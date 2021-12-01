<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class TaskController extends Controller
{
    // ========= LISTE =========
    public function list()
    {
        $taskList = Task::all()->load('category');
        return $this->sendJsonResponse($taskList);
    }
    // ========= CREATION =========
    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'category_id' => 'required|integer'
        ]);
        $newTask = Task::create($request->all());
        // $newTask->title = $request->input('title');
        // $newTask->completion = $request->input('completion');
        // $newTask->status = $request->input('status');
        // $newTask->category_id = $request->input('categoryId');
        if ($newTask->save()) {
            return $this->sendJsonResponse($newTask, 201);
        } else {
            return $this->sendEmptyResponse('Internal Server Error', 500);
        }
    }
    // ========= FIND ID =========
    public function item($taskId)
    {
        $task = Task::find($taskId);

        if (!empty($task)) {
            return $this->sendJsonResponse($task);
        } else {
            abort(404);
        }
    }

    // ========= UPDATE =========
    public function update($id, Request $request)
    {
        $task = Task::findOrFail($id);
        if ($request->isMethod('put')) {
            if($this->validate($request, [
                'title' => 'required|string',
                'completion' => 'required|integer',
                'status' => 'required|integer',
                'category_id' => 'required|integer'
            ])){
                $task->update($request->all());
            } else {
                return $this->sendEmptyResponse(Response::HTTP_BAD_REQUEST);
            }
        } else {
            // Methode PATCH
            // mise a jour partielle d'une tache ()
            if($request->filled('title')){
                $task->title = $request->input('title');
                $oneDataAtLeast = true;
            }
            if($request->filled('category_id')){
                $task->category_id = $request->input('category_id');
                $oneDataAtLeast = true;
            }
            if($request->filled('completion')){
                $task->completion = $request->input('completion');
                $oneDataAtLeast = true;
            }
            if($request->filled('status')){
                $task->status = $request->input('status');
                $oneDataAtLeast = true;
            }

            if(!$oneDataAtLeast){
                return $this->sendEmptyResponse(Response::HTTP_BAD_REQUEST);
            }


        }
        if ($task->save()) {
            return $this->sendJsonResponse($task, 204);
        } else {
            return $this->sendEmptyResponse('Bad Request', 400);
        }
    }
    // ========= DELETE =========
    public function delete($id)
    {
        $deletedTask = Task::findOrFail($id);
        if ($deletedTask->delete()) {
            return response('Deleted Successfully', 200);
        } else {
            return response('Deleted Error', 500);
        }
    }
}
