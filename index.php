<?php
include_once("config.php");

?>

<!DOCTYPE html>
<html>
<title>Project Monitoring</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="tabel.css">
<style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Comic Sans MS", cursive, sans-serif;
    }

    .w3-row-padding img {
        margin-bottom: 12px
    }

    /* Set the width of the sidebar to 120px */
    .w3-sidebar {
        width: 120px;
        background: #222;
    }

    /* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
    #main {
        margin-left: 120px
    }

    /* Remove margins from "page content" on small screens */
    @media only screen and (max-width: 600px) {
        #main {
            margin-left: 0
        }
    }
</style>

<body class="w3-indigo">
    <!-- Icon Bar (Sidebar - hidden on small screens) -->
    <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center w3-light-grey">
        <!-- Menu -->
        <img src="image/polman.png" style="width:100%" class="w3-animate-fading w3-padding-large w3-padding-32">
        <a href="#" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
            <i class="fa fa-home w3-xxlarge"></i>
            <p>HOME</p>
        </a>
        <a href="#monitor" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
            <i class="fa fa-eye w3-xxlarge"></i>
            <p>STATUS</p>
        </a>
        <a href="#control" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
            <i class="fa fa-gear w3-xxlarge"></i>
            <p>CONTROL</p>
        </a>
        <a href="#logdata" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
            <i class="fa fa-history w3-xxlarge"></i>
            <p>RECORD</p>
        </a>
        <a href="#profile" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
            <i class="fa fa-user w3-xxlarge"></i>
            <p>ABOUT ME</p>
        </a>
    </nav>
    <!-- Navbar on small screens (Hidden on medium and large screens) -->
    <div class="w3-top w3-hide-large w3-hide-medium" id="Navbar">
        <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
            <a href="#" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
            <a href="#control" class="w3-bar-item w3-button" style="width:25% !important">CONTROL</a>
            <a href="#monitor" class="w3-bar-item w3-button" style="width:25% !important">STATUS</a>
            <a href="#logdata" class="w3-bar-item w3-button" style="width:25% !important">HISTORY</a>
            <a href="#profile" class="w3-bar-item w3-button" style="width:25% !important">PROFILE</a>
        </div>
    </div>
    <!-- Page Content -->
    <!-- Home -->
    <div class="w3-padding-large" id="main">
        <header class="w3-container w3-padding-large w3-center" id="home">
            <h1><b>MY BLOG</b></h1>
            <p>Welcome to the blog of <span class="w3-tag">My Assignment</span></p>
            <img src="image/monitoring.png" class="w3-animate-bottom w3-image w3-center" width="90%">
        </header>
    </div>

    <!-- Grid -->
    <div class="w3-row">

    <!-- Blog entries -->
    <div class="w3-col l8 s12"><br>

    <!-- LED Status -->
    <div style="margin-left: 140px;" class="w3-card-4 w3-white w3-content w3-justify w3-text-grey w3-padding-large" id="monitor">
        <div class="w3-container">
        <h2 class="w3-text-black">Status</h2>
        <h5>Bandung, <span class="w3-opacity">September 25, 2020</span></h5><hr>
        <hr style="width:200px" class="w3-opacity"><br>
        <div class="w3-button w3-cell-row w3-center w3-padding-16 w3-section w3-white" onClick="javascript:location.reload()">
            <!-- Status 1-->
            <div class="w3-cell w3-section" width="33%">
                <?php
                $sql = "Select status from tabel where name='LED1' order by id DESC Limit 1";
                $result = mysqli_query($mysqli, $sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        if ($row["status"] == 1) {
                            echo 'LED 1<br><img src="image/on.png" class="w3-image w3-padding-large" width="60%"><br>LIGHT ON';
                        } else {
                            echo 'LED 1<br><img src="image/off.png" class="w3-image w3-padding-large" width="60%"><br>LIGHT OFF';
                        }
                    }
                } else {
                    echo "<br>0 results<br>No data in Database";
                }
                ?>
            </div>

            <!-- Status 2-->
            <div class="w3-cell w3-section" width="34%">
                <?php
                $sql = "Select status from tabel where name='LED2' order by id DESC Limit 1";
                $result = mysqli_query($mysqli, $sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        if ($row["status"] == 1) {
                            echo 'LED 2<br><img src="image/on.png" class="w3-image w3-padding-large" width="60%"><br>LIGHT ON';
                        } else {
                            echo 'LED 2<br><img src="image/off.png" class="w3-image w3-padding-large" width="60%"><br>LIGHT OFF';
                        }
                    }
                } else {
                    echo "<br>0 results<br>No data in Database";
                }
                ?>
            </div>
            <!-- Status 3-->
            <div class="w3-cell w3-section" width="33%">
                <?php
                $sql = "Select status from tabel where name='LED3' order by id DESC Limit 1";
                $result = mysqli_query($mysqli, $sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        if ($row["status"] == 1) {
                            echo 'LED 3<br><img src="image/on.png" class="w3-image w3-padding-large" width="60%"><br>LIGHT ON';
                        } else {
                            echo 'LED 3<br><img src="image/off.png" class="w3-image w3-padding-large" width="60%"><br>LIGHT OFF';
                        }
                    }
                } else {
                    echo "<br>0 results<br>No data in Database";
                }
                ?>
            </div>
        </div>
        <button class="w3-button w3-right w3-light-grey fa fa-refresh" onClick="javascript:location.reload()"> Click to Refresh Data</button>
    </div><br>
    </div><hr>


    <!-- Control Panel -->
    <div style="margin-left: 140px;" class="w3-card-4 w3-white w3-content w3-justify w3-text-grey w3-padding-large" id="control">
        <h2 class="w3-text-black">Control</h2>
        <hr style="width:200px" class="w3-opacity"><br>
        <!-- LED 1 -->
        <p class="w3-wide">LED 1</p>
        <div class="w3-content w3-justify">
            <form action="process.php" method="post" name="form1">
                <div class="w3-row">
                    <div class="w3-col w3-center w3-margin-top" style="width:150px">
                        <?php
                        $sql = "Select status from tabel where name='LED1' order by id DESC Limit 1";
                        $result = mysqli_query($mysqli, $sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                if ($row["status"] == 1) {
                                    echo '<img src="image/on.png" class="w3-image" width="50%">';
                                } else {
                                    echo '<img src="image/off.png" class="w3-image" width="50%">';
                                }
                            }
                        } else {
                            echo "<br>0 results<br>No data in Database";
                        }
                        ?>
                    </div>
                    <div class="w3-rest w3-centered">
                        <div class="w3-center w3-centered">
                            <input class="w3-input w3-padding" type="number" placeholder="Time in Second" name="Time1" min="0" default value="0">
                        </div>
                        <button class="w3-right w3-button w3-light-grey w3-hover-indigo w3-section" name="OFF1" value="OFF" style="margin-left: 30px;">Turn Off</button>
                        <button class="w3-right w3-button w3-light-grey w3-hover-indigo w3-section" name="ON1" value="ON">Turn On</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- LED 2 -->
        <p class="w3-wide">LED 2</p>
        <div class="w3-content w3-justify">
            <form action="process.php" method="post" name="form1">
                <div class="w3-row">
                    <div class="w3-col w3-center w3-margin-top" style="width:150px">
                        <?php
                        $sql = "Select status from tabel where name='LED2' order by id DESC Limit 1";
                        $result = mysqli_query($mysqli, $sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                if ($row["status"] == 1) {
                                    echo '<img src="image/on.png" class="w3-image" width="50%">';
                                } else {
                                    echo '<img src="image/off.png" class="w3-image" width="50%">';
                                }
                            }
                        } else {
                            echo "<br>0 results<br>No data in Database";
                        }
                        ?>
                    </div>
                    <div class="w3-rest w3-centered">
                        <div class="w3-center w3-centered">
                            <input class="w3-input w3-padding" type="number" placeholder="Time in Second" name="Time2" min="0" default value="0">
                        </div>
                        <button class="w3-right w3-button w3-light-grey w3-hover-indigo w3-section" name="OFF2" value="OFF" style="margin-left: 30px;">Turn Off</button>
                        <button class="w3-right w3-button w3-light-grey w3-hover-indigo w3-section" name="ON2" value="ON">Turn On</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- LED 3 -->
        <p class="w3-wide">LED 3</p>
        <div class="w3-content w3-justify">
            <form action="process.php" method="post" name="form1">
                <div class="w3-row">
                    <div class="w3-col w3-center w3-margin-top" style="width:150px">
                        <?php
                        $sql = "Select status from tabel where name='LED3' order by id DESC Limit 1";
                        $result = mysqli_query($mysqli, $sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                if ($row["status"] == 1) {
                                    echo '<img src="image/on.png" class="w3-image" width="50%">';
                                } else {
                                    echo '<img src="image/off.png" class="w3-image" width="50%">';
                                }
                            }
                        } else {
                            echo "<br>0 results<br>No data in Database";
                        }
                        ?>
                    </div>
                    <div class="w3-rest w3-centered">
                        <div class="w3-center w3-centered">
                            <input class="w3-input w3-padding" type="number" placeholder="Time in Second" name="Time3" min="0" default value="0">
                        </div>
                        <button class="w3-right w3-button w3-light-grey w3-hover-indigo w3-section" name="OFF3" value="OFF" style="margin-left: 30px;">Turn Off</button>
                        <button class="w3-right w3-button w3-light-grey w3-hover-indigo w3-section" name="ON3" value="ON">Turn On</button>
                    </div>
                </div>
            </form>
        </div>
    </div><hr>
    
    
    <!-- END BLOG ENTRIES -->
    </div>

    <!-- Profile -->
    <!-- Introduction myself -->
