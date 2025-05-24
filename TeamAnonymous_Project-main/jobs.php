<!DOCTYPE html>
<html lang="en">
<head> <!--Initial meta tags setup-->
    <meta charset="UTF-8">
    <meta name="keywords" content="Jobs, IT Company Jobs, Software Engineer, Data Analyst, Anonymous, Anonymous Company, Anonymous IT">
    <meta name="author" content="Mustafa Jaffari">
    <title>Jobs Available | Anonymous</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
    <?php include 'header.inc'; ?>
    <div class="main_header"> <!--Main header of the page setup at the front of the website-->
        <figure>
            <img src="images/jobs_image.png" alt="Group of team working together" class="banner_image">
        </figure>
        <h1> <!--Main Header-->
            Available Jobs!
        </h1>
    </div>
    <main>
        <?php
        require_once('db_connection.php');

        if(!$conn) {
            echo "<p>Database connection failed: " . mysqli_connect_error() . "</p>";
        }else{
            $sql = "SELECT * FROM jobs";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_assoc($result)){
                    $jobReferenceNum=htmlspecialchars($row['job_reference_number']);    #Setup all the varibales for each column in the jobs database
                    $jobTitle=htmlspecialchars($row['job_title']);
                    $employer=htmlspecialchars($row['employer']);
                    $location=htmlspecialchars($row['location']);
                    $jobDescription=htmlspecialchars($row['job_description']);
                    $jobMinSalary=htmlspecialchars($row['job_salary_min']);
                    $jobMaxSalary=htmlspecialchars($row['job_salary_max']);
                    $reportsTo=htmlspecialchars($row['reports_to']);
                    $keyResponsibilities=preg_split("/\n/", htmlspecialchars($row['key_responsibilities']));
                    $essentialQualifications=preg_split("/\n/", htmlspecialchars($row['essential_qualifications']));
                    $preferrableQualifications=preg_split("/\n/", htmlspecialchars($row['preferrable_qualifications']));
                    $idealApplicant=preg_split("/\n/", htmlspecialchars($row['ideal_applicant']));


                    echo "<div class='job'> <!--Division setup for the Software developer part of the page-->";
                        echo "<h2>$jobTitle ($jobReferenceNum)</h2> <!--Utilised the prompt in gen AI : Generate a 5 digit reference number for software developer job -->";
                        echo "<p>$employer</p>";
                        echo "<p>$location</p>";
                        echo "<h3>Brief Description</h3>";
                        echo "<!--Utilised the prompt in gen AI : Generate a brief description of the position for software developer-->";
                        echo "<p>$jobDescription</p>";
                        echo "<h3>Salary Range</h3>";
                        echo "<p>$$jobMinSalary - $$jobMaxSalary per year</p> <!--Researched myself and chose some numbers-->";
                        echo "<p>Reports to \"$reportsTo\"</p> ";
                        echo "<section class='responsibilities'> <!--Section for the responsibilities of the job-->";
                            echo "<h3>Key Responsibilities</h3>";
                            echo "<ul> <!--Unordered list for Software devloper responsibilities--> <!--Utilised the prompt in gen AI : Generate Key responsibilities. A list of the specific tasks that are to be performed for software developer-->";
                            for ($i=0; $i<count($keyResponsibilities); $i++){
                                echo "<li>$keyResponsibilities[$i]</li>";
                            }
                            echo "</ul>";
                        echo "</section>";
                        echo "<h3 class='required_qualifications'>Required qualifications, skills, knowledge and attributes</h3> <!-- Header for the required qualifications-->";
                        echo "<section class='essential'> <!-- new section for the essential requirements for software devloper-->";
                            echo "<h4>Essential</h4>";
                            echo "<ol> <!--Ordered list--> <!--Utilised the prompt in gen AI : Generate essential requirements for a software developer-->";
                            for ($i=0; $i<count($essentialQualifications); $i++){
                                echo "<li>$essentialQualifications[$i]</li>";
                            }
                            echo "</ol>";
                        echo "</section>";
                        echo "<aside class='preferrable'> <!--Aside element for preferred qualifications for software developer with an unordered list to allow it to pan on the left side of the screen-->";
                            echo "<h4>Preferrable</h4>";
                            echo "<ul style='list-style-type: square;'> <!--Lists the dot points in squares rather than dots --> <!--Utilised the prompt in gen AI : Generate preferred requirements for a software developer-->";
                            for ($i=0; $i<count($preferrableQualifications); $i++){
                                echo "<li>$preferrableQualifications[$i]</li>";
                            }
                            echo "</ul>";
                        echo "</aside>";
                        echo "<!--Utilised the prompt in gen AI : Generate candidate description for a software developer-->";
                        echo "<p class ='candidate_description'>The successful applicant will be expected to work in an environment that values innovation, collaboration, and continuous improvement.</p>";
                        echo "<p class='apply_button'>";
                            echo "<a href='apply.html' class='apply-button'>Apply Now</a> <!--apply button that links to apply page-->";
                        echo "</p>";
                    echo "</div>";
                }
            }
        }
        ?>
    </main>
    <?php include 'footer.inc'; ?>
</body>