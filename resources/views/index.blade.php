<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>BigHero Assessment!</title>
  </head>
  <body>
    <div class="container mt-3">
        <div class="list-card">
            <div class="list-header-card d-flex justify-content-between align-items-center p-2">
                <div class="title">
                    My To-Do List
                </div>
                <div class="add-list">
                    
                    <i class="fa-solid fa-circle-plus showCreateModal" style="color: white;" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
                </div>
            </div>
            <div class="list-body-card">
                @if (count($lists) > 0)
                    @foreach ($lists as $list)
                        <div class="todolist-{{$list['id']}} d-flex p-3">
                            <div class="col-sm-1 text-center">
                                <input type="checkbox" class="ml-3" name="todolist-{{$list['id']}}" id="todolist-{{$list['id']}}">
                            </div>
                            <div class="col-sm-9 checkbox-desc">
                                <label for="" class="todolist-title">{{$list['title']}}</label>
                                <div class="d-flex">
                                    <div>
                                        <i class="fa-solid fa-circle p-1" style="font-size: 5px;"></i>
                                    </div>
                                    <div class="pl-3">
                                        {{$list['desc']}}
                                    </div>
                                </div>     
                            </div>
                            <div class="col-sm-2 checkbox text-end">
                                <i class="fa-solid fa-trash-can"></i>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="todolist-2 d-flex p-3">
                        <div class="col-sm-1 text-center">
                            <input type="checkbox" class="ml-3" name="todolist-2" id="todolist-1">
                        </div>
                        <div class="col-sm-9 checkbox-desc">
                            <label for="" class="todolist-title">Wash laundry 90</label>
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
                @endif
            </div>
        </div>
    </div>

  
  <!-- Create Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add To-Do List</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex">
                        <div class="col-sm-3">
                            <label for="" class="todolist-title">Title</label>
                        </div>
                        <div class="col-sm-9">
                            <input id="title" name="title" class="form-control" type="text" placeholder="To-Do List Title">
                        </div>
                    </div>
                    <div class="d-flex mt-2">
                        <div class="col-sm-3">
                            <label for="" class="todolist-title">Description</label>
                        </div>
                        <div class="col-sm-9">
                            <textarea id="desc" name="desc" class="form-control" placeholder="Description" ></textarea>
                        </div>
                    </div>
                    <div class="d-flex mt-2">
                        <div class="col-sm-3">
                            <label for="" class="todolist-title">Due Date</label>
                        </div>
                        <div class="col-sm-9">
                            <input id="due_date" name="due_date" class="form-control" type="date">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary create-list">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $('.create-list').on('click', function(){
                var list_title = $('#title').val();
                var list_desc = $('#desc').val();
                var list_due_date = $('#due_date').val();

                console.log(list_due_date);
                if(list_title && list_desc && list_due_date){
                    $.ajax({
                        url: '/create-list',
                        method: 'POST',
                        data: {
                            title: list_title,
                            desc: list_desc,
                            due_date: list_due_date
                        },
                        success: function(res) {
                            alert('Saved!');
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                }
            });
        });
    </script>

  </body>
</html>