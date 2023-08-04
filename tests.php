<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <title>Document</title>
  <style>
    table {
  border-collapse: collapse;
  margin: 0 auto;
  min-width: 600px;
  border: 1px solid #000;
  background-color: #f1f1f1;
}

th h2{
  text-align: center !important;
}
table {
    border-collapse: collapse;
    border: 1px solid #ccc;
  }

  tr td:first-child {
    padding: 10px;
    text-align: left;
    border: 1px solid #ccc;
  }
  td:nth-child(2) {
    padding: 10px;
    text-align: center;
    border: 1px solid #ccc;
  }

  th {
    background-color: #f2f2f2;
    font-weight: bold;
  }

  input[type="text"] {
    width: 95%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  .submit-btn {
    text-align: center !important;
  }
  </style>
</head>
<body>
    <?php
    function tachHoTen($hoTen) {
        $hoTen = trim($hoTen);
        $mangTen = explode(" ", $hoTen);
        
        $ho = $mangTen[0];
        $ten = $mangTen[count($mangTen) - 1];
        
        $tenDem = "";
        if (count($mangTen) > 3) {
            $tenDem = implode(" ", array_slice($mangTen, 1, count($mangTen) - 2));
        } elseif (count($mangTen) == 3) {
            $tenDem = $mangTen[1];
        }
        
        return array(
            'ho' => $ho,
            'tenDem' => $tenDem,
            'ten' => $ten
        );
    }
    ?>
    
        <form action="" method="post">
        <?php 
        $hoTen = $_POST["hoTen"];
        $thongTin = tachHoTen($hoTen); ?>
        <table>
  <tr>
    <th colspan="2" >
      <h2>Tách họ và tên</h2>
    </th>
  </tr>
  <tr>
    <td><label for="hoTen">Họ Tên:</label></td>
    <td><input type="text" id="hoTen" name="hoTen" required></td>
  </tr>
  <tr>
    <td><label>Họ:</label></td>
    <td><p><?php echo $thongTin['ho'] ?></p></td>
  </tr>
  <tr>
    <td><label>Tên đệm:</label></td>
    <td><p><?php echo $thongTin['tenDem'] ?></p></td>
  </tr>
  <tr>
    <td><label>Tên:</label></td>
    <td><p><?php echo $thongTin['ten'] ?></p></td>
  </tr>
  <tr>
    <td colspan="2" class="submit-btn">
      <button type="submit" class="btn-success" style="height: 50px; width: 100px; border-radius: 10px;">Tách</button>
    </td>
  </tr>
</table>
    </form>
  <?php   
    ?>
    <!-- HTML !-->
<button class="button-33" role="button">Button 33</button>


</body>
</html>