
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SHY</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="assets2/css/cutekut.css">
  <link rel="stylesheet" href="assets2/css/about.css">
  <link rel="stylesheet" href="assets2/css/shy.css">
  <link href="assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets2/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets2/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets2/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets2/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
  <link href="assets2/vendor/aos/aos.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Permanent+Marker&family=Ultra&display=swap" rel="stylesheet">
<body>
          <audio id="backgroundMusic" controls>
        Your browser does not support the audio tag.
    </audio>

    <button id="musicControlButton" onclick="toggleMusic()">Toggle Music</button>

 <script>
    const backgroundMusic = document.getElementById("backgroundMusic");
    const musicControlButton = document.getElementById("musicControlButton");

    const musicList = [
        "../Admin/assets/audio/audio1.mp3",
        "../Admin/assets/audio/audio2.mp3",
        "../Admin/assets/audio/audio3.mp3"
    ];

    function toggleMusic() {
        if (backgroundMusic.paused) {
            playRandomMusic();
        } else {
            backgroundMusic.pause();
        }
    }

    function playRandomMusic() {
        const randomIndex = Math.floor(Math.random() * musicList.length);

        backgroundMusic.src = musicList[randomIndex];
        
        backgroundMusic.volume = 0.3;
        
        backgroundMusic.play();

        setInterval(() => {
            const newIndex = Math.floor(Math.random() * musicList.length);
            backgroundMusic.src = musicList[newIndex];
            
            backgroundMusic.volume = 0.5;
            
            backgroundMusic.play();
        }, 20000);
    }

    window.onload = function () {
        playRandomMusic();
        toggleMusic();
    };
    backgroundMusic.style.display = "none";
    musicControlButton.style.display = "none";
</script>

<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
        <div class="header-container d-flex align-items-center justify-content-between">
            <div class="logo" data-aos="fade-in"  style="margin-left: 0px;">
                <h1 class="text-light"><a data-aos="fade-right" href="index.php"><span>SH</span></a></h1>
            </div>

            <nav id="navbar" data-aos="fade-in"  class="navbar">
                <ul>
                <li><a class="nav-link scrollto active" href="#aboutmecute">About Me</a></li>
                  <li><a class="nav-link scrollto" href="#experiences">Resume</a></li>
                    <li class="dropdown"><a href="#cutedayang"><span>Work</span> </i></a>
                         <li>
                        <a class="signup scrollto" href="#contact"><span>Get in Touch</span></a>
                    </li>
                    </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </div>
</header>

<?php
include 'includes/conn.php';

$sql = "SELECT * FROM intro";
$stmt = $Conn->prepare($sql);
$stmt->execute();
$intro = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<section id="about" class="about">
  <div class="container">
    <div class="portfolio">
      <main> 
        <section class="page photographer">
          <div  class="details">
            <h1 data-aos="fade-right" >HELLO, </h1>
            <h2 data-aos="fade-right" >IM <ndsp> <?php echo isset($intro['name']) ? $intro['name'] : ''; ?></h2>
            <p data-aos="fade-up" ><?php echo isset($intro['description']) ? $intro['description'] : ''; ?></p>
            <a data-aos="fade-up"  class="get"  href=""><span >hire me in</span></a>
          
          </div>
          
          <div class="left-d" data-aos="fade-left" >
            <a class="get2" href=""><span><?php echo isset($intro['dob']) ? $intro['dob'] : ''; ?></span></a>
          </div>
          <div class="top-d" data-aos="fade-left" >
            <a class="get2" href=""><span><?php echo isset($intro['role']) ? $intro['role'] : ''; ?></span></a>
          </div>
        <section id="cute" class="cute" data-aos="fade-in">
          <div class="cute-card" id="cuteCard" >

          <div class="hero">
          <?php if (!empty($intro['image'])): ?>
              <img style="position: absolute; top: -2px; right: -50px;" class="model-right" src="admin/<?php echo $intro['image']; ?>" alt="model" />
          <?php endif; ?>   
       </div>
        </div>  
          <div class="right-d" data-aos="fade-right">
            <a class="get2" href=""><span><?php echo isset($intro['dialect']) ? $intro['dialect'] : ''; ?></span></a>
          </div>
          <div class="down-d" data-aos="fade-right">
          <a class="get3" href=""><span><?php echo isset($intro['role']) ? $intro['role'] : ''; ?></span></a>
          </div>
        </section>
        </aside>
      </main>
    </div>
  </div>
</section>

<script>
const cuteCard = document.getElementById('cuteCard');

cuteCard.addEventListener('mouseenter', () => {
  cuteCard.addEventListener('mousemove', moveCard);
});

