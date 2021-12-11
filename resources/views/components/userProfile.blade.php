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
        <div class="col-md-8">
            <div class="portlet light bordered">
                <div class="portlet-title tabbable-line">
                    <div class="caption caption-md" style="margin-bottom: 20px; padding-left: 14px">
                        <i class="icon-globe theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase">Edit settings</span>
                    </div>
                </div>
                <div class="portlet-body">

                    <!-- Profile Settings-->
                    <div class="col-lg-8 pb-5">
                        <form class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="account-fn">First Name</label>
                                    <input class="form-control" type="text" id="account-fn" value="Daniel" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="account-ln">Last Name</label>
                                    <input class="form-control" type="text" id="account-ln" value="Adams" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="account-email">E-mail Address</label>
                                    <input class="form-control" type="email" id="account-email"
                                           value="daniel.adams@example.com" disabled="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="account-phone">Phone Number</label>
                                    <input class="form-control" type="text" id="account-phone"
                                           value="+7 (805) 348 95 72" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="account-pass">New Password</label>
                                    <input class="form-control" type="password" id="account-pass">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="account-confirm-pass">Confirm Password</label>
                                    <input class="form-control" type="password" id="account-confirm-pass">
                                </div>
                            </div>
                            <div class="col-12" style="padding-left: 14px">
                                <hr class="mt-2 mb-3">
                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                    <button class="btn btn-style-1 btn-primary" type="button" data-toast=""
                                            data-toast-position="topRight" data-toast-type="success"
                                            data-toast-icon="fe-icon-check-circle" data-toast-title="Success!"
                                            data-toast-message="Your profile updated successfuly.">Update Profile
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>

</div>
        {{--my reservations--}}
        <div class="col-md-8">
            <div class="portlet light bordered">
                <div class="portlet-title tabbable-line">
                    <div class="caption caption-md" style="margin-bottom: 20px; padding-left: 14px">
                        <i class="icon-globe theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase">My Reservations</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Column heading</th>
                            <th>Column heading</th>
                            <th>Column heading</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="active">
                            <th scope="row">1</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                        </tr>
                        <tr class="success">
                            <th scope="row">3</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                        </tr>
                        <tr class="info">
                            <th scope="row">5</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                        </tr>
                        <tr class="warning">
                            <th scope="row">7</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                        </tr>
                        <tr>
                            <th scope="row">8</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                        </tr>
                        <tr class="danger">
                            <th scope="row">9</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                        </tr>
                        <tr class="danger">
                            <th scope="row">9</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
