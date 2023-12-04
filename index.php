<?php
require("db.php");

// Check is search form is submitted or not
function search_form_submitted() {
    if (isset($_POST['submit'])) {
        $criteria = $_POST['criteria'] ? $_POST['criteria'] : null;
        return true;
    } else {
        return false;
    }
}


    if (search_form_submitted() && $criteria) {

            //Query jobs by search criteria

            $query_display_jobs_by_search_criteria = "
            SELECT title, description, wage, place, post_date, company_name
            FROM advertisement, company
            WHERE advertisement.id_company = company.id_company
            AND title LIKE '%$criteria%'
                OR description LIKE '%$criteria%'
                OR place LIKE '%$criteria%'
                OR company_name LIKE '%$criteria%'
            ORDER BY post_date DESC
            LIMIT 3;
            ";
        
            // Fetch jobs by search criteria
        
            $result_display_jobs_by_search_criteria = mysqli_query($conn, $query_display_jobs_by_search_criteria);

            if (mysqli_num_rows($result_display_jobs_by_search_criteria) > 0) {
                while ($row = mysqli_fetch_array($result_display_jobs_by_search_criteria)) {
                    echo '
                    <div class="job-card">
                        <div class="job-card-header">
                            <h3>'. $row["title"]. '</h3>
                            <h4>'. $row["company_name"]. '</h4> 
                        </div>
                        <div class="job-card-body">
                            <p id="desc">'. $row["description"]. '</p>
                            <p id="wage">'. $row["wage"]. '€ p.a.</p>
                            <p id="place">'. $row["place"]. '</p>
                            <p id="post_date">'. $row["post_date"]. '</p>
                        </div>
                        <div class="job-card-footer">
                            <a href="apply.php"><button class="apply">Apply</button></a>
                            <button class="more" id="more">Learn more</button>
                        </div> 
                    </div>
                    ';
                }
            } else {
                echo '<p>No jobs found</p>';
            }


    } else {  
        //Query all job ads

        $query_display_all_job_ads = "
        SELECT id_adv, title, description, wage, place, post_date, company_name 
        FROM advertisement, company
        WHERE advertisement.id_company = company.id_company
        ORDER BY post_date DESC
        LIMIT 3;";

        // Fetch all job ads

        $result_display_all_job_ads = mysqli_query($conn, $query_display_all_job_ads);

        if (mysqli_num_rows($result_display_all_job_ads) > 0) {
            //output data of each row
            while ($row = mysqli_fetch_array($result_display_all_job_ads)) {
                echo '
                <div class="job-card">
                    <div class="job-card-header">
                        <h3>'. $row["title"]. '</h3>
                        <h4>'. $row["company_name"]. '</h4> 
                    </div>
                    <div class="job-card-body">
                        <p id="desc">'. $row["description"]. '</p>
                        <p id="wage">'. $row["wage"]. '€ p.a.</p>
                        <p id="place">'. $row["place"]. '</p>
                        <p id="post_date">'. $row["post_date"]. '</p>
                    </div>
                    <div class="job-card-footer">
                        <a href="apply.php?job_id=' . $row["id_adv"] . '"><button class="apply">Apply</button></a>
                        <button onclick="display(event)" class="more" id="more">Learn more</button>
                    </div> 
                </div>
                ';
            }
        } else { 
            echo "<h2>0 results</h2>";
        }
    }


// Close connection
mysqli_close($conn);
?>