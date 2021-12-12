<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>User Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <style>
        .profile-userpic img {
            float: none;
            margin: 0 auto;
            width: 50%;
            height: 50%;
            -webkit-border-radius: 50% !important;
            -moz-border-radius: 50% !important;
            border-radius: 50% !important
        }

        .profile-usertitle {
            text-align: center;
            margin-top: 20px
        }

        .profile-usertitle-name {
            color: #5a7391;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 7px
        }

        .profile-usermenu {
            margin-top: 30px;
            padding-bottom: 20px;
            padding-left: 70px;
            font-weight: bold;
        }
    </style>
    <script type="text/javascript">

    </script>
</head>
<body>
<br>
<div class="container bootdey">
    <div class="col-md-12">
        <div class="col-md-4">
            <div class="portlet light profile-sidebar-portlet bordered">
                <div class="profile-userpic">
                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive" alt=""></div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name"> Marcus Doe</div>
                    <div class="profile-usertitle-job"> Administrator</div>
                </div>
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                                <i class="icon-home"></i> My Reservations </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-settings"></i> Edit Profile </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{--Edit settings--}}
        <x-Change-user-settings/>
        {{--my reservations--}}
        <x-Crud-user-reservations/>
    </div>
</div>
</body>

</html>
