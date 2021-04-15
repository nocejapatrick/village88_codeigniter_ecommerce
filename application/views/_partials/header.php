<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            font-family: 'Roboto', sans-serif;
        }
        .container{
            max-width: 800px;
            margin:40px auto;
            padding:40px;
            box-shadow: 0px 2px 9px #0000003d;
        }

       

        table{
            width: 100%;
        
        }
        table td{
       
            padding: 10px;
            border-right:1px solid #c8c8c8;
            border-top:1px solid #c8c8c8;
        }
        table tr td:first-child{
            border-left:1px solid #c8c8c8;
        }
        table tbody tr:last-child td{
            border-bottom:1px solid #c8c8c8;
        }
        thead td{
            font-weight:bold;
        }
        .light{
            font-weight:300;
        }
        .fifth{
            background: #303030;
        }
        .fifth td{
            color:white;
        }

        .mt-40{
            margin-top: 40px;
        }
        .delete_course a{
            text-decoration: none;
            color: black;
            display: inline-block;

        }

        .btn {
            width: auto;
            display: inline-block;
            border: none;
            padding: 5px 15px;
            background: #78dbf9;
            font-size: .9em;
            cursor: pointer;
        }

        .shop .thead p, .shop .tbody p,  .checkout .thead p, .checkout .tbody p{
            display: inline-block;
            width: 150px;
            font-weight: bold;
            padding:10px;
        }
        .shop .tbody p, .checkout .tbody p{
            font-weight: normal;
        }
        .price{
            width: 30%;
        }
        .shop h1, .container a{
            display: inline-block;
            width: 43%;
        }
        .shop a{
            text-align: right;
        }
        form{
            width: 100%;
        }
        .danger{
            background-color: #f97878;
        }

        .billing label{
            margin: 10px;
            display: inline-block;
        }
        .billing .btn{
            margin-top: 10px;
        }
    </style>
</head>

<body>