cuteCard.addEventListener('mouseleave', () => {
  cuteCard.removeEventListener('mousemove', moveCard);
  cuteCard.style.transform = `translateX(-50%) scale(1)`;
});

function moveCard(event) {
  const boundingRect = cuteCard.getBoundingClientRect();
  const cardCenterX = boundingRect.left + boundingRect.width / 2;
  const cardCenterY = boundingRect.top + boundingRect.height / 2;
  const moveAmount = 20; // number para adjustment ng amount ng  move

  if (event.clientY < cardCenterY) {
    cuteCard.style.transform = `translateX(calc(-10% + ${moveAmount}px)) scale(1.1)`;
  } else if (event.clientY > cardCenterY) {
    cuteCard.style.transform = `translateX(calc(-65% - ${moveAmount}px)) scale(1.1)`;
  } else {
    cuteCard.style.transform = `translateX(-50%) scale(1.1)`;
  }
}

  </script>
      <section id="blackspace" class="blackspace">
        <div class="container">

          <div class="row counters">

            <div class="col-lg-2 col-2 text-center">
              <p></p>
            </div>
          </div>
        </div>
      </section>

  <section id="aboutmecute">
    <div class="margin-up">
      <div class="person">
        <div class="container cutekut">
          <div class="container-inner">
            <img class="circle" data-aos="zoom-out-down" src="assets2/img/darksky.jpg" />
            <!-- <img class="image img2"  src="assets2/img/cute.png" /> -->
            <?php if (!empty($intro['image'])): ?>
              <img  class="image img2"   src="admin/<?php echo $intro['image']; ?>" alt="model" />
            <?php endif; ?>   
          </div>
        </div>
      </div>
    </div>
    
    <div class="divider" data-aos="zoom-out-down"></div>
    <div class="name" data-aos="zoom-out-down">ABOUT ME</div>
    <div class="title" data-aos="zoom-out-down">as a Creative Designer</div>
    </section>

    <section id="education2" class="education2">
    <h2 data-aos="fade-right">education</h2>
    <ul class="achievement-list" data-aos="fade-right">
        <?php
        $sql = "SELECT * FROM education";
        $stmt = $Conn->query($sql);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <li>
                <div class="star-shape"></div>
                <span class="year"><?php echo $row['year_range']; ?></span>
                <div class="info">
                    <span class="title"><?php echo $row['institution']; ?></span><br>
                    <span class="description"><?php echo $row['description']; ?></span>
                </div>
            </li>
        <?php } ?>
    </ul>

    <style>
      .technical-skills {

    top: -320px;
  }
    </style>
  <div class="technical-skills" data-aos="fade-left">
    <h2>Technical Skills</h2>
    <div class="skills-container">
        <div class="software-skills">
            <h3>Software Skills</h3>
            <div class="ai-container">
                <?php
                // Fetch software skills from the database
                $sql = "SELECT * FROM technical WHERE category = 'Software Skills'";
                $stmt = $Conn->query($sql);

                // Loop through each software skill and display it
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<a class="petchang" href=""><span>' . $row['skill_name'] . '</span></a>';
                }
                ?>
            </div>
            <div class="tech-container">
            <style>
              .petchang {
                  margin: 6px; 
              }
          </style>

          <?php
          // Fetch additional categories from the database
          $sql_additional_categories = "SELECT * FROM technical WHERE category = 'tech skills'";
          $stmt_additional_categories = $Conn->query($sql_additional_categories);

          // Loop through each additional category and display it
          while ($row_additional = $stmt_additional_categories->fetch(PDO::FETCH_ASSOC)) {
              echo '<a class="tech" href=""><span>' . $row_additional['skill_name'] . '</span></a>';
          }
          ?>
      </div>
            </div>


            <div class="coding-skills">
    <h3>Coding Skills</h3>
    <h6>Basic knowledge of:</h6>
    <div class="row">
    <div class="col-sm-6">
        <ul>
            <?php
            // Fetch coding skills from the database
            $sql = "SELECT * FROM technical WHERE category = 'Coding Skills'";
            $stmt = $Conn->query($sql);

            // Counter to keep track of skills displayed in or out the current columm
            $counter = 0;

            // Loop through each coding skill and display it in short looping
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<li>' . $row['skill_name'] . '</li>';
                $counter++;

                // If four skills are displayed, close the <ul> and start a new column eme
                if ($counter == 4) {
                    echo '</ul></div><div class="col-sm-6"><ul>';
                    $counter = 0; // Reset the counter
                }
            }
            ?>
        </ul>
   
        </div>
    </div>
