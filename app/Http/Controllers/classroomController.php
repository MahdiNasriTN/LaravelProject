<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Joinedclassroom;
use App\Models\Note;
use Illuminate\Support\Facades\Log;



class classroomController extends Controller
{
   public function showClassroom($classroomId)
   {
        $userInfo = null;
        $joinedClassrooms = null;
        $checkClassroom = true;
        $selectedClassroom = null;
        $notes = null;
        if (Auth::check()) {
            $user = Auth::user();
            
            
            $userId = $user->id;
            $userName = $user->name;
            $userEmail = $user->email;
            $userInfo = [
                'id' => $userId,
                'username' => $userName,
                'email' => $userEmail
            ];
            $selectedClassroom = Classroom::where('id',$classroomId)->first();
            $notes = Note::where('classroomId',$classroomId)->get();
            $joinedClassrooms = $user->joinedClassrooms;
        }
        return view('home', compact('userInfo','joinedClassrooms','checkClassroom','selectedClassroom','notes'));
    }

    public function addNote(Request $request, $classroomId)
    {
        if (Auth::check()) {
            $user = Auth::user();
            
            Note::create([
                'title'=>$request->input('title'),
                'description'=>$request->input('description'),
                'classroomId'=>$classroomId,
                'authId'=>$user->id,
            ]);

            return redirect()->back();

        }
    }

    

    public function destroyNote($noteId)
    {
        $note = Note::findOrFail($noteId);
        
        $note->delete();

        return redirect()->back();
    }

    public function editNote(Request $request , $noteId)
    {
        $note = Note::where('id', $noteId)->first();
        $note->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);
        return redirect()->back();
    }

}
