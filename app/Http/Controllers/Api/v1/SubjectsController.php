<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\Api\v1\SubjectLanguageResource;
use App\Models\v1\Languages;
use App\Models\v1\SubjectLanguage;
use Illuminate\Http\Request;

class SubjectsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $id = $request->get('language');
            $l = Languages::all()->where("language_name", "=", $id)->first();
            $start = $request->get('start');
            $count = $request->get('count');
//            $subjects = SubjectLanguage::where('language_id', '=', $l->id)->skip($start)->take($count)->get();
            $subjects = SubjectLanguage::where('language_id', '=', $l->id)->offset($start * $count)->limit($count)->get();
            $subjects = SubjectLanguageResource::collection($subjects);

            $data = [
                'subjects' => $subjects
            ];

            return $this->setData($data, "");
        } catch (Exception $e) {
            return $this->setErrorMessage("sdada");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function verify(Request $request)
    {

    }
}
