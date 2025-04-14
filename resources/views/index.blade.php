<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container mt-3">
        <div class="list-card">
            <div class="list-header-card d-flex justify-content-between align-items-center p-2">
                <div class="title">
                    My To-Do List
                </div>
                <div class="add-list">
                    <i class="fa-solid fa-circle-plus" style="color: white;"></i>
                </div>
            </div>
            <div class="list-body-card">
                <div class="todolist-1 d-flex p-3">
                    <div class="col-sm-1 text-center">
                        <input type="checkbox" class="ml-3" name="todolist-1" id="todolist-1">
                    </div>
                    <div class="col-sm-9 checkbox-desc">
                        <label for="" class="todolist-title">Wash laundry 1</label>
                        <div class="d-flex">
                            <div>
                                <i class="fa-solid fa-circle p-1" style="font-size: 5px;"></i>
                            </div>
                            <div class="pl-3">
                                need to be done immediately
                            </div>
                          </div>                    
                        </div>
                    <div class="col-sm-2 checkbox text-end">
                        <i class="fa-solid fa-trash-can"></i>
                    </div>
                </div>
                <div class="todolist-2 d-flex p-3">
                    <div class="col-sm-1 text-center">
                        <input type="checkbox" class="ml-3" name="todolist-2" id="todolist-1">
                    </div>
                    <div class="col-sm-9 checkbox-desc">
                        <label for="" class="todolist-title">Wash laundry 2</label>
                        <div class="d-flex">
                            <div>
                                <i class="fa-solid fa-circle p-1" style="font-size: 5px;"></i>
                            </div>
                            <div class="pl-3">
                                need to be done immediately
                            </div>
                          </div>                    
                        </div>
                    <div class="col-sm-2 checkbox text-end">
                        <i class="fa-solid fa-trash-can"></i>
                    </div>
                </div>
                <div class="todolist-3 d-flex p-3">
                    <div class="col-sm-1 text-center">
                        <input type="checkbox" class="ml-3" name="todolist-2" id="todolist-1">
                    </div>
                    <div class="col-sm-9 checkbox-desc">
                        <label for="" class="todolist-title">Wash laundry 3</label>
                        <div class="d-flex">
                            <div>
                                <i class="fa-solid fa-circle p-1" style="font-size: 5px;"></i>
                            </div>
                            <div class="pl-3">
                                need to be done immediately
                            </div>
                          </div>                    
                        </div>
                    <div class="col-sm-2 checkbox text-end">
                        <i class="fa-solid fa-trash-can"></i>
                    </div>
                </div>
                <div class="todolist-4 d-flex p-3">
                    <div class="col-sm-1 text-center">
                        <input type="checkbox" class="ml-3" name="todolist-2" id="todolist-1">
                    </div>
                    <div class="col-sm-9 checkbox-desc">
                        <label for="" class="todolist-title">Wash laundry 4</label>
                        <div class="d-flex">
                            <div>
                                <i class="fa-solid fa-circle p-1" style="font-size: 5px;"></i>
                            </div>
                            <div class="pl-3">
                                need to be done immediately
                            </div>
                          </div>                    
                        </div>
                    <div class="col-sm-2 checkbox text-end">
                        <i class="fa-solid fa-trash-can"></i>
                    </div>
                </div>
                <div class="todolist-5 d-flex p-3">
                    <div class="col-sm-1 text-center">
                        <input type="checkbox" class="ml-3" name="todolist-2" id="todolist-1">
                    </div>
                    <div class="col-sm-9 checkbox-desc">
                        <label for="" class="todolist-title">Wash laundry 5</label>
                        <div class="d-flex">
                            <div>
                                <i class="fa-solid fa-circle p-1" style="font-size: 5px;"></i>
                            </div>
                            <div class="pl-3">
                                need to be done immediately
                            </div>
                          </div>                    
                        </div>
                    <div class="col-sm-2 checkbox text-end">
                        <i class="fa-solid fa-trash-can"></i>
                    </div>
                </div>
                <div class="todolist-6 d-flex p-3">
                    <div class="col-sm-1 text-center">
                        <input type="checkbox" class="ml-3" name="todolist-2" id="todolist-1">
                    </div>
                    <div class="col-sm-9 checkbox-desc">
                        <label for="" class="todolist-title">Wash laundry 6</label>
                        <div class="d-flex">
                            <div>
                                <i class="fa-solid fa-circle p-1" style="font-size: 5px;"></i>
                            </div>
                            <div class="pl-3">
                                need to be done immediately
                            </div>
                          </div>                    
                        </div>
                    <div class="col-sm-2 checkbox text-end">
                        <i class="fa-solid fa-trash-can"></i>
                    </div>
                </div>

            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>