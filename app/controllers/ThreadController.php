<?php

class ThreadController extends \BaseController {

	/**
	 * Send back all comments as JSON
	 *
	 * @return Response
	 */

	
	public function index()
	{
		return Response::json(Thread::get());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Thread::create(array(
			'name' => Input::get('name')

		));

		return Response::json(array('success' => true));
	}

	/**
	 * Return the specified resource using JSON
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($thread_id)
	{
		return Response::json(Thread::find($thread_id));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Thread::destroy($id);

		return Response::json(array('success' => true));
	}

}