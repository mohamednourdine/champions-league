</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>403 Error</title>



    <style>
        body {
            background: #081421;
            color: #d3d7de;
            font-family: "Courier new";
            font-size: 18px;
            line-height: 1.5em;
            cursor: default;
        }

        a {
            color: #fff;
        }

        .code-area {
            position: absolute;
            width: 320px;
            min-width: 320px;
            top: 40%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .code-area>span {
            display: block;
        }

        @media screen and (max-width: 320px) {
            .code-area {
                font-size: 5vw;
                min-width: auto;
                width: 95%;
                margin: auto;
                padding: 5px;
                padding-left: 10px;
                line-height: 6.5vw;
            }
        }
    </style>


</head>

<body>

    <div class="code-area">
        <span style="color: #777;font-style:italic;">
            <strong>Oops! You are stuck at 403</strong>
            <p>Something went wrong!</p>

            <h2 class="h1 m-y-lg text-black">{{ trans('backLang.oops') }}!</h2>
            <p class="h5 m-y-lg text-u-c font-bold text-black">{{ trans('backLang.noPermission') }}.</p>
            <a href="{{ URL::previous() }}" class="md-btn amber-700 md-raised p-x-md">
                <span class="text-white">{{ trans('backLang.returnTo') }} <i class="material-icons">&#xe5c4;</i></span>
            </a>
        </span>
        <span>
            <span style="color:#d65562;">
                if
            </span>
            (<span style="color:#4ca8ef;">!</span><span style="font-style: italic;color:#bdbdbd;">found</span>)
            {
        </span>
        <span>
            <span style="padding-left: 15px;color:#2796ec">
                <i style="width: 10px;display:inline-block"></i>throw
            </span>
            <span>
                (<span style="color: #a6a61f">"(??????????)?????? ?????????"</span>);
            </span>
            <span style="display:block">}</span>
            <span style="color: #777;font-style:italic;">
                // <a href="/">Go home!</a>
            </span>
        </span>
    </div>



</body>

</html>
