<?php
/**
 * busca-ativa-escolar-api
 * UsersController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 18/01/2017, 18:36
 */

namespace BuscaAtivaEscolar\Http\Controllers\Resources;

use BuscaAtivaEscolar\Http\Controllers\BaseController;

use BuscaAtivaEscolar\Classe;
use BuscaAtivaEscolar\School;
use Illuminate\Http\Request;

class ClasseController extends BaseController
{
    public function index(Classe $classe)
    {
        try {
            $classes = $classe::all();

            $schoolId = $classes[0]['schools_id'];

            $school = School::find($schoolId);

            $response = [
                'success' => true,
                'message' => 'Turmas listadas com sucesso',
                'school' => $school->name,
                'turmas' => $classes
            ];
            return response()->json($response, 200);
        } catch (\Exception $ex) {
            return $this->api_exception($ex);
        }
    }

    public function update(Request $request, $id)
    {
        $classes = Classe::find($id);

        if (!$classes) {
            return response()->json([
                'message' => 'Registro não encontradod',
            ], 404);
        }

        $classes->fill($request->all());
        $classes->save();

        $response = [
            'success' => true,
            'message' => 'Turma atualizada com sucesso',
            'turmas' => $classes
        ];


        return response()->json($response, 200);
    }


    public function store(Request $request)
    {
        try {

            if (empty($request->all()['name'])) {
                $school = School::find($request->all()['schools_id']);
                $periodicidade = $request->all()['periodicidade'];
                $school->periodicidade = $periodicidade;
                $school->save();
                $response = [
                    'success' => true,
                    'message' => 'Periodicidade salva com sucesso',
                ];
            } else {
                $classes = new Classe();
                $classes->fill($request->all());
                $school = School::find($request->all()['schools_id']);
                $periodicidade = $request->all()['periodicidade'];
                $school->periodicidade = $periodicidade;
                $classes->save();
                $school->save();
                $response = [
                    'success' => true,
                    'message' => 'Turma salva com sucesso',
                    'turmas' => $classes
                ];
            }

            return response()->json($response, 201);
        } catch (\Exception $ex) {
            return $this->api_exception($ex);
        }
    }

    public function show($id)
    {
        $classes = Classe::where('schoolS_id', '=', $id)->get()->toArray();

//        if (!$classes) {
//            return response()->json([
//                'message' => 'Registro não encontrado',
//            ], 404);
//        }

        $school = School::find($id);

        $response = [
            'success' => true,
            'message' => 'Turmas listadas com sucesso',
            'school' => ['name' => $school->name, 'periodicidade' => $school->periodicidade],
            'turmas' => $classes
        ];

        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        $classes = Classe::find($id);

        if (!$classes) {
            return response()->json([
                'message' => 'Registro não encontrado',
            ], 404);
        }

        $classes->delete();
    }
}