<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Introduction to basic HTML elements">
    <meta name="keywords" content="HTML, Doctype, Head, Body, Meta, Paragraph, Headings, Strong, Emphasis">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Our Team | Anonymous</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php include 'header.inc'; ?>
    <main>
        <!-- bannerSection with Background Image -->
        <section class="banner">
            <div class="hero-content">
                <h1>About us?</h1>
                <h2>Your Success is our Mission.</h2>
            </div>
        </section>

        <!-- Team Info Section -->
        <section class="team-info">
            <p>
                At Team Anonymous, we specialize in crafting tailored web solutions that empower businesses to stand out in the digital landscape. Based in Melbourne, we pride ourselves on our ability to combine innovative design, cutting-edge technology, and strategic thinking to deliver websites that don’t just look great but drive results. With a team of passionate professionals, we collaborate closely with our clients to turn their visions into reality, ensuring every project is as unique as the people behind it. At Team Anonymous, your success is our mission.
            </p>

            <!-- Team Details -->
            <dl class="team-details">
                <dt>Group Name:</dt>
                <dd>Anonymous</dd>
                
                <dt>Group ID:</dt>
                <dd>ANON-2025</dd>
                
                <dt>Tutor's Name:</dt>
                <dd>Rahul R</dd>
            </dl>

            <!-- Meet the Team Section -->
            <h2>Meet The Team!</h2>
            <figure class="team-photo">
                <img src="images/team.jpg" alt="Anonymous Team Members">
            </figure>

            <!-- Team Members -->
            <div class="team-members">
                <div class="member">
                    <img src="images/sean.jpg" alt="Sean Makoka">
                    <h3>Sean Makoka</h3>
                    <p>HTML programmer</p>
                    <p>Worked on the Home Page</p>
                    <p>Worked on improvements to reusable elements</p>
                </div>
                <div class="member">
                    <img src="images/mustafa.jpg" alt="Mustafa">
                    <h3>Mustafa</h3>
                    <p>HTML programmer</p>
                    <p>Worked on the Jobs Page worked</p>
                    <p>Worked on  manager login page</p>
                </div>
                <div class="member">
                    <img src="images/yamen.jpg" alt="Yamen Sayes">
                    <h3>Yamen Sayes</h3>
                    <p>HTML programmer</p>
                    <p>Worked on the Apply Page</p>
                    <p>Worked on Job Description page</p>

                </div>
                <div class="member">
                    <img src="images/mohammed.jpg" alt="Mohammed">
                    <h3>Mohammed</h3>
                    <p>HTML programmer</p>
                    <p>Worked on the About Page</p>
                    <p>Worked on eoi table</p>

                </div>
            </div>

            <!-- Communication Schedule -->
            <table class="timetable">
                <caption>Communication Schedule</caption>
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Availability</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Monday to Friday</td>
                        <td class="discord">Discord Available: 2:00 PM - 6:00 PM</td>
                    </tr>
                    <tr>
                        <td>Thursday (Meeting)</td>
                        <td class="team-meeting">Team Meeting: 10:30 AM</td>
                    </tr>
                </tbody>
            </table>

            <!-- Email Link -->
        </section>
        <p class="contact-email">
            <a href="mailto:anonymous@swin.edu.au" class="cta-button">Contact Us</a>
        </p>
    </main>
    <?php include 'footer.inc'; ?>

</body>
</html>