<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Classroom;
use App\Models\Joinedclassroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class homeController extends Controller
{
    public function displayHomePage()
    {
        $userInfo = null;
        $joinedClassrooms = null;
        $checkClassroom = false;
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

            $joinedClassrooms = $user->joinedClassrooms;
        }
        return view('home', compact('userInfo','joinedClassrooms','checkClassroom'));
    }

    public function joinClass(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userId = $user->id;
            $classroomCode = $request->input('codeClass');
            $classroom = Classroom::where('codeClass', $classroomCode)->first();
            if($classroom)
            {
                $checkJoined = Joinedclassroom::where([
                    ['classroomId', $classroom->id],
                    ['userId', $userId]
                ])->exists();
                if($checkJoined == false)
                {
                    Joinedclassroom::create([
                        'classroomId'=>$classroom->id,
                        'userId'=>$userId,
                    ]);
                    return redirect()->route('DisplayHomePage')->with('info', 'Classroom founded.');
                }
                else
                {
                    return redirect()->back();
                }
            }
            else{
                return redirect()->route('DisplayHomePage')->with('error', 'not founded.');
            }
            
         }
    }

    public function addClass(Request $request)
    {
         if (Auth::check()) {
            $user = Auth::user();
            
            $userId = $user->id;
            $codeClass = $this->generateRandomCode();
            if($codeClass){
                $classroom = Classroom::create([
                    'classname' => $request->input('classname'),
                    'classsubject' => $request->input('classsubject'),
                    'authorId' => $userId,
                    'codeClass' => $codeClass,
                ]);
                Joinedclassroom::create([
                    'classroomId' =>$classroom->id,
                    'userId' =>$userId,
                ]);
            }

            return redirect()->route('DisplayHomePage');

        }
    }

    public function editClass(Request $request)
    {
        $classroomId = $request->route('classroom');
        $classroom = Classroom::where('id', $classroomId)->first();
        $classroom->update([
            'classname' => $request->input('classname'),
            'classsubject' => $request->input('classsubject'),
        ]);
    
        return redirect()->route('DisplayHomePage');
    }
    public function editAccount(Request $request)
    {
            $user = Auth::user();
            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ]);
            return redirect()->route('DisplayHomePage');
    }


    public function destroy($classroomId)
    {
        $classroom = Classroom::findOrFail($classroomId);
        
        $classroom->delete();

        return redirect()->route('DisplayHomePage');
    }


    private function generateRandomCode(): string
    {
        $length = mt_rand(5, 7);
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $code = '';

        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[mt_rand(0, strlen($characters) - 1)];
        }

        return $code;
    }
    
}
