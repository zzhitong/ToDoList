@extends('MasterTemplate.site')

@section('mainContent')
    @foreach($errors->all() as $error)
    <i style="color: red">{{$error}}</i><br/>
    @endforeach
    <div class="content">
        <div class="row">
            <div class="login-form">
                <h3>Please Add a New Task.</h3>
                {{Form::open()}}
                <fieldset>
                    <div class="clearfix">
                        <input type="hidden" id="Author" name="Author" value="<?php  echo Session::get('AuthorEmail', 'default'); ?>" />
                        <b>Author:</b><?php
                        echo Session::get('AuthorEmail', 'default');
                        ?>
                    </div>
                    <div class="clearfix">
                        <input type="text" id="Title" name="Title"  placeholder="Task Title" />
                    </div>
                    <div class="clearfix">
                        <!--<select id="selCts" onchange="JavaScript:UpdateCTId();">
                            @foreach($Categories as $cat)
                            <option value="{{$cat->Id}}">{{$cat->Name}}</option>
                            @endforeach
                        </select>-->
                        <input type="hidden" id="CategoryId" name="CategoryId" value="1" placeholder="Category" />
                    </div>
                    <div class="clearfix">
                        <input type="text"  id="DueDate" name="DueDate" data-date-format="yyyy-mm-dd" placeholder="Due Date" />
                    </div>
                    <div class="clearfix">
                        <textarea id="Description" class="field span12" id="textarea" rows="5" name="Description" placeholder="Description"></textarea>
                    </div>
                    <button class="btn primary" type="submit">Add</button>&nbsp;&nbsp;&nbsp;<a class="btn primary" href="JavaScript:GoBackIndex();">Cancel</a>
                </fieldset>
                {{Form::close()}}
            </div>
        </div>
    </div>
<script type="text/javascript" src="bootstrap/datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var dt = $('#DueDate').datepicker({
            onRender: function(date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function(ev) {
            dt.hide();
        }).data('datepicker');

    });

    function GoBackIndex()
    {
        window.location.href='/todolist/public/';
    }
    function UpdateCTId()
    {
        $('#CategoryId').val($('#selCts').val());
    }
</script>
@stop
