<!doctype html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>ToDoList-AddTask</title>
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
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;Task Lists</div>
            </div>
            <div class="scroll-area-sm">
                <!-- ============================================================== -->
                <!-- basic form  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <form role="form" action="{{route('storeTask')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <label for="taskName" class="col-form-label">Task Name</label>
                                        <input id="taskName" name="taskName" type="text" class="form-control">
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Task Deadline (Optional) <small> dd/mm/yyyy</small></label>
                                            <input type="date" name="taskDeadline" class="form-control date-inputmask" id="taskDeadline" placeholder="">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Task</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end basic form  -->
                <!-- ============================================================== -->
            </div>
            <div class="d-block text-right card-footer"><a href="{{route('home')}}"><button class="mr-2 btn btn-link btn-sm">Home</button></a></div>
        </div>
    </div>
</div>
<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>



</body>
</html>
<!--
<link rel="stylesheet" href="{{asset('assets')}}/addTask/libs/style.css">
    <link rel="stylesheet" href="{{asset('assets')}}/addTask/style.css">
    <link rel="stylesheet" href="{{asset('assets')}}/addTask/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/addTask/fontawesome-all.css">
    <link rel="stylesheet" href="{{asset('assets')}}/addTask/tempusdominus-bootstrap-4.css">
    <link rel="stylesheet" href="{{asset('assets')}}/addTask/inputmask.css">
-->
<!--
<script type='text/javascript' src="{{asset('assets')}}/addTask/jquery-3.3.1.min.js"></script>
<script type='text/javascript' src="{{asset('assets')}}/addTask/bootstrap.bundle.js"></script>
<script type='text/javascript' src="{{asset('assets')}}/addTask/jquery.slimscroll.js"></script>
<script type='text/javascript' src="{{asset('assets')}}/addTask/main-js.js"></script>
<script type='text/javascript' src="{{asset('assets')}}/addTask/jquery.inputmask.bundle.js"></script>
<script>
    $(function(e) {
        "use strict";
        $(".date-inputmask").inputmask("dd/mm/yyyy")
    });
</script>
-->
