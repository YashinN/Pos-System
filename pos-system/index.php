
<?php

    include 'data/data.php';
    include 'model/MenuItem.php';
    include 'include/addItem.php';

     session_start();
     if(!isset($_SESSION['orderTotal'])){
        $_SESSION['orderTotal'] = 0;
     }
    
    $menuItems = MenuItem::loadData($items);

// display error codes and messages
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if ( isset($_POST['field']) ) {
        $_SESSION['field'] = $_POST['field'];
        $_SESSION['order']['items']=[];
        $_SESSION['orderTotal'];

        // $displayTotal = $_SESSION['orderTotal'];
        $_SESSION['menuitems'] = $menuItems;
        addItem();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S&S POS</title>
    <link rel="stylesheet" href="./static/css/style.css">
</head>
<body>
    <h1>
        <span style="color:red">Select</span> and <span style="color:blue">Save</span>
    </h1>

    <hr>

    <div class="till__display">
        <div>
            <span class="till__console">
                Amount: R <span><?php echo $_SESSION['orderTotal'];?>.00</span>
            </span>
        </div>
    </div>

    <hr>

    <section >
        <form class="items" action=" <?php $_SERVER['PHP_SELF'] ?>" method="post">
            <?php
                $itemsLen = count($menuItems);

                for ($i=0; $i < $itemsLen; $i++) { 
            ?>   
                <button type="submit" name="field[]" value=<?php echo $menuItems[$i]->barcode?> class="item">
                    <h3>
                        <?php echo $menuItems[$i]->name?>
                    </h3>
                    <h3>
                        R:<?php echo $menuItems[$i]->price?>.00
                    </h3>
                    <h3>
                        barcode:<?php echo $menuItems[$i]->barcode?>
                    </h3>
                </button>
            <?php
                }
            ?>
        </form>
    </section>

    <form action="./views/checkout.php" method="get" class="checkout">
        <input type="hidden" name="subTotal" value="sub total amount">
        <button type="submit">
            Proceed to payment
        </button>
    </form>


</body>
</html>