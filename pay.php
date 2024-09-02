<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>
<?php

if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location: http://localhost/katravel/index.php');
    exit;
}
?>
<div class="container">

    <script
        src="https://www.paypal.com/sdk/js?client-id=AUP0tFEWOCb8tpSAC_kO7rIh16zo_ytQ9Mgp3h329e1jmcfxcZJ4xbrUH_WdzYl0zaeVl-cb8lPz46aG&currency=USD"></script>
    <div style="margin-top: 200px;" id="paypal-button-container"></div>
    <script>
        paypal.Buttons({
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: "<?php echo $_SESSION['payment']; ?>"
                        }
                    }]
                });
            },
            onApprove: (data, actions) => {
                return actions.order.capture().then(function (orderData) {

                    window.location.href = 'index.php';
                });
            }
        }).render('#paypal-button-container');
    </script>

</div>
</div>
</div>

<?php require "includes/footer.php"; ?>