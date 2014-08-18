<?php

class HomeController extends BaseController {


	public function getMyList()
	{
        if(!Session::has('AuthorEmail') or Session::get('AuthorEmail', 'default') == 'default')
            return Redirect::route('SignIn')->withErrors(array('Please sign in with your valid user account!'));
        else
        {
            return View::make('ToDoIndex')
                ->with('title', 'My ToDo List')
                ->with('Categories', Category::all())
                ->with('mytodoTasks', tbltodotask::orderBy('Author')->orderBy('CategoryId')->orderBy('DueDate')->get());
        }

	}

    public function  getNewTask()
    {
        return View::make('NewTask')->with('title', 'My New Task view')
                                    ->with('Categories', Category::all());
    }

    public function postNewTask()
    {
        $rules =array('Title' => 'required', 'DueDate' => 'required');
        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails())
        {
            return Redirect::route('NewTask')->withErrors($validator);
        }
        else
        {
            $task = new tbltodotask();
            $task->Title = Input::get('Title');
            $task->Author = Input::get('Author');
            $task->CategoryId = Input::get('CategoryId');
            $task->DueDate = Input::get('DueDate');
            $task->Description = Input::get('Description');
            $task->save();
            return Redirect::route('home');
        }

    }

    public function getUpdateTask($taskId, $catId)
    {
        $task = tbltodotask::find($taskId);
        $task->CategoryId = $catId;
        $task->save();
        return $task->CategoryId;
    }

    public function getNewCategroy($cat)
    {
        try{
            $cate = new Category();
            $cate->Name = $cat;
            $cate->save();
            return $cate->id;
        }
        catch (Exception $e) {
            return  -1;
        }
    }

    public function getAbout()
    {
        return View::make('About')->with('title', 'About');
    }

    public function getContact()
    {
        $contact = new Contact();
        return View::make('Contact')->with('title', 'Contact Me')
                                    ->with('Contact', $contact);
    }
}
