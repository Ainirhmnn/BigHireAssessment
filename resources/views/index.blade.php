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
                    <i class="fa-solid fa-circle-plus showCreateModal crud-btn" style="color: white;" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
                </div>
            </div>
            <div class="list-body-card">
                @if (count($lists) > 0)
                    @foreach ($lists as $list)
                        <div class="todolist-{{$list['id']}} d-flex p-3">
                            @php
                                $overline_text = '';
                                $checked = '';
                                if ($list['is_completed'] == 'Y') {
                                    $overline_text = 'overline_text';
                                    $checked = 'checked';
                                }
                            @endphp
                            <div class="col-sm-1 text-center">
                                <input type="checkbox" class="ml-3 todolist-checkbox" name="todolist-{{$list['id']}}" id="todolist-{{$list['id']}}" data-list-id="{{$list['id']}}" {{ $checked }}>
                            </div>
                            <div class="col-sm-9 checkbox-desc">
                                <label for="" class="todolist-title {{ $overline_text }}" data-list-id="{{$list['id']}}">{{$list['title']}}</label>
                                <div class="d-flex text-muted todolist-title font-11">
                                    <label for="">Due Date: </label>
                                    <div class="pl-3"> &nbsp;
                                        {{date('d M Y', strtotime($list['due_date']))}}
                                    </div>
                                </div>  
                                <div class="pl-3">
                                    {{$list['desc']}}
                                </div>
                            </div>
                            <div class="col-sm-2 checkbox text-end">
                                <i class="fa-solid fa-pen-to-square crud-btn edit-list"  data-list='@json($list)'></i>
                                <i class="fa-solid fa-trash-can crud-btn delete-list" data-list-id="{{$list->id}}"></i>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="todolist-2 d-flex p-3">
                        To-Do List Not Available!
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
                    <input type="hidden" id="list_id" name="list_id">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            $('#exampleModal').on('hidden.bs.modal', function () {
                $('#title').val('');
                $('#desc').val('');
                $('#due_date').val('');
                $('#list_id').val('');
            });

            $('.create-list').on('click', function(){
                var list_id = $('#list_id').val();
                console.log(list_id);
                var list_title = $('#title').val();
                var list_desc = $('#desc').val();
                var list_due_date = $('#due_date').val();

                var url = '/create-list';
                var method = 'POST';
                if(list_id){
                    url = '/edit-list/' + list_id;
                    method = 'PUT';
                }
                if(list_title && list_desc && list_due_date){
                    var data = {
                        title: list_title,
                        desc: list_desc, 
                        due_date: list_due_date
                    };
                    submitAjax(url,method,data);
                    
                }else{
                    Swal.fire({
                        title: "Mandatory Fields is Empty!",
                        text: "Please Fill in All Required Fields!",
                        icon: "warning"
                    });
                }
            });

            $('.edit-list').on('click', function(){
                let list = $(this).data('list');
                var list_id = list.id;
                var list_title = list.title;
                var list_desc = list.desc;
                var list_date = list.due_date;

                $('#exampleModal').modal('show');
                $('#list_id').val(list_id);
                $('#title').val(list_title);
                $('#desc').val(list_desc);
                $('#due_date').val(list_date);
            });

            $('.delete-list').on('click', function(){
                let list_id = $(this).data('list-id');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = 'delete-list/' + list_id;
                        submitAjax(url,'DELETE',[]);
                    }
                });
            });

            $('.todolist-checkbox').on('change', function(){
                let checkbox = $(this);
                var list_id = checkbox.data('list-id');
                var isChecked = checkbox.is(':checked') ? 'Y' : 'N';

                $.ajax({
                    url: '/edit-list/' + list_id,
                    method: 'PUT',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    data: {
                        'is_completed': isChecked
                    },
                    success: function(res) {
                        console.log(res.success);
                        if (res.success) {
                            let label = $('label[data-list-id="' + list_id + '"]');
                            console.log(label);
                            console.log('List ID:', list_id);

                            if (label.hasClass('overline_text')) {
                                label.removeClass('overline_text');
                            } else {
                                label.addClass('overline_text');
                            }
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });

            });
            
            function submitAjax(url, method, data){
                $.ajax({
                    url: url,
                    method: method,
                    data: data,
                    success: function(res) {
                        var title = res.title;
                        var msg = res.message;
                        if (res.success) {
                            Swal.fire({
                                title: title,
                                text: msg,
                                icon: "success",
                            }).then((result) => {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: title,
                                text: msg,
                                icon: "warning",
                            });
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }
        });
    </script>

  </body>
</html>