</div>

              </div>
          </div>
      </div>
      </div>
    </div>
  </section>

  <section id="experiences" class="experiences">
    <div class="experience-card">
        <div class="card-content" data-aos="fade-in">
            <h2>Experiences</h2>
            <ul class="achievement-experience-list">
                <?php
                // Fetch experiences from the database
                $sql = "SELECT * FROM resume WHERE category = 'Experiences'";
                $stmt = $Conn->query($sql);

                // Loop through each experience and display it
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<li>';
                    echo '<div class="Estar-shape"></div>';
                    echo '<span class="year">' . $row['year_range'] . '</span>';
                    echo '<div class="info">';
                    echo '<span class="title">' . $row['institution'] . '</span><br>';
                    echo '<span class="description">' . $row['description'] . '</span>';
                    echo '</div>';
                    echo '</li>';
                }
                ?>
            </ul>
            <div class="hashtag-container">
                <?php
                // Fetch hashtags from the database
                $sql = "SELECT * FROM resume WHERE category = 'Hashtags'";
                $stmt = $Conn->query($sql);

                // Loop through each hashtag and display it
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<a class="hashtag" href=""><span>' . $row['hashtags'] . '</span></a>';
                }
                ?>
            </div>
        </div>
    </div>
</section>

<section id="activities" class="activities">
    <div class="activities-content" data-aos="fade-right">
        <h2>Activities</h2>
        <ul class="activities_achievement-list">
            <?php
            // Fetch activities from the database
            $sql = "SELECT * FROM resume WHERE category = 'Activities'";
            $stmt = $Conn->query($sql);

            // Loop through each activity and display it
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<li>';
                echo '<div class="star-shape"></div>';
                echo '<span class="year">' . $row['year_range'] . '</span>';
                echo '<div class="info">';
                echo '<span class="title">' . $row['institution'] . '</span><br>';
                echo '<span class="description">' . $row['description'] . '</span>';
                echo '</div>';
                echo '</li>';
            }
            ?>
        </ul>
    </div>
