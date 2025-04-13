<!DOCTYPE php>
<php lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bmi Calculator</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>
    
    .gauge-container {
      position: relative;
      width: 300px;
      height: 150px;
    }

    /* svg {
      width: 100%;
      height: 100%;
    } */

    .needle {
      position: absolute;
      width: 4px;
      height: 100px;
      background: white;
      left: 50%;
      bottom: 0;
      transform-origin: bottom center;
      transform: rotate(0deg);
      transition: transform 0.5s ease-out;
      z-index: 3;
    }

    .needle::after {
        content: '';
        position: absolute;
        top: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 0;
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
        border-bottom: 12px solid white; 
    }

    .center-circle {
      position: absolute;
      width: 30px;
      height: 30px;
      background: blue;
      border-radius: 50%;
      bottom: -5px;
      left: 50%;
      transform: translate(-50%, 30%);
      z-index: 4;
    }

    .label {
      fill: white;
      font-size: 12px;
      text-anchor: middle;
      dominant-baseline: middle;
    }

    .inputs {
      display: flex;
      flex-direction: column;
      gap: 10px;
      align-items: center;
    }

    input, select {
      padding: 6px;
      font-size: 14px;
      border-radius: 4px;
      border: none;
      width: 200px;
    }

    button {
      padding: 8px 16px;
      font-size: 14px;
      background: orange;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      color: white;
    }

    .bmi-result {
      font-size: 18px;
      margin-top: 10px;
    }
  </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <?php include 'header.php';?>
    
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>BMI calculator</h2>
                        <div class="bt-option">
                            <a href="./index.php">Home</a>
                            <span>BMI calculator</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- BMI Calculator Section Begin -->
    <section class="bmi-calculator-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title chart-title">
                        <span>check your body</span>
                        <h2>BMI CALCULATOR CHART</h2>
                    </div>
                    <div class="chart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Bmi</th>
                                    <th>WEIGHT STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="point">Below 18.5</td>
                                    <td>Underweight</td>
                                </tr>
                                <tr>
                                    <td class="point">18.5 - 24.9</td>
                                    <td>Healthy</td>
                                </tr>
                                <tr>
                                    <td class="point">25.0 - 29.9</td>
                                    <td>Overweight</td>
                                </tr>
                                <tr>
                                    <td class="point">30.0 - and Above</td>
                                    <td>Obese</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-title chart-calculate-title">
                        <h2>CALCULATE YOUR BMI : </h2>
                    </div>
                    <div class="chart-calculate-form">
                        <div class="bmiContain">
                            <h2>BMI Calculator</h2>

                                <div class="gauge-container">
                                    <svg viewBox="0 0 300 150">
                                        <path d="M 10 150 A 140 140 0 0 1 290 150" fill="red"/>
                                        <path d="M 40 150 A 110 110 0 0 1 260 150" fill="orange"/>
                                        <g id="labels"></g>
                                    </svg>

                                    <div class="needle" id="needle"></div>
                                    <div class="center-circle"></div>
                                </div>

                                <div class="inputs">
                                    <input type="number" id="weight" placeholder="Weight in kg" />
                                    <input type="number" id="height" placeholder="Height in cm" />
                                    <select id="gender">
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <button onclick="calculateBMI()">Calculate BMI</button>
                                    <div class="bmi-result" id="bmiValue" style="color:white;"></div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BMI Calculator Section End -->

    <?php include 'footer.php';?>

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/jquery.barfiller.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script>
  const minBMI = 16;
  const maxBMI = 36;
  const centerX = 150;
  const centerY = 150;
  const radius = 125;
  const labelsGroup = document.getElementById("labels");

  // Add scale labels
  for (let bmi = minBMI; bmi <= maxBMI; bmi+=2) {
    const ratio = (bmi - minBMI) / (maxBMI - minBMI);
    const angleRad = Math.PI * ratio;
    const x = centerX + radius * Math.cos(Math.PI - angleRad);
    const y = centerY - radius * Math.sin(Math.PI - angleRad);

    const text = document.createElementNS("http://www.w3.org/2000/svg", "text");
    text.setAttribute("x", x.toFixed(2));
    text.setAttribute("y", y.toFixed(2));
    text.setAttribute("class", "label");
    text.textContent = bmi;
    labelsGroup.appendChild(text);
  }

  function setBMI(bmi) {
    const needle = document.getElementById("needle");
    const clamped = Math.max(minBMI, Math.min(maxBMI, bmi));
    const ratio = (clamped - minBMI) / (maxBMI - minBMI);
    const angle = ratio * 180 - 90;
    needle.style.transform = `rotate(${angle}deg)`;

    document.getElementById("bmiValue").textContent = `Your Adjusted BMI: ${bmi.toFixed(2)}`;
  }

  function calculateBMI() {
    const weight = parseFloat(document.getElementById("weight").value);
    const height = parseFloat(document.getElementById("height").value);
    const gender = document.getElementById("gender").value;

    if (!weight || !height || !gender) {
      alert("Please enter all fields.");
      return;
    }

    const heightM = height / 100;
    let bmi = weight / (heightM * heightM);

    // Gender-based interpretation adjustment
    if (gender === 'female') {
      bmi -= 1;
    }

    setBMI(bmi);
  }

  // Initial default
  setBMI(20);
</script>
</body>

</php>