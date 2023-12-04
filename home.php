<body>

    <!--INCLUDE CSS FILES + CDNJS-->
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://kit.fontawesome.com/183fd0d756.js" crossorigin="anonymous"></script>
    

    <div class="main">

        <!--Box with a search bar init-->

        <div class="searchbox">

            <div class="searchbar">

                <input type="text" placeholder="Search for jobs" name="criteria" id="criteria"><button type="submit" name="search"><i class="fa fa-search"></i></button>
                
            </div>

        </div>


        <div class="jobsfound">

            <i class="fa-regular fa-bell fa-shake"></i>
            <p class="nbjobsfound">x Jobs found</p>

        </div>

        <div class="line"></div>

        <!--Container who will contain jobs-->

        <div class="jobscontainer">

            <?php
            require ("index.php");
            search_form_submitted();
            ?>

        </div>



    </div>

    <script src="script.js"></script> <!--Insert JS-->
</body>