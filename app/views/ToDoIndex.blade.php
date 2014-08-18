 @extends('MasterTemplate.site')

 @section('mainContent')

     <h1>
     <?php
     echo Session::get('AuthorEmail', 'default');
     ?>'s
         To Do List</h1>
    <i>Please click <a href="/todolist/public/SignOff">Here</a> to sign in a different author.</i>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>DueDate</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
        @foreach($mytodoTasks as $task)
        <tr id="Cat{{$task->id}}">
            <td>{{$task->Title}}</td>
            <td>{{$task->Author}}</td>
            <td><?php echo Category::find($task->CategoryId)->Name; ?>
            <?php
                if($task->Author == Session::get('AuthorEmail', 'default'))
                {
                    echo "<a href=\"JavaScript:ShowUpdateTaskCat('". $task->id . "');\">update</a>";
                }
                ?>
            </td>
            <td>{{$task->DueDate}}</td>
            <td>{{$task->Description}}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="5"><input class="btn pull-right" id="butAddtask" name="butAddtask" value="Add New Task" onclick="JavaScript:GotoNewTask();" /></td>
        </tr>
        </tbody>
    </table>
 <div id="divUpdateTag" style="display: none;">
     <b>Click one to update</b><br/>
    <ul class="list-group">
        @foreach($Categories as $cat)
        <li class="list-group-item"><a href="JavaScript:UpdateCat('{{$cat->id}}')">{{$cat->Name}}</a></li>
        @endforeach
    </ul>
    <input id="catNew" type="text" size="17" /><span id="catChk"></span><br/><input type="button" value="Add Category" onclick="JavaScript:AddNewCategory();">
 </div>
 <script type="text/javascript">
     var curTId = '0';
     $(document).ready(function(){
         $('#divUpdateTag').dialog({
             autoOpen:false,
             top:0,
             witdh:370,
             height:377,
             modal:true,
             title:'Update Catetory',
             autoResize:true,
             close:function(){
                 $('#divUpdateTag').hide();
                 $('#Cat' + curTId).css('background-color', 'transparent')
             },
             buttons:{
                 "Cancel":function(){
                     $(this).dialog('close');
                 }
             },
             cache:false
         });
     });

     function ShowUpdateTaskCat(taskId)
     {
         curTId = taskId;
         $('#Cat' + curTId).css('background-color', '#cccccc')
         $('#divUpdateTag').dialog("open");
     }
     function UpdateCat(catId)
     {
         var Url = '/todolist/public/UpdateTask/' + curTId + '/' + catId;
         $.getJSON(Url, function(result){
             //since resut set will have to reordering due to Categroy updates, just reloading the page/
             window.location.href='/todolist/public';
         });

     }
     function GotoNewTask()
     {
         window.location.href='/todolist/public/NewTask';
     }
     function AddNewCategory()
     {
         var Validator1 = new Validator('catNew', 'catChk');
         if (Validator1.checkRequiredField() === true)
         {
             var  url = '/todolist/public/NewCategroy/' + $('#catNew').val();
             $.getJSON(url, function(result){
                 if(result > '0')
                     UpdateCat(result);
                 else
                     alert('It can not be added. Please make sure this is not a duplicated item!');
             });
         }
     }
 </script>
 @stop