<div class="w3-col l4">
  <!-- About Card -->
  <div class="w3-card-4 w3-margin w3-margin-top w3-white">
    <div class="w3-padding-large w3-content w3-text-black" id="profile">
        <h2 class="w3-text-black">About Me</h2><hr>
        <img src="image/Zulfi.jpg" style="width:100%">
        <hr style="width:200px" class="w3-opacity">
        <p><span class="w3-large w3-margin-left">Zulfi Fachrurrozi</span> </p>
        <p><span class="w3-large w3-margin-left">218341047</span></p>
        <p><span class="w3-large w3-margin-left">3AEB</span></p><br>
        <p>Seorang Mahasiswa Tingkat 3 di Politeknik Manufaktur Bandung Prodi D3 - Mekatronika.</p><br>
        <div class="w3-card w3-light-gray w3-margin w3-section w3-left-align">
            <p><i class="fa fa-map-marker fa-fw w3-text-black w3-large w3-margin-right"></i> Bandung, Jawa Barat
            </p>
            <p><i class="fa fa-phone fa-fw w3-text-black w3-large w3-margin-right"></i> Phone: 0896-1452-3598
            </p>
            <p><i class="fa fa-envelope fa-fw w3-text-black w3-large w3-margin-right"> </i> Email:
                zfach12@gmail.com</p>
        </div><br>
  </div>

  
