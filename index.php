<?php
include 'config.php';

// cookie for visit tracking
if (!isset($_COOKIE['visits'])) {
  setcookie("visits", 1, time() + (30 * 24 * 60 * 60), "/");
} else {
  setcookie("visits", $_COOKIE['visits'] + 1, time() + (30 * 24 * 60 * 60), "/");
}

$sql = "SELECT * FROM projects";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portfolio</title>

  <link rel="stylesheet" href="style.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
  <nav id="desktop-nav">
    <div class="logo" id="my-name">MD. Ariful Alam Mahim</div>

    <div>
      <ul class="nav-links">
        <li><a href="#about">About</a></li>
        <li><a href="#experience">Experience</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#contact">Contacts</a></li>
        <button
          id="darkModeToggle"
          style="background: none; border: none; cursor: pointer">
          <i id="mode-icon" class="fas fa-sun"></i>
        </button>
      </ul>
    </div>
  </nav>

  <section id="profile">
    <div class="section__pic-container">
      <img
        src="./Assets/profile-pic.jpg"
        alt="MD. Ariful Alam profile picture" />
    </div>

    <div class="section__text">
      <p class="section__text__p1">Hello, I'm</p>
      <h1 class="title">Mahim</h1>
      <p class="section__text__p2">Frontend Developer</p>
      <div class="btn-container">
        <a href="./Assets/Resume.pdf" download="Resume.pdf" class="btn btn-color-2">
          Download CV
        </a>
        <button class="btn btn-color-1" onclick="location.href='./#contact'">
          Contact Info
        </button>
      </div>

      <div id="socials-container">
        <img
          src="./Assets/linkedin.png"
          alt="My LinkedIn profile"
          class="icon"
          onclick="location.href='https://www.linkedin.com/in/mahim21/'" />

        <img
          src="./Assets/github.png"
          alt="My Github profile"
          class="icon"
          onclick="location.href='https://github.com/Mahim021'" />
      </div>
    </div>
  </section>

  <section id="about">
    <p class="section__text__p1">Get to know more</p>
    <h1 class="title">About Me</h1>

    <div class="section-container">
      <div class="section__pic-container">
        <img src="Assets/about-pic.jpg" alt="Profile picture" class="about-pic" />
      </div>

      <div class="about-details-container">
        <div class="about-containers" style="display: flex; gap: 1rem;">
          <div class="details-container personal-info">
            <h3>Personal Info</h3>
            <ul class="info-list">
              <li><span class="label">Location:</span> Agargaon, Dhaka, Bangladesh</li>
              <li><span class="label">Email:</span> arifulalam7865@example.com</li>
              <li><span class="label">Phone:</span> +880 1746 734906</li>
            </ul>

            <h3>Education</h3>
            <ul class="info-list">
              <li><span class="label">SSC:</span> GPA 5.00 (2018)</li>
              <li><span class="label">HSC:</span> GPA 5.00 (2020)</li>
              <li><span class="label">B.Sc. in CSE:</span> KUET (2022–Present)</li>
            </ul>
          </div>


          <div class="right-boxes" style="display: flex; flex-direction: column; gap: 1rem; flex: 1;">
            <div class="details-container">
              <h3>Interests</h3>
              <p>
                Football, Guitar, Coding, Adventure
              </p>
            </div>

            <div class="details-container">
              <h3>Hobbies</h3>
              <p>
                Playing games, Reading books, Exploring new tech
              </p>
            </div>
          </div>
        </div>

        <div class="text-container">
          <p class="bio">
            I'm Mahim, a passionate Frontend Developer.
            I love turning ideas into clean, modern, and responsive web experiences.
            When I'm not coding, you'll find me strumming my guitar,
            exploring new tech, or breaking legs on the football field.
            Just focused on delivering quality results with every project.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section id="experience">
    <p class="section__text__p1">Explore My</p>
    <h1 class="title">Experience</h1>

    <div class="skills-container">
      <div class="skill-category">
        <h2>Frontend</h2>
        <ul>
          <li><i class="fa-solid fa-code"></i> HTML</li>
          <li><i class="fa-brands fa-css3-alt"></i> CSS</li>
          <li><i class="fa-brands fa-js"></i> JavaScript</li>
        </ul>
      </div>
      <div class="skill-category">
        <h2>Backend</h2>
        <ul>
          <li><i class="fa-solid fa-database"></i> PostgreSQL</li>
          <li><i class="fa-brands fa-node"></i> Node.js</li>
          <li><i class="fa-solid fa-server"></i> Express.js</li>
        </ul>
      </div>
      <div class="skill-category">
        <h2>Tools</h2>
        <ul>
          <li><i class="fa-brands fa-git-alt"></i> Git</li>
          <li><i class="fa-brands fa-github"></i> GitHub</li>
          <li><i class="fa-solid fa-layer-group"></i> Material UI</li>
        </ul>
      </div>
    </div>
  </section>

  <section id="projects">
    <p class="section__text__p1">Browse My Recent</p>
    <h1 class="title">Projects</h1>
    <div class="experience-details-container">
      <div class="about-containers">
        <!-- <div class="details-container color-container">
          <div class="article-container">
            <img
              src="./Assets/project-1.png"
              alt="Project 1"
              class="project-img" />
          </div>
          <h2 class="experience-sub-title project-title">Project One</h2>
          <div class="button-container">
            <button
              class="btn btn-color-2 project-btn"
              onclick="location.href='https://github.com/'">
              Github
            </button>
            <button
              class="btn btn-color-2 project-btn"
              onclick="location.href='https://github.com/'">
              Github
            </button>
          </div>
        </div> -->

        <?php
        $result = getProjects($conn);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
        ?>
            <div class='details-container color-container'>
              <div class='article-container'>
                <img src="<?= htmlspecialchars($row['project_image']) ?>"
                  alt="<?= htmlspecialchars($row['project_title']) ?>"
                  class="project-img" />
              </div>
              <h2 class='experience-sub-title project-title'><?= htmlspecialchars($row['project_title']) ?></h2>
              <div class='button-container'>
                <button class='btn btn-color-2 project-btn' onclick="location.href='<?= htmlspecialchars($row['Github']) ?>'">Github</button>
                <button class='btn btn-color-2 project-btn' onclick="location.href='<?= htmlspecialchars($row['LinkedIn']) ?>'">LinkedIn</button>
              </div>
            </div>
        <?php
          }
        } else {
          echo "<p>No projects found.</p>";
        }
        ?>

      </div>
    </div>
  </section>

  <section id="contact">
    <p class="section__text__p1">Get in Touch</p>
    <h1 class="title">Conatct Me</h1>

    <form action="./#contact" method="POST">
      <label for="name">Name</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Your Email</label>
      <input type="email" id="email" name="email" required>

      <label for="message">Message</label>
      <textarea id="message" name="message" required></textarea>

      <button type="submit">Send Message</button>
    </form>
  </section>

  <footer>
    <p>Copyright &#169; 2025 Md. Ariful Alam. All Rights Reserved.</p>
  </footer>
  <script src="script.js"></script>
</body>

</html>