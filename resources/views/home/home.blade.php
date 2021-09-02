<?php
$date = date("Y-m-d");

?>
<!doctype html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>ToDoList-Home</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel="stylesheet" href="{{asset('assets')}}/home/todolist.css">
</head>
<body oncontextmenu='return false' class='snippet-body'>
<div class="row justify-content-center container">
    <div class="col-md-8">
        <div class="card-hover-shadow-2x mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;Task Lists (Welcome {{Auth::user()->name}})</div>

            </div>
            <div class="scroll-area-sm">
                <perfect-scrollbar class="ps-show-limits">
                    <div style="position: static;" class="ps ps--active-y">
                        <div class="ps-content">
                            <ul class=" list-group list-group-flush">
                                @foreach($tasklist as $data)
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                    <?php
                                                    if ($data->completedTask == 1)
                                                    { ?>
                                                        <div class="lined">{{$data->taskName}} <?php if ($data->deadlineTask != null) { ?>  <div class="badge badge-success ml-2 lined">Deadline : {{$data->deadlineTask}}</div>  <?php } else { }?>  <div class="badge badge-success ml-2">Completed</div></div>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                        if ($data->deadlineTask !=null)
                                                        {
                                                            if ($data->deadlineTask < $date)
                                                            { ?>
                                                                <div class="lined">{{$data->taskName}}  <div class="badge badge-dark ml-2 lined">Deadline : {{$data->deadlineTask}}</div><div class="badge badge-dark ml-2">Failed</div></div>
                                                      <?php }
                                                            else
                                                            { ?>
                                                                <div class="normal">{{$data->taskName}} <div class="badge badge-warning ml-2">Deadline : {{$data->deadlineTask}}</div><div class="badge badge-danger ml-2">Not Completed</div></div>
                                                      <?php }
                                                        }
                                                        else
                                                        { ?>
                                                        <div class="normal">{{$data->taskName}} <div class="badge badge-warning ml-2"></div><div class="badge badge-danger ml-2">Not Completed</div></div>
                                                  <?php }
                                                    }?>
                                                </div>
                                                <div class="widget-content-right">
                                                    <?php
                                                    if ($data->completedTask == 1)
                                                    { ?>
                                                        <a href="{{route('arrangeTask',['id'=>$data->id])}}"><button class="border-0 btn-transition btn btn-outline-dark"> <i class="fa fa-undo"></i></button></a>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                        if ($data->deadlineTask !=null)
                                                            {
                                                                if ($data->deadlineTask < $date)
                                                                { ?>
                                                                    <a href="{{route('arrangeTask',['id'=>$data->id])}}"><button hidden class="border-0 btn-transition btn btn-outline-success"> <i hidden class="fa fa-check"></i></button></a>
                                                                    <?php
                                                                }
                                                                else
                                                                { ?>
                                                                    <a href="{{route('arrangeTask',['id'=>$data->id])}}"><button class="border-0 btn-transition btn btn-outline-success"> <i class="fa fa-check"></i></button></a>
                                                                    <?php
                                                                }
                                                            }
                                                        else { ?>
                                                            <a href="{{route('arrangeTask',['id'=>$data->id])}}"><button class="border-0 btn-transition btn btn-outline-success"> <i class="fa fa-check"></i></button></a>
                                                        <?php }
                                                    }?>
                                                    <a href="{{route('editTask',['id'=>$data->id])}}"><button class="border-0 btn-transition btn btn-outline-warning"> <i class="fa fa-edit"></i></button></a>
                                                    <a href="{{route('deleteTask',['id'=>$data->id])}}" onclick="return confirm('It will be deleted! Are you sure?')"><button class="border-0 btn-transition btn btn-outline-danger"> <i class="fa fa-trash"></i> </button></a> </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </perfect-scrollbar>
            </div>
            <div class="d-block text-right card-footer">
                <a href="{{route('home')}}"><button class="mr-2 btn btn-link btn-sm">Home</button></a>
                <a href="{{route('addTask')}}"><button class="btn btn-primary">Add Task</button></a>
            </div>
        </div>
        <a href="{{route('userLogout')}}"><button class="btn btn-primary">Logout</button></a>
    </div>
</div>
<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
<script type='text/javascript'></script>
</body>
</html>
