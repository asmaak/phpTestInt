<?php

//some settings
$random_images = array(
    'http://icons.iconarchive.com/icons/zairaam/bumpy-planets/256/07-jupiter-icon.png',
    'http://www.princeton.edu/~willman/planetary_systems/Sol/Saturn/Saturn.gif',
    'http://www.solstation.com/stars/venus.gif',
    'https://mars.nasa.gov/images/flckrEclipse-full2.jpg'
);

$cover_image = 'http://www.androidguys.com/wp-content/uploads/2016/01/summer-sunset-293095.jpg';

//php code here

?>
<!doctype html>
<html lang="en">

<head>
    <title>Three29 Test</title>
    <style>
        /* http://meyerweb.com/eric/tools/css/reset/ 
   v2.0 | 20110126
   License: none (public domain)
*/
        html, body, div, span, applet, object, iframe,
        h1, h2, h3, h4, h5, h6, p, blockquote, pre,
        a, abbr, acronym, address, big, cite, code,
        del, dfn, em, img, ins, kbd, q, s, samp,
        small, strike, strong, sub, sup, tt, var,
        b, u, i, center,  
        dl, dt, dd, ol, ul, li,
        fieldset, form, label, legend,
        table, caption, tbody, tfoot, thead, tr, th, td,
        article, aside, canvas, details, embed, 
        figure, figcaption, footer, header, hgroup, 
        menu, nav, output, ruby, section, summary,
        time, mark, audio, video {
	    margin: 0;
	    padding: 0;
	    border: 0;
	    font-size: 100%;
	    font: inherit;
	    vertical-align: baseline;
        }
        /* HTML5 display-role reset for older browsers */
        article,
        aside,
        details,
        figcaption,
        figure,
        footer,
        header,
        hgroup,
        menu,
        nav,
        section {
            display: block;
        }

        body {
            line-height: 1;
        }

        ol,
        ul {
            list-style: none;
        }

        blockquote,
        q {
            quotes: none;
        }

        blockquote:before,
        blockquote:after,
        q:before,
        q:after {
            content: '';
            content: none;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        /* css here */
        .wrapper {
            padding: 5px;
            display: flex;
            height: 100vh;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            text-align: center;
            align-self: center;
        }

        div {
            height: 25%;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        .wrapper div:nth-of-type(1) {
            background: url("<?php echo $cover_image; ?>");
            background-repeat: no-repeat;
            background-size: cover;

        }

        .wrapper div:nth-of-type(2) {
            background: orange;
            z-index: 1;
        }
        .wrapper div:nth-of-type(3) {
            background: blue;
        }

        .wrapper div:nth-of-type(4) {
            background: yellow;
        }

        .wrapper div:nth-of-type(4) p {
            margin-top: 25px;
            font-size: 30px;
        }

        .divInt1 {
            width: 25%;
        }

        .divToggle1 {
            width: 100%;
        }

        .divInt2 {
            width: 75%;
        }

        .divToggle2 {
            width: 100%;
        }

        .divInt3 {
            width: 50%;
            background: blue;
        }

        .divToggle3 {
            width: 100%;
            background: red !important;
        }

        .divInt4 {
            width: 90%;
        }

        .divToggle4 {
            width: 100%;
        }
        img{
            height:100%;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>


    <!-- //javascript code here -->
    <script>
        $(window).load(function() {

            "use strict";
            getData('#div1', "pivot_cookie.php");
            getData('#div2', "pivot_cookie1.php");
            getData('#div3', "pivot_cookie3.php");
            getData('#div4', "pivot_cookie2.php");

            var range = 599;
            $(window).resize(function() {
                var windowW = $(this).width();
                if (windowW < range) {
                    $('#div3').hide();
                    $('#div4').hide();

                } else {
                    $('#div3').show();
                    $('#div4').show();
                }
            })

            var mainClass1 = $('#div1').attr('class');
            var mainClass2 = $('#div2').attr('class');
            var mainClass3 = $('#div3').attr('class');
            var mainClass4 = $('#div4').attr('class');

            $('#div1').click(function() {
                check('#div1', 'divInt1', "divToggle1", "pivot_cookie.php");
            });
            $('#div2').click(function() {
                check('#div2', 'divInt2', "divToggle2", "pivot_cookie1.php");
            });
            $('#div3').click(function() {
                check('#div3', 'divInt3', "divToggle3", "pivot_cookie3.php");
            });
            $('#div4').click(function() {
                check('#div4', 'divInt4', "divToggle4", "pivot_cookie2.php");
            });

        });

        function check(main, divInt, divToggle, url) {
            var mainClass = $(main).attr('class');
            if (mainClass == divInt) {
                mainClass = divToggle;
                postData(main, divToggle, url);
            } else {
                mainClass = divInt;
                postData(main, divInt, url);
            }

        }
        // Post cookie usning AJAX
        function postData(y, config, url) {
            var varDiv = '#div' + y;
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    "config_copy": config,
                },

                success: function(data, b, c) {
                    $(y).removeAttr('class', {
                        duration: 500
                    });
                    $(y).addClass(config, {
                        duration: 500
                    });

                }
            });

        }
        // Get cookie usning AJAX
        function getData(y, url) {
            $.ajax({
                url: url,
                type: "GET",
                data: "config_copy",
                success: function(data, b, c) {
                    $(y).removeAttr('class', {
                        duration: 500
                    });
                    $(y).addClass(data, {
                        duration: 500
                    });

                }
            });
        }
    </script>
</head>

<body>
    <div id="wrapper" class="wrapper">
        <div id="div1" class="divInt1">

        </div>
        <div id="div2" class="divInt2">
            <?php

            $randomNumber = rand(0, (count($random_images) - 1));
            echo '<img src="' . $random_images[$randomNumber] . '">';

            ?>
        </div>
        <div id="div3" class="divInt3">

        </div>
        <div id="div4" class="divInt4">
            <p>
                <?php
                $i = 1;
                $val = "";
                while ($i < 10) {
                    if ($i % 2 != 0) {
                        $val .= $i;
                    }

                    $i++;
                }
                $rev = strrev($val);
                echo $val;
                echo substr($rev, 1);
                ?></p>

        </div>
    </div>

</body>

</html>