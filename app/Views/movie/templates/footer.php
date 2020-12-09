    <div id="footer">



        <div class="footer clearfix">



            <div class="footerleft" style="display: inline-flex;">



                 <!-- <img src='<?php // echo $backURL . "setting/" . $setting['setting_logo']; ?>' width="40%"> -->



               <!--  Copyright © 2020 <a href="#"> Askmebet.com. All rights reserved.</a> -->



                <div style="height: 3.5rem; overflow: hidden; text-overflow: ellipsis">



                </div>



            </div>



            <div class="footeright">



            </div>



        </div>



    </div>





    </div>



    <div id="fb-root" class=" fb_reset">

    </div>



    <style>



        .btn-ads {



            font-family: 'Lato', 'Lucida Grande', 'Lucida Sans Unicode', Tahoma, Sans-Serif;



            -webkit-appearance: none;



            font-size: 1.1rem;



            text-shadow: none;



            line-height: 1.2;



            display: inline-block;



            padding: 10px 16px;



            margin: 0 10px 0 0;



            position: relative;



            /* border-radius: 4px; */



            border: 3px solid transparent;



            background: #444857;



            color: white;



            cursor: pointer;



            white-space: nowrap;



            text-overflow: ellipsis;



            text-decoration: none !important;



            text-align: center;



            font-weight: normal !important;



            width: 80%;



        }



    </style>



    </body>







    </html>





    <script src='<?php echo $docmvURL . "assets/js/jquery.js"; ?>'></script>
    <script src='<?php echo $docmvURL . "assets/js/jquery-migrate.min.js"; ?>'></script>
    <script src='<?php echo $docmvURL . "assets/js/5Npl_DkivWTNCRdzYR204bTSOlo.js"; ?>'></script>

    <script>







        function goReport(id, branch) {







            //alert("sdsds");



            var request = prompt('แจ้งหนังเสืย');







            if (request != null) {



                jQuery.ajax({



                    url: "/savereport/branch/" + branch + "/id/" + id + "/reason/" + request,



                    type: 'GET',



                    crossDomain: true,



                    cache: false,



                    success: function(data) {



                        console.log(request);



                    }



                });



                alert('เราจะดำเนินการให้เร็วที่สุด');



            } else {







            }



        };











        function request_movie(branch) {



            console.log(branch);



            var movie = prompt('ของหนังกับทาง Admin');



            console.log(movie);

            if(movie != null ){

                jQuery.ajax({

                    url: "/saverequest/branch/" + branch + "/movie/" + movie,

                    type: 'GET',

                    async: false,

                    success: function(data) {

                        console.log(data);

                        if (data == "OK" ) {

                            alert("Admin จะรีบดำเนินการให้เร็วที่สุด !");

                        }

                    }

                });

            }

        }



       jQuery("#formsearch").submit(function(event) {

            // alert("Esad");

            if(jQuery("#search").val()){

                var url = "<?= base_url('/search') ?>" + '/' + jQuery("#search").val();

                window.location.href = url;

                event.preventDefault();

            }

        });

       function onClickAds(adsid, branch) {

                var backurl = '<?= $backURL ?>';
                debugger;
                jQuery.ajax({
                    url: backurl + "ads/sid/<?= session_id() ?>/adsid/" + adsid + "/branch/" + branch,
                    async: true,
                    success: function(response) {
                        console.log(url); // server response
                    }
                });
            }

    </script>



