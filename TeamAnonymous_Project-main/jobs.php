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
                    $keyResponsibilities=htmlspecialchars($row['key_responsibilities']);
                    $essentialQualifications=htmlspecialchars($row['essential_qualifications']);
                    $preferrableQualifications=htmlspecialchars($row['preferrable_qualifications']);
                    $idealApplicant=htmlspecialchars($row['ideal_applicant']);


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
                                echo "<li>Design, develop, and implement software solutions that meet the business requirements.</li>";
                                echo "<li>Write clean, scalable, and efficient code, following best practices and coding standards.</li>";
                                echo "<li>Perform code reviews and provide constructive feedback to peers.</li>";
                                echo "<li>Collaborate with project managers, designers, and other developers to deliver high-quality solutions on time.</li>";
                                echo "<li>Troubleshoot, debug, and upgrade existing software applications.</li>";
                                echo "<li>Test and deploy applications and systems, ensuring cross-platform functionality.</li>";
                                echo "<li>Document development processes, code changes, and technical specifications.</li>";
                                echo "<li>Stay up-to-date with emerging trends and technologies in software development.</li>";
                                echo "<li>Provide technical support and guidance to other team members when necessary.</li>";
                            echo "</ul>";
                        echo "</section>";
                        echo "<h3 class='required_qualifications'>Required qualifications, skills, knowledge and attributes</h3> <!-- Header for the required qualifications-->";
                        echo "<section class='essential'> <!-- new section for the essential requirements for software devloper-->";
                            echo "<h4>Essential</h4>";
                            echo "<ol> <!--Ordered list--> <!--Utilised the prompt in gen AI : Generate essential requirements for a software developer-->";
                                echo "<li>Bachelor's degree in Computer Science, Software Engineering, or a related field, or equivalent practical experience.</li>";
                                echo "<li>Minimum of 3 years of professional experience in software development.</li>";
                                echo "<li>Strong proficiency in at least two programming languages such as Java, Python, C#, or JavaScript.</li>";
                                echo "<li>Experience with software development frameworks and technologies (e.g., .NET, React, Angular, Spring, Django).</li>";
                                echo "<li>Strong understanding of object-oriented design principles and software architecture.</li>";
                                echo "<li>Proficient in version control systems, such as Git.</li>";
                                echo "<li>Familiarity with relational and non-relational databases (e.g., MySQL, MongoDB).</li>";
                                echo "<li>Ability to work independently and as part of a team in a fast-paced environment.</li>";
                            echo "</ol>";
                        echo "</section>";
                        echo "<aside class='preferrable'> <!--Aside element for preferred qualifications for software developer with an unordered list to allow it to pan on the left side of the screen-->";
                            echo "<h4>Preferrable</h4>";
                            echo "<ul style='list-style-type: square;'> <!--Lists the dot points in squares rather than dots --> <!--Utilised the prompt in gen AI : Generate preferred requirements for a software developer-->";
                                echo "<li>Master's degree in Computer Science, Software Engineering, or a related field.</li>";
                                echo "<li>5+ years of experience in software development.</li>";
                                echo "<li>Experience with cloud platforms such as AWS, Azure, or Google Cloud.</li>";
                                echo "<li>Knowledge of containerization technologies such as Docker and Kubernetes.</li>";
                                echo "<li>Familiarity with CI/CD pipelines and automated testing tools.</li>";
                                echo "<li>Understanding of Agile methodologies, such as Scrum or Kanban.</li>";
                                echo "<li>Experience with mobile development frameworks (e.g., React Native, Swift, Kotlin).</li>";
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
        
        <div class="DAN92"> <!-- New div element for the data analyst job-->
            <h2>Data Analyst (DAN92)</h2> <!--Main header for the job title -->
            <p>Team Anonymous</p>
            <p>Melbourne VIC</p>
            <h3>Brief Description</h3> <!--Heading for brief description-->
            <p>We are seeking a skilled and detail-oriented Data Analyst to join our team. The successful candidate will be responsible for collecting, processing, and analyzing large datasets to help drive business decisions. The role involves working closely with cross-functional teams to provide actionable insights through data visualization and reporting, ensuring that the organization’s data-driven strategies are executed effectively.</p>
            <h3>Salary Range</h3>
            <p>$55,000 - $85,000 per year</p>
            <p>Reports to Data Scientist Manager</p>
            <section id="responsibilitiesDAN92"> <!--Section element for the responsibilitis for data analyst-->
                <h3>Key Responsibilities</h3> <!-- Header for key responsibilities-->
                <ul> <!-- Unoredered list for responsibiltiies--> <!--Utilised the prompt in gen AI : Generate Key responsibilities. A list of the specific tasks that are to be performed for a Data Analyst-->
                    <li>Collect, clean, and process data from various sources to ensure accuracy and reliability.</li>
                    <li>Perform exploratory data analysis (EDA) to uncover trends, patterns, and insights.</li>
                    <li>Create and maintain dashboards and reports that present complex data in a clear, understandable manner.</li>
                    <li>Perform statistical analysis and modeling to support business decisions and predict trends.</li>
                    <li>Conduct data validation and quality assurance to ensure data integrity and consistency.</li>
                    <li>Provide recommendations based on data analysis to optimize business operations and performance.</li>
                    <li>Develop and maintain automated processes to streamline data collection and reporting.</li>
                    <li>Continuously monitor key performance indicators (KPIs) to track and evaluate business performance.</li>
                    <li>Assist with data-related training and mentoring of junior team members.</li>
                </ul>
            </section>
            <h3 id="required_qualificationsDAN92">Required qualifications, skills, knowledge and attributes</h3> 
            <section id="essentialDAN92"> <!--Sectioin for the essential requirements-->
                <h2>Essential</h2>
                <ol> <!--Ordered list for the essential requirements--> <!--Utilised the prompt in gen AI : Generate essential requirements for Data Analyst-->
                    <li>Bachelor’s degree in Data Science, Statistics, Mathematics, Computer Science, or a related field.</li>
                    <li>Minimum of 2 years of professional experience in a data analysis role.</li>
                    <li>Strong proficiency in data analysis tools and programming languages (e.g., Excel, SQL, Python, R).</li>
                    <li>Experience with data visualization tools (e.g., Tableau, Power BI, or similar platforms).</li>
                    <li>Solid understanding of statistical methods and techniques for data analysis.</li>
                    <li>Ability to interpret and communicate complex data insights to non-technical stakeholders.</li>
                    <li>Strong attention to detail and excellent problem-solving skills.</li>
                    <li>Familiarity with databases and data management concepts.</li>
                </ol>
            </section>
            <aside id="preferrableDAN92"> <!--Aside element for preferrable qualifiations for the data analyst-->
                <h2>Preferrable</h2>
                <ul style="list-style-type: square;"> <!--unoredered list with box square dots instead of circle--> <!--Utilised the prompt in gen AI : Generate preferred requirements for a Data analyst-->
                    <li>Master’s degree in Data Science, Statistics, Mathematics, or a related field.</li>
                    <li>4+ years of experience in data analysis or business intelligence.</li>
                    <li>Experience with big data technologies (e.g., Hadoop, Spark).</li>
                    <li>Familiarity with machine learning algorithms and predictive analytics.</li>
                    <li>Proficiency in advanced statistical techniques (e.g., regression analysis, time-series forecasting).</li>
                    <li>Knowledge of cloud-based data storage solutions (e.g., AWS, Google BigQuery).</li>
                    <li>Experience with programming languages for data manipulation (e.g., Pandas, NumPy).</li>
                </ul>
            </aside>
            <!--Utilised the prompt in gen AI : Generate candidate description for a Data Analyst-->
            <p id ="candidate_descriptionDAN92">The successful candidate will be an analytical thinker with a passion for data and a strong drive to deliver actionable insights. We are looking for a team player who can navigate complex data challenges and provide meaningful recommendations to enhance business performance.</p>
            <p class="apply_button">
                <a href="apply.html" class="apply-button">Apply Now</a> <!--apply button that links to apply page-->
            </p>
        </div>
    </main>
    <?php include 'footer.inc'; ?>
</body>