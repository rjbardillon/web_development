<?php 
    session_start();
    $page = "index";
    include_once 'header.php';
    if (isset($_SESSION['username'])) {
        header("location: home.php");
        exit();
    }
?>
    <div class="container index">
      <div class="basic-information">
        <h1>Carmona, Cavite</h1>
        <h5>Region:</h5>
        <p>Region IV-A (Calabarzon)</p>
        <h5>Province:</h5>
        <p>Cavite</p>
        <h5>Municipal:</h5>
        <p>Carmona</p>
        <h5>Region Code:</h5>
        <p>04</p>
        <h5>Province Code</h5>
        <p>21</p>
        <h5>Municipal Code</h5>
        <p>04</p>
      </div>
      <div class="about-carmona">
        <h1>Carmona Profile</h1>
        <br>
        <p>The Municipality of Carmona is strategically located near the South Luzon 
          Expressway and serves as the gateway of Cavite, thus, paving way for it to 
          be coined as Cavite's "Center for Investment and Sports". The LGU also continues
           to provide services reflecting its vision to be an ecologically-balanced and
            disaster-resilient community where citizens are empowered. Among these 
            multi-awarded services are the Business-One-Stop-Shop, solid waste management
             practices, disaster preparedness, persons with disabilities empowerment, 
             and health services.</p>
        <br>
        <p><b>Land Area: </b>3,092 hectares</p>
        <p><b>Population: </b>97,557 (as of 2015)</p>
        <p><b>Component barangays: </b>Poblacion 1-8, Maduya, Cabilang Baybay, Mabuhay, Milagrosa, Lantic, Bancal</p>
        <p><b>Number of households: </b>24,427 (as of 2015)</p>
        <p><b>Distance from Manila: </b>34 kilometers</p>
        <p><b>Literacy rate: </b>97.87%</p>
        <p><b>Employment rate: </b>94.99%</p>
        <p><b>Number of workforce: </b>39,358</p>
        <p><b>Registered business establishments: </b>2,336 (1,844 commercial and 492 industrial)</p>
      </div>
      
    </div>
<?php include('footer.php'); ?>
  