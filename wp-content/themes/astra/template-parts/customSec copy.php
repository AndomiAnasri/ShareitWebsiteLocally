<?php

/**
 * Template Name:  Custom sec 2222
 */
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
        <style>
            /* Style the tab */
            .tab {
                overflow: hidden;
            }

            /* Style the buttons inside the tab */
            .tab button {
                background-color: inherit;
                float: left;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 14px 16px;
                margin-right: 7px;
                transition: 0.3s;
                border-radius: 7px;
                background-color: #6b7280;
                font-size: 17px;
            }

            /* Change background color of buttons on hover */
            .tab button:hover {
                background-color: #1f2937;
            }

            /* Create an active/current tablink class */
            .tab button.active {
                background-color: #1f2937;
            }

            /* Style the tab content */
            .tabcontent {
                display: none;
                padding: 20px 0px;
                border-top: none;
            }


            .storyTabsBg {
                background-image: linear-gradient(90deg,
                        #975ba4,
                        #8a69b5 11%,
                        #7c79c3 21%,
                        #6b86cc 32%,
                        #5a92d3 42%,
                        #4c9dd6 51%,
                        #47a9d7 61%,
                        #49b2d4 70%,
                        #57bdd1 80%,
                        #65c4cd 90%,
                        #7acdcb);
                padding: 7px 20px;
                border-radius: 7px;
            }

            .star-rating {
                /* line-height: 32px; */
                font-size: 1.25em;
            }

            .star-rating {
                margin: 0px 3px;
                color: yellow;
            }

            .float-right {
                float: right;
            }


            .star-rating {
                color: #facc15;
                /* margin: 0px 3px; */
            }

            .c-h-h6 {
                font-size: 16px;
            }

            .icon-size-thumb {
                font-size: 22px;
            }

            .icon-size-star {
                font-size: 18px;
            }



            .geeks {
                /* width: 300px; */
                /* height: 300px; */
                overflow: hidden;
                margin: 0 auto;
                border-radius: 15px;
            }

            .geeks img {
                width: 100%;
                transition: 0.5s all ease-in-out;
            }

            .geeks:hover img {
                transform: scale(1.2);
            }
        </style>

        <div class="container">


            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">London</button>
                <button class="tablinks" onclick="openCity(event, 'Paris')">Paris</button>
                <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
            </div>

            <div id="London" class="tabcontent">

                <div class="storyTabsBg">

                    <div class="row">
                        <div class="col-6">
                            <div class="d-flex align-self-center">
                                <div class="flex-shrink-0 mr-3">
                                    <img src="https://cdn.pixabay.com/photo/2017/02/23/13/05/avatar-2092113__340.png" alt="Generic placeholder image" class="img-fluid rounded-circle border border-dark border-3" style="width: 50px;">
                                </div>
                                <div class="align-self-center">
                                    <p class="c-h-h6 text-white mt-3">New Spoky 2</p>
                                </div>
                                <div class="align-self-center">
                                    <p class="c-h-h6 text-white mt-3 font-weight-bold pl-2"> Hello World </p>
                                </div>
                                <div class="align-self-center">
                                    <p class="c-h-h6 text-white mt-3 font-weight-bold pl-2"> Hello World <a href="#">...Read more</a> </p>
                                </div>

                                <p>
                                    <!-- ' . substr($row["content"], 0, 200) . '... -->
                                </p>
                            </div>


                        </div>
                        <div class="col-6 align-self-center ">
                            <div class="d-flex float-right ">
                                <div class="d-flex mt-3">
                                    <p class="c-h-h6 text-white  pl-2">Rating: </p>

                                    <i class="bi bi-star-fill star-rating icon-size-star"></i>
                                    <i class="bi bi-star-fill star-rating icon-size-star"></i>
                                    <i class="bi bi-star-fill star-rating icon-size-star"></i>
                                    <i class="bi bi-star-fill star-rating icon-size-star"></i>
                                    <i class="bi bi-star-fill star-rating icon-size-star"></i>
                                </div>

                                <div class="mt-2 ml-3">
                                    <i class="bi bi-hand-thumbs-up-fill text-white icon-size-thumb "></i>
                                    <br>
                                    <small class="text-white">12345</small>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <h2 class="mt-5 mb-3">
                            Leagues
                        </h2>
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="geeks">
                                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20200403151026/adblur_gfg.png" alt="Geeks Image" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="geeks">
                                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20200403151026/adblur_gfg.png" alt="Geeks Image" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="geeks">
                                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20200403151026/adblur_gfg.png" alt="Geeks Image" />
                                </div>
                            </div>
                            <div class="item">

                                <div class="geeks">
                                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20200403151026/adblur_gfg.png" alt="Geeks Image" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="geeks">
                                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20200403151026/adblur_gfg.png" alt="Geeks Image" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="geeks">
                                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20200403151026/adblur_gfg.png" alt="Geeks Image" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="geeks">
                                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20200403151026/adblur_gfg.png" alt="Geeks Image" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="geeks">
                                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20200403151026/adblur_gfg.png" alt="Geeks Image" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="geeks">
                                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20200403151026/adblur_gfg.png" alt="Geeks Image" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="geeks">
                                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20200403151026/adblur_gfg.png" alt="Geeks Image" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <div id="Paris" class="tabcontent">
                <h3>Paris</h3>
                <p>Paris is the capital of France.</p>
            </div>

            <div id="Tokyo" class="tabcontent">
                <h3>Tokyo</h3>
                <p>Tokyo is the capital of Japan.</p>
            </div>
        </div>
</div>

<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    document.getElementById("defaultOpen").click();

    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items: 6,
        loop: true,
        margin: 20,
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true
    });
    $('.play').on('click', function() {
        owl.trigger('play.owl.autoplay', [1000])
    })
    $('.stop').on('click', function() {
        owl.trigger('stop.owl.autoplay')
    })





</script>





</main><!-- .site-main -->
</div><!-- .content-area -->