<!-- Languages Skills Section -->
<div class="languages-skills">
    <h2>LANGUAGES</h2>
    <div class="skills-languages">
        <div class="languages-list">
            <h3>LANGUAGES</h3>
            <div class="languages-container">
                <?php
                // Fetch languages from the database
                $sql_languages = "SELECT * FROM resume WHERE category = 'Languages'";
                $stmt_languages = $Conn->query($sql_languages);

                // Loop through each language and display it
                while ($row_languages = $stmt_languages->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="language">';
                    echo '<div class=" ">';
                    echo '<h1>' . $row_languages['dialect'] . '</h1>';
                    echo '<p>' . $row_languages['fluency'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<style>
    .card{
      position: relative;
      left: 120%;
    }
    .carousel-indicators {
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;
    top: 500px;
    z-index: 2;
    display: flex;
    justify-content: center;
    padding: 0;
    margin-right: 15%;
    margin-bottom: 1rem;
    margin-left: 15%;
}
.hobbies-skills{
  margin-top: 60px;
}
  </style>
<!-- Hobbies Skills Section -->
<div class="hobbies-skills" data-aos="fade-left">
    <h2>HOBBIES</h2>
    <div class="skills-hobbies">
        <div class="hobbies-list">
            <h3>Hobbies</h3>
            <div class="hobbies-container">
                <?php
                // Fetch hobbies from the database
                $sql_hobbies = "SELECT * FROM resume WHERE category = 'Hobbies'";
                $stmt_hobbies = $Conn->query($sql_hobbies);

                // Loop through each hobby and display it
                while ($row_hobbies = $stmt_hobbies->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="hobbies">';
                    echo '<div class="">';
                    echo '<h1>' . $row_hobbies['hobbies'] . '</h1>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="cv-1">
    <?php
    $sql = "SELECT cv_file FROM cv LIMIT 1";
    $stmt = $Conn->query($sql);
    
    if ($stmt !== false && $stmt->rowCount() > 0) {
        $cv_row = $stmt->fetch(PDO::FETCH_ASSOC);
        $cv_file_name = $cv_row['cv_file'];
        echo '<a data-aos="fade-up" class="cv" href="./admin/' . $cv_file_name . '">DOWNLOAD MY CV</a>';
    } else {
        echo 'No CV available';
    }
    ?>
</div>

</div>
<style>
  .cv-1 .cv{
    background: #544d43;
  padding: 12px 20px; /* Padding */
  margin: 0px auto !important;
  font-family: "Libre Baskerville", serif;
  font-weight: 400;
  font-style: italic;
  font-size: 15px;
  border-radius: 10px;
  color: #fff; 
  text-decoration: none;
  }
  .cv-1.cv:hover{
    background: #e18f23; 
  }
</style>

  </section>
  <!-- Carousel Section -->
<section id="cutedayang" class="cutedayang">
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <?php
            // Fetch project images from the database
            $sql = "SELECT * FROM project";
            $stmt = $Conn->query($sql);
            $projectImages = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Counter for carousel indicators
            $indicatorCounter = 0;

            // Loop through the project images and display carousel indicators
            foreach ($projectImages as $index => $image) {
                echo '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="' . $index . '"';
                echo ($index == 0) ? ' class="active" aria-current="true"' : '';
                echo ' aria-label="Slide ' . ($index + 1) . '"></button>';
            }
            ?>
        </div>
        <div class="carousel-inner">
            <?php
            // Loop through project images and display them in carousel items
            $totalImages = count($projectImages);
            $numItems = ceil($totalImages / 3); // Number of carousel items
            for ($i = 0; $i < $numItems; $i++) {
                echo '<div class="carousel-item';
                echo ($i == 0) ? ' active">' : '">';
                echo '<div class="card-grid">';
                // Display 3 cards per carousel item
                for ($j = $i * 3; $j < min($totalImages, ($i + 1) * 3); $j++) {
                    $image = $projectImages[$j];
                    $imagePath = "admin/" . $image['project_image'];
                    echo '<a class="card" data-aos="flip-left" href="#">';
                    echo '<div class="card__background" style="background-image: url(\'' . $imagePath . '\')"></div>';
                    echo '<div class="card__content">';
                    echo '<p class="card__category">' . $image['category'] . '</p>';
                    echo '<h3 class="card__heading">' . $image['description'] . '</h3>';
                    echo '</div></a>';
                }
                echo '</div></div>';
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
</main>



    
 <div class="shyme">
 <div class="shygal">
     <h1 data-aos="fade-down-right">Gallery</h1>
     <div class="gallery-shy" data-aos="zoom-in-up">
         <?php

         // Fetch gallery images from the database sheehsh zuragit a
         $sql = "SELECT * FROM gallery";
         $stmt = $Conn->query($sql);
         $galleryImages = $stmt->fetchAll(PDO::FETCH_ASSOC);

         // Looping yan 
         foreach ($galleryImages as $image) {
             // proper path makes eveythinig easygit
             $imagePath = "admin/" . $image['gallery_image'];
             echo '<div class="item" style="background-image: url(\'' . $imagePath . '\');"></div>';
         }
         ?>
     </div>
 </div>
</div>

<section id="contact">
  <div class="form-card1" data-aos="fade-right">
    <div class="form-card2">
      <form class="form" method="post" action="contact.php">
        <p class="form-heading">Get In Touch</p>
        <div class="form-field">
          <input required="" placeholder="Name" id="contact_name" name="contact_name" class="input-field" type="text" />
        </div>
        <div class="form-field">
          <input
            required=""
            placeholder="Email"
            class="input-field"
            type="email"
            id="contact_email"
            name="contact_email" 
          />
        </div>
        <div class="form-field">
          <input
            required=""
            placeholder="Subject"
            class="input-field"
            type="text"
            id="contact_subject"
            name="contact_subject"
          />
        </div>
        <div class="form-field">
          <textarea
            required=""
            placeholder="Message"
            cols="30"
            rows="3"
            class="input-field"
            id="contact_message"
            name="contact_message" 
          ></textarea>
        </div>
        <button class="sendMessage-btn" type="submit">Send Message</button>
      </form>
    </div>
  </div>
  
<?php
include 'includes/conn.php';

$sql = "SELECT * FROM intro";
$stmt = $Conn->prepare($sql);
$stmt->execute();
$intro = $stmt->fetch(PDO::FETCH_ASSOC);
?>
  <div class="green" data-aos="fade-in">
  <?php if (!empty($intro['image'])): ?>
              <img src="admin/<?php echo $intro['image']; ?>" alt="model" />
          <?php endif; ?>   
  </div>
</section>
  

<?php
include './includes/conn.php';

$sql = "SELECT * FROM social_links";
$stmt = $Conn->prepare($sql);
$stmt->execute();
$socialLinks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<footer id="footer">
    <div class="social-buttons" data-aos="fade-in">
        <?php foreach ($socialLinks as $socialLink) : ?>
            <a href="<?= $socialLink['link'] ?>" class="social-button <?= $socialLink['platform'] ?>">
                <?php if ($socialLink['platform'] === 'github') : ?>
                    <svg class="cf-icon-svg" xmlns="http://www.w3.org/2000/svg" viewBox="-2.5 0 19 19">
                        <path d="M9.464 17.178a4.506 4.506 0 0 1-2.013.317 4.29 4.29 0 0 1-2.007-.317.746.746 0 0 1-.277-.587c0-.22-.008-.798-.012-1.567-2.564.557-3.105-1.236-3.105-1.236a2.44 2.44 0 0 0-1.024-1.348c-.836-.572.063-.56.063-.56a1.937 1.937 0 0 1 1.412.95 1.962 1.962 0 0 0 2.682.765 1.971 1.971 0 0 1 .586-1.233c-2.046-.232-4.198-1.023-4.198-4.554a3.566 3.566 0 0 1 .948-2.474 3.313 3.313 0 0 1 .091-2.438s.773-.248 2.534.945a8.727 8.727 0 0 1 4.615 0c1.76-1.193 2.532-.945 2.532-.945a3.31 3.31 0 0 1 .092 2.438 3.562 3.562 0 0 1 .947 2.474c0 3.54-2.155 4.32-4.208 4.548a2.195 2.195 0 0 1 .625 1.706c0 1.232-.011 2.227-.011 2.529a.694.694 0 0 1-.272.587z"></path>
                    </svg>
                <?php elseif ($socialLink['platform'] === 'linkedin') : ?>
                  <svg viewBox="0 -2 44 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Icons" stroke="none" stroke-width="1">
                <g transform="translate(-702.000000, -265.000000)">
                    <path d="M746,305 L736.2754,305 L736.2754,290.9384 C736.2754,287.257796 734.754233,284.74515 731.409219,284.74515 C728.850659,284.74515 727.427799,286.440738 726.765522,288.074854 C726.517168,288.661395 726.555974,289.478453 726.555974,290.295511 L726.555974,305 L716.921919,305 C716.921919,305 717.046096,280.091247 716.921919,277.827047 L726.555974,277.827047 L726.555974,282.091631 C727.125118,280.226996 730.203669,277.565794 735.116416,277.565794 C741.21143,277.565794 746,281.474355 746,289.890824 L746,305 L746,305 Z M707.17921,274.428187 L707.117121,274.428187 C704.0127,274.428187 702,272.350964 702,269.717936 C702,267.033681 704.072201,265 707.238711,265 C710.402634,265 712.348071,267.028559 712.41016,269.710252 C712.41016,272.34328 710.402634,274.428187 707.17921,274.428187 L707.17921,274.428187 L707.17921,274.428187 Z M703.109831,277.827047 L711.685795,277.827047 L711.685795,305 L703.109831,305 L703.109831,277.827047 L703.109831,277.827047 Z" id="LinkedIn">
            </path>
                </g>
            </g>
        </svg>
                <?php elseif ($socialLink['platform'] === 'facebook') : ?>
                  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 310 310" xml:space="preserve">
    <g id="XMLID_834_">
      <path id="XMLID_835_" d="M81.703,165.106h33.981V305c0,2.762,2.238,5,5,5h57.616c2.762,0,5-2.238,5-5V165.765h39.064
        c2.54,0,4.677-1.906,4.967-4.429l5.933-51.502c0.163-1.417-0.286-2.836-1.234-3.899c-0.949-1.064-2.307-1.673-3.732-1.673h-44.996
        V71.978c0-9.732,5.24-14.667,15.576-14.667c1.473,0,29.42,0,29.42,0c2.762,0,5-2.239,5-5V5.037c0-2.762-2.238-5-5-5h-40.545
        C187.467,0.023,186.832,0,185.896,0c-7.035,0-31.488,1.381-50.804,19.151c-21.402,19.692-18.427,43.27-17.716,47.358v37.752H81.703
        c-2.762,0-5,2.238-5,5v50.844C76.703,162.867,78.941,165.106,81.703,165.106z"></path>
    </g>
    </svg>
                <?php elseif ($socialLink['platform'] === 'instagram') : ?>
                  <svg width="800px" height="800px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g id="Page-1" stroke="none" stroke-width="1">
            <g id="Dribbble-Light-Preview" transform="translate(-340.000000, -7439.000000)">
                <g id="icons" transform="translate(56.000000, 160.000000)">
                    <path d="M289.869652,7279.12273 C288.241769,7279.19618 286.830805,7279.5942 285.691486,7280.72871 C284.548187,7281.86918 284.155147,7283.28558 284.081514,7284.89653 C284.035742,7285.90201 283.768077,7293.49818 284.544207,7295.49028 C285.067597,7296.83422 286.098457,7297.86749 287.454694,7298.39256 C288.087538,7298.63872 288.809936,7298.80547 289.869652,7298.85411 C298.730467,7299.25511 302.015089,7299.03674 303.400182,7295.49028 C303.645956,7294.859 303.815113,7294.1374 303.86188,7293.08031 C304.26686,7284.19677 303.796207,7282.27117 302.251908,7280.72871 C301.027016,7279.50685 299.5862,7278.67508 289.869652,7279.12273 M289.951245,7297.06748 C288.981083,7297.0238 288.454707,7296.86201 288.103459,7296.72603 C287.219865,7296.3826 286.556174,7295.72155 286.214876,7294.84312 C285.623823,7293.32944 285.819846,7286.14023 285.872583,7284.97693 C285.924325,7283.83745 286.155174,7282.79624 286.959165,7281.99226 C287.954203,7280.99968 289.239792,7280.51332 297.993144,7280.90837 C299.135448,7280.95998 300.179243,7281.19026 300.985224,7281.99226 C301.980262,7282.98483 302.473801,7284.28014 302.071806,7292.99991 C302.028024,7293.96767 301.865833,7294.49274 301.729513,7294.84312 C300.829003,7297.15085 298.757333,7297.47145 289.951245,7297.06748 M298.089663,7283.68956 C298.089663,7284.34665 298.623998,7284.88065 299.283709,7284.88065 C299.943419,7284.88065 300.47875,7284.34665 300.47875,7283.68956 C300.47875,7283.03248 299.943419,7282.49847 299.283709,7282.49847 C298.623998,7282.49847 298.089663,7283.03248 298.089663,7283.68956 M288.862673,7288.98792 C288.862673,7291.80286 291.150266,7294.08479 293.972194,7294.08479 C296.794123,7294.08479 299.081716,7291.80286 299.081716,7288.98792 C299.081716,7286.17298 296.794123,7283.89205 293.972194,7283.89205 C291.150266,7283.89205 288.862673,7286.17298 288.862673,7288.98792 M290.655732,7288.98792 C290.655732,7287.16159 292.140329,7285.67967 293.972194,7285.67967 C295.80406,7285.67967 297.288657,7287.16159 297.288657,7288.98792 C297.288657,7290.81525 295.80406,7292.29716 293.972194,7292.29716 C292.140329,7292.29716 290.655732,7290.81525 290.655732,7288.98792" id="instagram-[#167]">
    
    </path>
                </g>
            </g>
        </g>
    </svg>


    
    <?php elseif ($socialLink['github'] === 'github') : ?>
      <svg class="cf-icon-svg" xmlns="http://www.w3.org/2000/svg" viewBox="-2.5 0 19 19"><path d="M9.464 17.178a4.506 4.506 0 0 1-2.013.317 4.29 4.29 0 0 1-2.007-.317.746.746 0 0 1-.277-.587c0-.22-.008-.798-.012-1.567-2.564.557-3.105-1.236-3.105-1.236a2.44 2.44 0 0 0-1.024-1.348c-.836-.572.063-.56.063-.56a1.937 1.937 0 0 1 1.412.95 1.962 1.962 0 0 0 2.682.765 1.971 1.971 0 0 1 .586-1.233c-2.046-.232-4.198-1.023-4.198-4.554a3.566 3.566 0 0 1 .948-2.474 3.313 3.313 0 0 1 .091-2.438s.773-.248 2.534.945a8.727 8.727 0 0 1 4.615 0c1.76-1.193 2.532-.945 2.532-.945a3.31 3.31 0 0 1 .092 2.438 3.562 3.562 0 0 1 .947 2.474c0 3.54-2.155 4.32-4.208 4.548a2.195 2.195 0 0 1 .625 1.706c0 1.232-.011 2.227-.011 2.529a.694.694 0 0 1-.272.587z"></path></svg>
          </a>
          <a href="#" class="social-button linkedin">
            <svg viewBox="0 -2 44 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Icons" stroke="none" stroke-width="1">
                <g transform="translate(-702.000000, -265.000000)">
                    <path d="M746,305 L736.2754,305 L736.2754,290.9384 C736.2754,287.257796 734.754233,284.74515 731.409219,284.74515 C728.850659,284.74515 727.427799,286.440738 726.765522,288.074854 C726.517168,288.661395 726.555974,289.478453 726.555974,290.295511 L726.555974,305 L716.921919,305 C716.921919,305 717.046096,280.091247 716.921919,277.827047 L726.555974,277.827047 L726.555974,282.091631 C727.125118,280.226996 730.203669,277.565794 735.116416,277.565794 C741.21143,277.565794 746,281.474355 746,289.890824 L746,305 L746,305 Z M707.17921,274.428187 L707.117121,274.428187 C704.0127,274.428187 702,272.350964 702,269.717936 C702,267.033681 704.072201,265 707.238711,265 C710.402634,265 712.348071,267.028559 712.41016,269.710252 C712.41016,272.34328 710.402634,274.428187 707.17921,274.428187 L707.17921,274.428187 L707.17921,274.428187 Z M703.109831,277.827047 L711.685795,277.827047 L711.685795,305 L703.109831,305 L703.109831,277.827047 L703.109831,277.827047 Z" id="LinkedIn">
            </path>
                </g>
            </g>
        </svg>   
         <?php endif; ?>
            </a>
        <?php endforeach; ?>
    </div>
</footer>

<style>
.shyme{
  background-color: #F6EEE1;
    height: 120vh;
    position: relative;
}
.shygal{
  padding: 75px ;
  margin: 0 auto;
  width: 1140px;
  
}

.shygal h1{
  position: relative;
  margin-bottom: 45px;
  /* font-family: 'Oswald', sans-serif;
  font-size: 44px; */
  font-size: 80px!important; 
  font-family: "Permanent Marker", cursive;
  font-weight: 400;
  font-style: normal;
  text-transform: uppercase;
  color: #424242;
}

.gallery-shy {
  display: flex;
  flex-direction: row;
  width: 100%;
  height: 70vh;
}

.item {
  flex: 1;
  height: 100%;
  background-position: center;
  background-size: cover;
  background-repeat: none;
  transition: flex 0.8s ease;
  
  &:hover{
    flex: 7;
  }
}


.social{
  position: absolute;
  right: 35px;
  bottom: 0;
  
  img{
    display: block;
    width: 32px;
  }
}
   </style>
<style>
  #contact{
    /* background-color: #F6EEE1; */
    background-color: #334B35;
    height: 120vh;

  }
  .imgcontact:hover{
    padding: 40px;
    transition: 0.4s ease-in-out
  }
  .green img{
    float: right;
    top: -400px;
    right: 100px;
    position: relative;
    width: 500px;
    height: 500px;
  }
  .form {
    font-family: "Libre Baskerville", serif;
  display: flex;
  flex-direction: column;
  align-self: center;
  gap: 10px;
  padding-inline: 2em;
  padding-bottom: 0.4em;
  background-color: #e18f23;
  /* background: #e18f23;  */
/* background-color: #0a192f; */
  border-radius: 20px;
  width: 50%;
  top: 100px;
  right: -200px;
  position: relative;
}

.form-heading {
  text-align: center;
  margin: 2em;
  color: #000000;
  background-color: #334B35;
  font-size: 1.5em;
  background-color: transparent;
  align-self: center;
  font-weight: bolder;
  font-family: "Libre Baskerville", serif;  
}

.form-field {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.5em;
  border-radius: 10px;
  padding: 0.6em;
  border: none;
  outline: none;
  color: white;
  background-color: #334B35;
  box-shadow: inset 2px 5px 10px rgb(5, 5, 5);
}

.input-field {
  background: none;
  border: none;
  outline: none;
  width: 100%;
  color: #ccd6f6;
  padding-inline: 1em;
}

.sendMessage-btn {
  cursor: pointer;
  margin-bottom: 3em;
  padding: 1em;
  border-radius: 10px;
  border: none;
  outline: none;
  background-color: transparent;
  color:  #010100;
  font-weight: bold;
  outline: 1px solid  #334B35;
  transition: all ease-in-out 0.3s;
}

.sendMessage-btn:hover {
  transition: all ease-in-out 0.3s;
  background-color: #334B35;
  color: #ffffff;
  cursor: pointer;
  box-shadow: inset 2px 5px 10px rgb(5, 5, 5);
}

.form-card1 {
  /* background-image: linear-gradient(163deg, #64ffda 0%, #64ffda 100%); */
  border-radius: 22px;
  transition: all 0.3s;
}

/* .form-card1:hover {
  box-shadow: 0px 0px 30px 1px rgba(30, 169, 137, 0.3);
} */

.form-card2 {
  border-radius: 0;
  transition: all 0.2s;
}

.form-card2:hover {
  transform: scale(0.98);
  border-radius: 20px;
}
</style>
 
<style>
  #footer{
    background-color: #F6EEE1;
    /* background-color: #334B35; */
    height: 20vh;
  }
  .social-buttons {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 15px 10px;
  border-radius: 5em;

}

.social-button {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 60px;
  position: relative;
  height: 60px;
  margin: 30px!important;
  border-radius: 50%;
  margin: 0 10px;
  background-color: #fff;
  box-shadow: 0px 0px 4px #00000027;
  transition: 0.3s;
}

.social-button:hover {
  background-color: #f2f2f2;
  box-shadow: 0px 0px 6px 3px #00000027;
}

.social-buttons svg {
  transition: 0.3s;
  height: 20px;
}

.facebook {
  background-color: #3b5998;
}

.facebook svg {
  fill: #f2f2f2;
}

.facebook:hover svg {
  fill: #3b5998;
}

.github {
  background-color: #333;
}

.github svg {
  width: 25px;
  height: 25px;
  fill: #f2f2f2;
}

.github:hover svg {
  fill: #333;
}

.linkedin {
  background-color: #0077b5;
}

.linkedin svg {
  fill: #f2f2f2;
}

.linkedin:hover svg {
  fill: #0077b5;
}

.instagram {
  background-color: #c13584;
}

.instagram svg {
  fill: #f2f2f2;
}

.instagram:hover svg {
  fill: #c13584;
}

</style>

<script>
// Function to position the experience card
function positionExperienceCard() {
    // Get the viewport dimensions
    var viewportWidth = window.innerWidth || document.documentElement.clientWidth;
    var viewportHeight = window.innerHeight || document.documentElement.clientHeight;

    // Get a reference to the experience card
    var experienceCard = document.querySelector('.experience-card');

    // Calculate the left position to center the card horizontally
    var leftPosition = (viewportWidth - experienceCard.offsetWidth) / 2;


    experienceCard.style.top = '215%'; // Adjust as needed
    experienceCard.style.left = '25.5%'; // Adjust left position here


}

window.addEventListener('resize', positionExperienceCard);
window.addEventListener('load', positionExperienceCard);

</script>
<style>
  .back-to-top {
    background-color: orange;
  }
</style>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="assets2/js/about.js"></script>
  <script src="assets2/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets2/vendor/aos/aos.js"></script>
  <script src="assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets2/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets2/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets2/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets2/vendor/php-email-form/validate.js"></script>   
  <script src="assets2/js/main.js"></script>

</body>
<script>
  AOS.init();
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</html>

<style>
  .cutekut {
position: relative;
text-align: center;
}

.card-cute{
background-color: #f2f2f2;
padding: 20px;
border-radius: 10px; 
box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
width: 100%; 
text-align: left; 
position: absolute;
bottom: 0;
left: 20%!important;
transform: translateX(-50%); 
}
p{
font-size: 2rem;
}
.container-inner .name .title{
margin-bottom: 20px;

}

#aboutmecute {
align-items: center;
display: flex;
font-family: "Merriweather", serif;
flex-wrap: wrap;
justify-content: center;
/* /* margin-bottom: 100px;
margin-top: 100px; */
}
.person {
align-items: center;
display: flex;
flex-direction: column;
width: 280px;
margin-top: -450px;
}
.cutekut {
border-radius: 50%;
height: 312px;
-webkit-tap-highlight-color: transparent;
transform: scale(0.48);
transition: transform 250ms cubic-bezier(0.4, 0, 0.2, 1);
width: 500px;
}
/* .cutekut:after {
background-color: #67834a;
content: "";
height: 10px;
position: absolute;
top: 390px;
width: 100%;
} */
.cutekut:hover {
transform: scale(0.54);
}
.container-inner {
clip-path: path(
"M 390,400 C 390,504.9341 304.9341,590 200,590 95.065898,590 10,504.9341 10,400 V 10 H 200 390 Z"
);
position: relative;
transform-origin: 60%;
top: -58px;
}
.circle {
background-color: #fee7d3;
border-radius: 50%;
cursor: pointer;
height: 380px;
left: 10px;
pointer-events: none;
position: absolute;
top: 210px;
width: 580px;
}
.image {
pointer-events: none;
position: relative;
transform: translateY(20px) scale(1.15);
transform-origin: 50% bottom;
transition: transform 300ms cubic-bezier(0.4, 0, 0.2, 1);
}
.cutekut:hover .image {
transform: translateY(0) scale(1.2);
}

.image {
left: -46px;
top: 174px;
width: 444px;
}

.divider {
background-color: #ca6060;
padding: 1.5px;
height: 1px;
width: 160px;
margin-left: 40px;
color: #fff;
margin-top: -450px!important;

}
.name {
color: #ffffff;
font-size: 36px;
font-weight: 600;
margin-top: 16px;
text-align: center;
margin-top: -450px!important;
}
.title {
color: #ffffff;
font-family: arial;
font-size: 14px;
font-style: italic;
margin-top: 4px;
margin-top: -450px!important;
}
   </style>