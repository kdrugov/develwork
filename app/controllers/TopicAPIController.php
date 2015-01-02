<?php

class TopicAPIController extends \BaseController {

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            try{
                $statusCode = 200;
                $response = [
                  'topics'  => []
                ];
                
               // $topics = Topic::all();
                //get all topics
                $topics = DB::table('topics')->where('status', '1')->get();
               
                foreach($topics as $topic){

                    $response['topics'][] = [
                        'id' => $topic->id,
                        'name' => $topic->name,
                        'description' => $topic->description
                    ];
                }

            }catch (Exception $e){
                $statusCode = 400;
            }
            
           return Response::xml($response, $statusCode);            
	}
}
