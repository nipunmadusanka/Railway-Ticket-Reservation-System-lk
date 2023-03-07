@extends('layouts.app')

@section('content')


    <body>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

        {{-- breadCrumb --}}

        <div class="pcoded-main-container">
            <div class="pcoded-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">View GRN</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href={{ route('homePage') }}><i
                                                class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">View GRN</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if ($message = Session::get('success'))
                    <div class="alert alert-info">
                        {{ $message }}
                    </div>
                @endif

                <hr>

                <div class="row">
                    <div class="card col-lg-4">
                        <div class="card-body">
                            <div class="input-group rounded">
                                {{-- <div class="col-lg-10">
                                    <input type="search" class="form-control rounded" placeholder="Search"
                                        aria-label="Search" aria-describedby="search-addon" />
                                </div>
                                <span class="input-group-text border-0" id="search-addon">
                                    <i class="fas fa-search"></i>
                                </span> --}}

                                {{-- <div class="container mt-5">
                                    <div classs="form-group">
                                        <input type="text" id="search" name="search" placeholder="Search"
                                            class="form-control" />
                                    </div>
                                </div> --}}
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <table width="100%" class="table table-striped table-bordered table-hover"
                                                id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Quantity</th>
                                                        <th>Action</th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($product as $data)
                                                        <tr>
                                                            <td id="tr1">{{ $data->ProductName }}</td>
                                                            <td>{{ $data->UnitName }}</td>
                                                            <td class="text-center">
                                                                {{-- <a href="" class="btn btn-primary"
                                                                    data-bs-toggle="modal"
                                                                    onclick="()=>{
                                                                        // itemId ={{ $data->id }}
                                                                        addItemToTable();
                                                                        }">ADD</a> --}}
                                                                {{-- <button class="btn btn-primary" onclick="getID()">test</button> --}}
                                                                <a href="#qty{{ $data->id }}" class="btn btn-primary"
                                                                    data-bs-toggle="modal">ADD</a>
                                                                @include('pages.grnPage.addqty')
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card col-lg-8">
                        <div class="card-body">
                            <div class="row">

                                <ul id="people">
                                </ul>
                                <div class="form-group col-lg-3">
                                    <label for="exampleFormControlSelect1">Supplier</label>
                                    <select class="form-control col-lg-12" name="locationID">
                                        <option value="1">Select Supplier</option>
                                        @foreach ($showsupplier as $showsupplier)
                                            <option value="{{ $showsupplier->supplierName }}">
                                                {{ $showsupplier->supplierName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-lg-3">
                                    <label for="exampleFormControlSelect">Good Received Location</label>
                                    <select class="form-control col-lg-12" name="locationID">
                                        <option value="1">Select Location</option>
                                        @foreach ($location as $showlocation)
                                            <option value="{{ $showlocation->locationName }}">
                                                {{ $showlocation->locationName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-lg-5">
                                    <label class="date-label">Date
                                        <script>
                                            date = new Date().toLocaleDateString();
                                            document.write(date);
                                        </script>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="Description">Description</label>
                                    <textarea class="form-control" id="Description" rows="3"></textarea>
                                  </div>

                            </div>



                            {{-- <div class="row"> --}}
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <table width="100%" class="table table-striped table-bordered table-hover"
                                            id="myTable">
                                            <thead>
                                                <tr>

                                                    <th>#</th>
                                                    <th>ProductID</th>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Brand</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="producttbody">

                                            </tbody>
                                        </table>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success btn-submit" data-bs-dismiss="modal">
                                                Submit GRN</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
        </div>
        <script type="text/javascript">
//             function LoadUpsert() {
//                 var request = { name:"John", age: 31, city:"New York" };
//                 $.ajax({
//                     type:"post",
//                     cache:false,
//                     url:"/Admin/Category/Upsert",
//                     data: JSON.stringify(request),
//                     dataType:"json",
//                     contentType:"application/json; charset=utf-8",
//                     success:function (result) {
//                     alert(result);
//                     },
//                     error:function (result) {
//                     alert("No Connection to server");
//                     },
//                 });
// }
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

        var people = [{
            name: 'John',
            age: 34
        },
        {
            name: 'nipun',
            age: 23
        },
        {
            name: 'chamith',
            age: 25
        }
    ];

    let jsonobj = `[{
            "name": "nipun",
            "faculty": "fot",
            "department": "ict",
            "subject": [{"subId": 1, "subname": "network"},
            {"subId": 2, "subname": "AI"}],
            "rating": 2
        }]`

        const parsejson = JSON.parse(jsonobj);
        console.log(parsejson[0].subject[1]);


        function getID() {
            var getID = document.getElementById('people');
            var output = 0;
        for (var i = 0; i < people.length; i++) {
        output += '<li>' + people[i].age + '</li>';
        }
        getID.innerHTML = output;
    }

        // console.log(JSON.parse(jsonobj)[0].subject[1]);

        var pe

        function deleteRow(btn)
        {
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
        }

            let JsonObject = {
                date: "2022-10-10",
                empId: 5,
                productList: [{
                    id: 1,
                    qty: 2
                }, {
                    id: 2,
                    qty: 2
                }, {
                    id: 3,
                    qty: 2
                }]
            }

            let itemList = [];

            var qtyText = document.getElementById('qtyTextField');
                var brandText = document.getElementById('brandTextField').value;
                var idText = document.getElementById('idTextField');
                var prdctText = document.getElementById('prdctTextField').value;
                var item = {
                    itemid: parseInt(idText.value),
                    prdct: prdctText,
                    qty: parseInt(qtyText.value),
                    brand: brandText
                }

            function addItemToTable() {

                var qtyText = document.getElementById('qtyTextField');
                var brandText = document.getElementById('brandTextField').value;
                var idText = document.getElementById('idTextField');
                var prdctText = document.getElementById('prdctTextField').value;
                var item = {
                    itemid: parseInt(idText.value),
                    prdct: prdctText,
                    qty: parseInt(qtyText.value),
                    brand: brandText
                }
                itemList = [...itemList, item];
                addElementToTable();
            }

            // $(".btn-submit").click(function(e){
            //     console.log("test1");
            //         e.preventDefault();
            //         // console.log(itemList);
            //         var title = "tt";
            //         var body = "uu";
            //         var request = { name:"John", age: 31 };
            //         $.ajax({
            //         type:'POST',
            //         url:"{{ route('posts.add') }}",
            //         data: { item: item },
            //         success:function(data){
            //                 if($.isEmptyObject(data.error)){
            //                     alert(data.success);
            //                     location.reload();
            //                 }else{
            //                     printErrorMsg(data.error);
            //                 }
            //         }
            //         });
            //     });

            function addElementToTable() {
                const tbody = document.getElementById('producttbody');
                let tempHtml = "";
                var index = 0;
                itemList.forEach(item => {
                    index += 1;
                    tempHtml += '<tr><td>' + index + '</td><td>'+ item.itemid +'</td><td>'+ item.prdct +'</td><td>'+ item.qty +'</td><td>'
                        + item.brand +'</td><td><input type="button" value="Delete" onclick="deleteRow(this)" class="btn btn-danger"/></td></tr>';
                });
                tbody.innerHTML = tempHtml;
            }

            $(".btn-submit").click(function(e){
                console.log("work submit button");
                    e.preventDefault();
                    // var title = "tt";
                    // var body = "uu";
                    var request = JSON.stringify(itemList);
                    $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type:'POST',
                    url:"{{ route('posts.add') }}",
                    data: JSON.stringify(itemList),
                    contentType: "json",
                    processData: false,
                    success:function(data){
                            if($.isEmptyObject(data.error)){
                                alert(data.success);
                                location.reload();
                            }else{
                                printErrorMsg(data.error);
                            }
                    }
                    });
                    console.log(request);
                    var re = JSON.parse(request);
                    console.log(re.item);
                    re.forEach(it => {
                        console.log(it.qty);
                    });
                //     $.ajax({
                //     type: "POST",
                //     url: "{{ route('posts.add') }}",
                //     data: '[{ "name": "John", "location": "Boston" }, { "name": "Dave", "location": "Lancaster" }]',
                //     contentType: "json",
                //     processData: false,
                //     success:function(data) {
                //         $('#save_message').html(data.message);
                //     }
                // });

                });
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>
        </div>
        </div>
    </body>
@endsection
