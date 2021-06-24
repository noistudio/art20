
<!doctype html>
<html lang="ru"><!-- InstanceBegin template="/Templates/shablon-total-wrap.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">-->
    <link rel="stylesheet" href="{{asset("vendor/artadmin/bootstrap/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("vendor/artadmin/css/total.css")}}">
    <link rel="stylesheet" href="{{asset("vendor/artadmin/css/iconset-admin.css")}}">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>total wrapper</title>
    <!-- InstanceEndEditable -->
    <!-- InstanceBeginEditable name="head" -->
    <!-- InstanceEndEditable -->
</head>

<body class="over-hidd">

<div class="preload-cover"></div>

<div class="total-wrapper">
    <!-- InstanceBeginEditable name="EditRegion1" -->



    <div id="mainSldr" class="main-sldr fix-all actv">

        <!--+++++ slides box +++++-->
        <div class="items">

            <div class="item actv">
                <div class="pic">
                    <img src="{{asset("vendor/artadmin/img/login-bnrs/login-bg-02.jpg")}}" alt="">
                </div>
            </div>

            <div class="item">
                <div class="pic">
                    <img src="{{asset("vendor/artadmin/img/login-bnrs/login-bg-07.jpg")}}" alt="">
                </div>
            </div>

            <div class="item">
                <div class="pic">
                    <img src="{{asset("vendor/artadmin/img/login-bnrs/login-bg-01.jpg")}}" alt="">
                </div>
            </div>

            <div class="item">
                <div class="pic">
                    <img src="{{asset("vendor/artadmin/img/login-bnrs/login-bg-08.jpg")}}" alt="">
                </div>
            </div>

        </div>

        <div class="bg"></div>
        <!--+++++ / slides box +++++-->


        <div class="login-box fix-all">
            <div class="wrap flex flex-col flex-just-center">
                <div class="flex flex-col">

                    <div class="row box p-5">
                        @if ($errors->any())
                            <div class="alert alert-danger">

                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <div class="col-4"><img src="{{asset("vendor/artadmin/img/logo-big.png")}}" alt=""></div>
                        <div class="col-8">
                            <form action="{{ route("artadmin.doit") }}" method="POST">

                                <div class="mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input type="email" name="email" required     class="form-control" id="exampleFormControlInput1" placeholder="">
                                </div>
                                <div class="mb-4">
                                    <label for="exampleFormControlTextarea1" class="form-label">{{ trans("artadmin::login.password") }}</label>
                                    <input type="password" name="password" required class="form-control" id="exampleFormControlInput2" placeholder="">
                                </div>
                                <div>

                                  {!! csrf_field() !!}
                                    <button class="btn btn-primary" type="submit">{{ trans("artadmin::login.enter") }}</button>

                                </div>

                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>



    <!-- InstanceEndEditable -->
</div>


<!-- Optional JavaScript -->
<!-- Popper.js first, then Bootstrap JS -->
<script src="{{asset("vendor/artadmin/js/jquery-3-5-1.js")}}"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>-->
<script src="{{asset("vendor/artadmin/bootstrap/js/bootstrap.min.js")}}"></script>
<script src="{{asset("vendor/artadmin/js/main.js")}}"></script>
</body>
<!-- InstanceEnd --></html>
