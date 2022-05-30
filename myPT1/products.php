<!DOCTYPE html>
<html>
<head>
  <title>Senorita Fashions-Products</title>
  <style>
    div {
      margin-bottom: 10px;
      text-align: center;
      text-align-last: center;
    }
    label {
        display: inline-block;
        width: 80px;
        text-align: justify-all;
        vertical-align: middle;
 
    }
    html {
    height:100%;
    }
    body {
    height: 959px;
    background: linear-gradient(to bottom, #ff0066 0%, #ffff66 100%)fixed;
  }

  a.one:link{font-size:30px}
 

  a:link, a:visited {
    color: black;
    text-align: center;
    text-decoration: underline;
    display: inline-block;
  }

  a:hover, a:active {
  background-color: #ffff66;
  }

  a.two:hover, a.two:active {
  background-color: pink;
  }

  table { background-color: #ffffcc; }
  tr { background-color: #ffffcc; }
  td { background-color: #ffffcc; }



  </style>
</head>
<body>
  <center>

    <a class="one" href="index.php">Home</a> |
    <a class="one" href="products.php">Products</a> |
    <a class="one" href="customers.php">Customers</a> |
    <a class="one" href="staffs.php">Staffs</a> |
    <a class="one" href="orders.php">Orders</a>
    <hr>
    <form action="products.php" method="post">
      <dl>
      <div>
      <label>Product ID:</label>
      <input name="pid" type="text" required ><br></br>
    </div>

      <div>
      <label>Name:</label>
      <input name="name" type="text" required><br></br>
    </div>

      <div>
      <label>Price:</label>
      <input name="price" type="text" required><br></br>
    </div>

      <div>
      <label>Quantity:</label>
      <input name="quantity" type="text" required><br></br>
    </div>

      <div>
      <label>Style:</label>
      <select name="style">
        <option value="A-Line">A-Line</option>
        <option value="Asymmetrical">Asymmetrical</option>
        <option value="Beachwear">Beachwear</option>
        <option value="Cardigan">Cardigan</option>
        <option value="Casual">Casual</option>
        <option value="Chinese">Chinese</option>
        <option value="Fashion">Fashion</option>
        <option value="Formal">Formal</option>
        <option value="Hoodie">Hoodie</option>
        <option value="Indian">Indian</option>
        <option value="Innerwear">Innerwear</option>
        <option value="Jacket">Jacket</option>
        <option value="Malay">Malay</option>
        <option value="Others">Others</option>
        <option value="Pleated">Pleated</option>
        <option value="Sleepwear">Sleepwear</option>
        <option value="Smartcasual">Smartcasual</option>
        <option value="Sports">Sports</option>
        <option value="Summer">Summer</option>
        <option value="Yoga">Yoga</option>
      </select> <br></br>
    </div>

    <div>
      <label>Ships From:</label>
      <select name="country">
        <option value="India">India</option>
        <option value="Local(Malaysia)">Local(Malaysia)</option>
        <option value="Mainland China">Mainland China</option>
        <option value="Other Countries">Other Countries</option>
        <option value="Overseas">Overseas</option>
        <option value="Singapore">Singapore</option>
      </select> <br></br>
    </div>

      <div>
      <label>Material:</label>
      <select name="material">
        <option value="Arcyclic wool">Arcyclic wool</option>
        <option value="Chiffon">Chiffon</option>
        <option value="Cotton">Cotton</option>
        <option value="Crepe">Crepe</option>
        <option value="Denim">Denim</option>
        <option value="Georgette">Georgette</option>
        <option value="Lace">Lace</option>
        <option value="Linen">Linen</option>
        <option value="Mixed Materials(Others)">Mixed Material(Others)</option>
        <option value="Nylon">Nylon</option>
        <option value="Polyester">Polyester</option>
        <option value="Silk">Silk</option>
        <option value="Spandex">Spandex</option>
        <option value="Viscose">Viscose</option>
      </select><br></br>
    </div>

      <div>
      <label>Product Type:</label>
      <select name="type">
        <option value="Dresses">Dresses</option>
        <option value="Lingerie & Nightwear">Lingerie & Nightwear</option>
        <option value="Others">Others</option>
        <option value="Outerwear">Outerwear</option>
        <option value="Pants & shorts">Pants & shorts</option>
        <option value="Playsuits & Jumpsuits">Playsuits & Jumpsuits</option>
        <option value="Plus size">Plus size</option>
        <option value="Set wear">Set wear</option>
        <option value="Skirts">Skirts</option>
        <option value="Socks & tights">Socks & tights</option>
        <option value="Sports & Beachwear">Sports & Beachwear</option>
        <option value="Tops">Tops</option>
        <option value="Traditional Wear">Traditional Wear</option>
      </select><br></br>
    </div>
      <div>
      <button type="submit" name="create">Create</button>
      <button type="reset">Clear</button> </div>
      
    </dl>
    </form>
    <hr>
    <table border="1">
      <tr>
        <td>Product ID</td>
        <td>Name</td>
        <td>Price</td>
        <td>Quantity</td>
        <td>Style</td>
        <td>Ships From</td>
        <td>Material</td>
        <td>Product Type</td>
        <td></td>
      </tr>
      <tr>
        <td>P01</td>
        <td>Lapel Long Sleeve Solid Bow tie Slim Dress</td>
        <td>Rm24.29</td>
        <td>9816</td>
        <td>Casual</td>
        <td>Mainland China</td>
        <td>Polyester</td>
        <td>Dresses</td>
        <td>
          <a class="two" href="products_details.php">Details</a>
          <a class="two" href="products.php">Edit</a>
          <a class="two" href="products.php">Delete</a>
        </td>
      </tr>
            <tr>
        <td>P02</td>
        <td> O-Neck Floral Lace Maxi Dress</td>
        <td>Rm21.00</td>
        <td>1999</td>
        <td>Fashion</td>
        <td>Singapore</td>
        <td>Lace</td>
        <td>Dresses</td>
        <td>
          <a class="two" href="products.php">Details</a>
          <a class="two" href="products.php">Edit</a>
          <a class="two" href="products.php">Delete</a>
        </td>
      </tr>
            <tr>
        <td>P03</td>
        <td>Long Sleeves Classic Korean Dress With Belt</td>
        <td>Rm22.90</td>
        <td>1532</td>
        <td>Summer</td>
        <td>Local(Malaysia)</td>
        <td>Cotton</td>
        <td>Dresses</td>
        <td>
          <a class="two" href="products.php">Details</a>
          <a class="two" href="products.php">Edit</a>
          <a class="two" href="products.php">Delete</a>
        </td>
      </tr>
            <tr>
        <td>P04</td>
        <td>Amoree Pencil Skirt</td>
        <td>Rm39.00</td>
        <td>947</td>
        <td>Pleated</td>
        <td>Local(Malaysia)</td>
        <td>Crepe</td>
        <td>Skirts</td>
        <td>
          <a class="two" href="products.php">Details</a>
          <a class="two" href="products.php">Edit</a>
          <a class="two" href="products.php">Delete</a>
        </td>
      </tr>
            <tr>
        <td>P05</td>
        <td>Korean High Waist A Line Denim Skirt</td>
        <td>Rm18.55</td>
        <td>33219</td>
        <td>A-Line</td>
        <td>Mainland China</td>
        <td>Denim</td>
        <td>Skirts</td>
        <td>
          <a class="two" href="products.php">Details</a>
          <a class="two" href="products.php">Edit</a>
          <a class="two" href="products.php">Delete</a>
        </td>
      </tr>
            <tr>
        <td>P06</td>
        <td>Elastic High Waist Long Mesh Skirt</td>
        <td>Rm16.90</td>
        <td>129</td>
        <td>Asymmetrical</td>
        <td>Local(Malaysia)</td>
        <td>Mixed Materials(Others)</td>
        <td>Skirts</td>
        <td>
          <a class="two" href="products.php">Details</a>
          <a class="two" href="products.php">Edit</a>
          <a class="two" href="products.php">Delete</a>
        </td>
      </tr>
            <tr>
        <td>P07</td>
        <td>Fashion Knit Cardigan</td>
        <td>Rm17.42</td>
        <td>14640</td>
        <td>Cardigan</td>
        <td>Mainland China</td>
        <td>Cotton</td>
        <td>Outerwear</td>
        <td>
          <a class="two" href="products.php">Details</a>
          <a class="two" href="products.php">Edit</a>
          <a class="two" href="products.php">Delete</a>
        </td>
      </tr>
            <tr>
        <td>P08</td>
        <td>Solid Color Hooded Tops Women</td>
        <td>Rm14.84</td>
        <td>12256</td>
        <td>Hoodie</td>
        <td>Overseas</td>
        <td>Polyester</td>
        <td>Outerwear</td>
        <td>
          <a class="two" href="products.php">Details</a>
          <a class="two" href="products.php">Edit</a>
          <a class="two" href="products.php">Delete</a>
        </td>
      </tr>
            <tr>
        <td>P09</td>
        <td>Sweatshirt Hooded Jacket</td>
        <td>Rm19.74</td>
        <td>2736</td>
        <td>Jacket</td>
        <td>Other Countries</td>
        <td>Polyester</td>
        <td>Outerwear</td>
        <td>
          <a class="two" href="products.php">Details</a>
          <a class="two" href="products.php">Edit</a>
          <a class="two" href="products.php">Delete</a>
        </td>
      </tr>
            <tr>
        <td>P10</td>
        <td>Tops Female Sports T-Shirt</td>
        <td>Rm21.09</td>
        <td>8355</td>
        <td>Sports</td>
        <td>Overseas</td>
        <td>Spandex</td>
        <td>Sports&Beachwear</td>
        <td>
          <a class="two" href="products.php">Details</a>
          <a class="two" href="products.php">Edit</a>
          <a class="two" href="products.php">Delete</a>
        </td>
      </tr>
            <tr>
        <td>P11</td>
        <td>Stretchable Yoga 3 Quarter Pants</td>
        <td>Rm14.31</td>
        <td>311</td>
        <td>Yoga</td>
        <td>Local(Malaysia)</td>
        <td>Nylon</td>
        <td>Sports&Beachwear</td>
        <td>
          <a class="two" href="products.php">Details</a>
          <a class="two" href="products.php">Edit</a>
          <a class="two" href="products.php">Delete</a>
        </td>
      </tr>
            <tr>
        <td>P12</td>
        <td>Smock Summer Bikini Long</td>
        <td>Rm17.85</td>
        <td>428</td>
        <td>Beachwear</td>
        <td>Mainland China</td>
        <td>Chiffon</td>
        <td>Sports&Beachwear</td>
        <td>
          <a class="two" href="products.php">Details</a>
          <a class="two" href="products.php">Edit</a>
          <a class="two" href="products.php">Delete</a>
        </td>
      </tr>
            <tr>
        <td>P13</td>
        <td>Long Cheongsam Plum Sexy Costume</td>
        <td>Rm45.90</td>
        <td>9817</td>
        <td>Chinese</td>
        <td>Overseas</td>
        <td>Mixed Materials(Others)</td>
        <td>Dresses</td>
        <td>
          <a class="two" href="products.php">Details</a>
          <a class="two" href="products.php">Edit</a>
          <a class="two" href="products.php">Delete</a>
        </td>
      </tr>
            <tr>
        <td>P14</td>
        <td>Baju Kurung Muslim Fashion</td>
        <td>Rm110.00</td>
        <td>6328</td>
        <td>Malay</td>
        <td>Mainland China</td>
        <td>Polyester</td>
        <td>Dresses</td>
        <td>
          <a class="two" href="products.php">Details</a>
          <a class="two" href="products.php">Edit</a>
          <a class="two" href="products.php">Delete</a>
        </td>
      </tr>
            <tr>
        <td>P15</td>
        <td>Georgette Design Work Saree</td>
        <td>Rm75.00</td>
        <td>145</td>
        <td>Indian</td>
        <td>India</td>
        <td>Georgette</td>
        <td>Dresses</td>
        <td>
          <a class="two" href="products.php">Details</a>
          <a class="two" href="products.php">Edit</a>
          <a class="two" href="products.php">Delete</a>
        </td>
      </tr>
    </table>
  </center>
</body>
</html>
