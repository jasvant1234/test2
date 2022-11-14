@extends('layouts.app')

@section('content')

    <style>
        h3::first-letter {
            font-size: 200%;
            color: #FFC100;
            font-weight: 900;

        }
    </style>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="card-title"><b style="font-size: 30px">ADD ALL CLOTHES</b></h3>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">ALL CLOTHES</a></li>
                        <li class="breadcrumb-item active">HOME</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <form method="post" action="{{route('gents_clothes_store')}}" enctype="multipart/form-data">

        @csrf
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="gender"> SELECT GENDER</label>
                    <select name="gender" class="form-control">
                        <option value=""> SELECT GENDER </option>
                        <option value="male"> Male </option>
                        <option value="female"> Female </option>
                        <option value="child"> Child </option>
                    </select>
                    <span style="color: red">@error('gender'){{$message}}@enderror</span>
                </div>

                <div class="form-group col-md-6">
                    <label for="category"> SELECT CATEGORY</label>
                    <select name="category" class="form-control">
                        <option value=""> SELECT CATEGORY </option>
                        <option value="Shirts"> Shirts </option>
                        <option value="Jeans"> Jeans </option>
                        <option value="Swimwear"> Swimwear </option>
                        <option value="Sleepwear"> Sleepwear </option>
                        <option value="Sportswear"> Sportswear </option>
                        <option value="Jumpsuits"> Jumpsuits </option>
                        <option value="Blazers"> Blazers </option>
                        <option value="Jackets"> Jackets </option>
                        <option value="Shoes"> Shoes </option>
                        <option value="childs"> for childs </option>
                    </select>
                    <span style="color: red">@error('gender'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">CHOOSE PRODUCT IMAGE</label>
                        <div class="custom-file">
                            <input type="file" name="product_image" class="form-control" id="customFile" value="{{old('product_image')}}" >
                            <label class="custom-file-label" for="customFile" >CHOOSE PRODUCT IMAGE</label>

                        </div>
                    </div>
                </div>


            <div class="row">
            <div class="form-group col-md-12">
                <label for="product_name">PRODUCT NAME</label>
                <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Enter Product Name" value="{{old('product_name')}}">
                <span style="color: red">@error('product_name'){{$message}}@enderror</span>
            </div>
            </div>

            <div class="row">

                <div class="form-group col-md-6">
                    <label for="product_image">PRODUCT PRICE</label>
                    <input type="text" name="product_price" class="form-control" id="product_price"  value="{{old('product_price')}}">
                    <span style="color: red">@error('product_price'){{$message}}@enderror</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="product_image">PRODUCT SIZE</label>
                    <input type="text" name="product_size" class="form-control" id="product_size"  value="{{old('product_size')}}">
                    <span style="color: red">@error('product_size'){{$message}}@enderror</span>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                <label for="product_descreption">PRODUCT DESCREPTION</label>
                <textarea rows="4" type="text" name="product_descreption" class="form-control" id="product_descreption" placeholder="Enter Product Description">{{old('product_descreption')}}</textarea>
                <span style="color: red">@error('product_descreption'){{$message}}@enderror</span>
                </div>
            </div>

        <!-- /.card-body -->
            <div class="row">
        <div class="form-group col-md-6">
            <button type="submit" class="btn btn" style="background-color: #fd7e14">Submit</button>
            <a href="{{route('index')}}"><button type="button" class="btn btn" style="background-color: #fd7e14">Back</button></a>
        </div>
            </div>
        </div>

    </form>


@endsection
