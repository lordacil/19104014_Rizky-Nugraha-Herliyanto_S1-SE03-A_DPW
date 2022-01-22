<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Validator as ValidationValidator;
use Nette\Utils\Validators;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class studentApiController extends Controller
{
    public function index(){
        $data['students'] = Student::all();
        return response() -> json($data);
    }

    public function store(Request $request){
        $validateData = Validators::make($request->all(), [
            'nim' => 'required|size:8, unique:students',
            'nama' => 'required|min:3|max:50',
            'gender' => 'required|in:P,L',
            'departement' => 'required',
            'address' => '',
        ]);

        if($validateData->fails()){
            return response($validateData->errors(), 400);
        }else{
            $student = new Student();
            $student->nim = $request->nim;
            $student->nama = $request->nama;
            $student->gender = $request->gender;
            $student->departement = $request->departement;
            $student->address = $request->address;
            $student->save();
            return response()->json([
                'message' => 'student request created'
            ], 201);
        }
    }

    public function update(Request $request, $id){
        if(Student::where('id', $id)->exist()){
            $validateData = Validators::make($request->all(), [
                'nim' => 'required|size:8, unique:students',
                'nama' => 'required|min:3|max:50',
                'gender' => 'required|in:P,L',
                'departement' => 'required',
                'address' => '',
            ]);

            if($validateData->fails()){
                return response($validateData->erors(), 400);
            }else{
                $student = new Student();
                $student->nim = $request->nim;
                $student->nama = $request->nama;
                $student->gender = $request->gender;
                $student->departement = $request->departement;
                $student->address = $request->address;
                $student->save();
                return response()->json([
                'message' => 'student request created'
            ], 201);
            } 
        } else {
            return response()->json([
                'message'=> 'student not found'
            ], 404);
        }
    }

    public function destroy($id){
        if(Student::where('id', $id)->exist()){
            $mahasiswa = Student::find($id);
            $mahasiswa->delete();
            return response()->json([
               "message" => "student record deleted"
            ], 404);
        }else{
            return response()->json([
                "message" => "Student not found"
            ], 404);
        }
    }
}
