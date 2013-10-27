<?php

class TaskController extends \BaseController {

	protected $project;
	protected $task;

	public function __construct(Project $project, Task $task)
	{
		$this->project = $project;
		$this->task = $task;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($project_id)
	{
		$project = $this->project->find($project_id);
		$tasks = $this->task->where('project_id', $project_id)->paginate();

		return View::make('task.index', compact('project', 'tasks'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($project_id)
	{
		$project = $this->project->find($project_id);

		return View::make('task.create', compact('project'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($project_id)
	{
		$task = new Task(Input::all());

		if ( ! $task->save()) {

			return Redirect::back()->withInput()->withErrors($task->errors);
		}

		return Redirect::back()->with('flash_message', 'Task has been created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($project_id, $task_id)
	{
		$task = $this->task->where('project_id', $project_id)->where('id', $task_id)->first();

		return View::make('task.show', compact('task'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($project_id, $task_id)
	{
		$project = Project::find($project_id);
		$task = Task::where('project_id', $project_id)->where('id', $task_id)->first();

		return View::make('task.edit', compact('project', 'task'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($project_id, $task_id)
	{
		$task = Task::find($task_id);

		$task->fill(Input::all());

		if ( ! $task->save()) {

			return Redirect::back()->withInput()->withErrors($task->errors);
		}

		return Redirect::back()->with('flash_message', 'Task has been created');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($project_id, $task_id)
	{
		//
	}

}
