<!DOCTYPE html>
<html lang = "en">
    <meta charset = "utf-8">
    <title>Home</title>
    <body>
        <?php
        include "connect.php";
        ?>
        <table width = "100%" border ="1">
            <tr>
                <td colspan="4">
                    <center><h2>jiratchaya Shop</h2></center>
                </td>
            </tr>
            <tr>
                <td><a href="index.php">Home</a></td>
                <td><a href = "./Manageproducts.php">Manage Products</a></td>
                <td><a href = "./addform.php">Creat a new Products</a></td>
                <td>Link</td>
            </tr>
            <tr height = "300px">
                <td colspan="4">
                    <?php
                        $search = "";
                        if($_SERVER["REQUEST_METHOD"] == "post"){
                            $search = $_POST['search'];
                    }

                    $sql = "SELECT * FROM products WHERE ProductName Like '%$search%' OR Category LIKE '%$search%' ";
                    $result = mysqli_query($conn, $sql) or  die("ไม่มีข้อมูลที่ค้นหา");
                ?>
                    <form method = "post" action ="">
                        <input type = "text" name = "search" size="100">
                        <input type = "submit" name="submit" value="ค้นหา">
                    </form>
                    <table width = "100%" border = "1">
                        <tr>
                            <th>ลำดับ</th>
                            <th>รูป</th>
                            <th>ชื่อสินค้า</th>
                            <th>ประเภทสินค้า</th>
                            <th>รายละเอียดสินค้า</th>
                            <th>ราคา</th>
                            <th>จำนวน</th>
                        </tr>
                        <?php
                            if($result->num_rows>0){
                                $count = 1;
                                while($row = $result->fetch_assoc()){
                                   echo "<tr>";
                                           echo"<td><center>" . $count . "</center></td>";
                                           echo"<td><img src ='images/" . $row["Picture"] ."' width = '100px' height = '80px' ></td>";
                                           echo"<td>" . $row["ProductName"] . "</td>";
                                           echo"<td>" . $row["category"] . "</td>";
                                           echo"<td>" . $row["ProductDescription"] . "</td>";
                                           echo"<td>" . $row["Price"] . "</td>";
                                           echo"<td>" . $row["Quantity Stock"] . "</td>";
                                           $count++;
                                   echo"</tr>";
                                 }
                               }
                             ?>
                       </table>
                </td>
            </tr>
        </table>
    </body>
</html>