<!-- END Introduction Menu -->
</div><hr>

<!-- END GRID -->
</div><br>

<!-- END w3-content -->
</div>

<!-- Log Data -->
    <div class="w3-card-4 w3-white w3-padding-large w3-content w3-text-black" id="logdata">
        <h2 class="w3-text-black">Data</h2>
        <hr style="width:220px" class="w3-opacity">
        <h3 class="w3-padding-16 w3-text-black w3-cell">Hasil Monitoring</h3>
        <div >
        <table class="w3-animate-right w3-striped w3-text-black w3-centered w3-blue-grey w3-center w3-animate-bottom" width="100%" border="1">
            <thead>
                <tr class="w3-indigo">
                    <th width="50px">ID</th>
                    <th width="107px">Device</th>
                    <th width="107px">Status</th>
                    <th width="176px">Auto OFF</th>
                    <th>Time</th>
                </tr>
            </thead>
        </table>
        </div>
        <div class="table-wrap">
        <table class="w3-animate-right w3-striped w3-text-black w3-centered w3-indigo w3-center w3-animate-bottom" width="100%" border="1">
            <thead>
                <tr class="w3-light-gray">
                    <th>..</th>
                    <th>.......</th>
                    <th>.......</th>
                    <th>............</th>
                    <th>............</th>
                </tr>
            </thead>
            <?php
            $sql = "Select * from tabel order by id DESC";
            $result = mysqli_query($mysqli, $sql);

            while ($data = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $data['id'] . "</td>";
                echo "<td>" . $data['name'] . "</td>";
                echo "<td>" . $data['status'] . "</td>";
                echo "<td>" . $data['time'] . "</td>";
                echo "<td>" . $data['time_stamp'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        </div>

        <h3 class="w3-padding-16 w3-text-black">Analytics</h3>
        <table class="w3-animate-right w3-striped w3-text-black w3-centered w3-indigo w3-center w3-animate-bottom" width="100%" border="1">
            <thead>
                <tr class="w3-indigo">
                    <th width="34%">Device</th>
                    <th width="33%">ON</th>
                    <th width="33%">OFF</th>
                </tr>
            </thead>
            <tr>
                <th>LED 1</th>
                <?php
                $result = mysqli_query($mysqli, "SELECT * ,COUNT(status) AS 'ON' FROM tabel WHERE name='LED1' AND status=1 GROUP BY name");
                $data = $result->fetch_assoc();
                echo "<th>" . $data["ON"] . "</th>";
                ?>
                <?php
                $result = mysqli_query($mysqli, "SELECT * ,COUNT(status) AS 'OFF' FROM tabel WHERE name='LED1' AND status=0 GROUP BY name");
                $data = $result->fetch_assoc();
                echo "<th>" . $data["OFF"] . "</th>";
                ?>
            </tr>
            <tr>
                <th>LED 2</th>
                <?php
                $result = mysqli_query($mysqli, "SELECT * ,COUNT(status) AS 'ON' FROM tabel WHERE name='LED2' AND status=1 GROUP BY name");
                $data = $result->fetch_assoc();
                echo "<th>" . $data["ON"] . "</th>";
                ?>
                <?php
                $result = mysqli_query($mysqli, "SELECT * ,COUNT(status) AS 'OFF' FROM tabel WHERE name='LED2' AND status=0 GROUP BY name");
                $data = $result->fetch_assoc();
                echo "<th>" . $data["OFF"] . "</th>";
                ?>
            </tr>
            <tr>
                <th>LED 3</th>
                <?php
                $result = mysqli_query($mysqli, "SELECT * ,COUNT(status) AS 'ON' FROM tabel WHERE name='LED3' AND status=1 GROUP BY name");
                $data = $result->fetch_assoc();
                echo "<th>" . $data["ON"] . "</th>";
                ?>
                <?php
                $result = mysqli_query($mysqli, "SELECT * ,COUNT(status) AS 'OFF' FROM tabel WHERE name='LED3' AND status=0 GROUP BY name");
                $data = $result->fetch_assoc();
                echo "<th>" . $data["OFF"] . "</th>";
                ?>
            </tr>
        </table>
    </div><br><br>

    <!-- Banner -->
    <div>
        <div class="w3-bottom w3-left">
            <a href="javascript:location.reload()"><img src="image/banner.png" class="w3-animate-right w3-button w3-right w3-padding-large w3-hover-opacity-off w3-opacity w3-hover-black" width="15%"></a>
        </div>
    </div>

    <!-- Footer -->
<footer class="w3-leftbar w3-round-xlarge w3-container w3-dark-grey w3-padding-32 w3-margin-top">
    <div class=" w3-center  w3-text-black w3-xlarge">
            <a href="https://www.facebook.com/zulfi.ajj"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
            <a href="https://www.instagram.com/zfach4/"><i class="fa fa-instagram w3-hover-opacity"></i></a>
            <a href="mailto: zfach12@gmail.com"><i class="fa fa-envelope w3-hover-opacity"></i></a>
            <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank"class='w3-hover-text-indigo'>w3.css</a></p>
    </div>
</footer>


</body>

</html>