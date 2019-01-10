<?php

	$userID = $_SESSION["ustcode"];
	$select_content23=("select * from systemusers WHERE id='$userID'");
	$content_result23= mysqli_query($db, $select_content23) or die (mysqli_error($db));
	$content23 = mysqli_fetch_assoc($content_result23);	
?>

<a href="dashboard" class="btn btn-sm btn-success" style="margin-top:6px"><i class="fa fa-home"></i> Dashboard</a>

<?php if (($content23['set_items'] == 1) || ($content23['re_order_level'] == 1) ){?>
<div class="btn-group">
    <button data-toggle="dropdown" class="btn btn-sm btn-primary dropdown-toggle" type="button" aria-expanded="false"><i class="fa fa-list"></i> Items<span class="caret"></span>
    </button>
    <ul role="menu" class="dropdown-menu">
        <?php if ($content23['set_items'] == 1){?>
        <li><a href="categories" >Item Categories</a></li>
        <li><a href="items" >Items</a></li>
        <li><a href="remove_items" >Remove/Delete Items</a></li>
        <?php } ?>
        <?php if ($content23['re_order_level'] == 1){?><li><a href="low-stock-value" >Re-Order Level</a></li><?php } ?>
    </ul>
</div>
<?php } ?>

<?php if ($content23['stock_entry'] == 1){?>
<div class="btn-group">
    <button data-toggle="dropdown" class="btn btn-sm btn-warning dropdown-toggle" type="button" aria-expanded="false"><i class="fa fa-list"></i> Stock  Entry<span class="caret"></span>
    </button>
    <ul role="menu" class="dropdown-menu">
        <li><a href="items_update">New Stock Entry</a> </li>
        <li><a href="batches">Batches</a>  </li>
    </ul>
</div>
<?php } ?>

<?php if ($content23['sale_item'] == 1){?>
<a href="sale" class="btn btn-sm btn-dark" style="margin-top:6px"><i class="fa fa-building"></i> Sales</a>
<?php } ?>

<?php if ($content23['expenses'] == 1){?>
<div class="btn-group">
    <button data-toggle="dropdown" class="btn btn-sm btn-success dropdown-toggle" type="button" aria-expanded="false"><i class="fa fa-sitemap"></i> Expenses Mgt. <span class="caret"></span>
    </button>
    <ul role="menu" class="dropdown-menu">
    	<li><a href="expensestype">Type of Expenses</a></li>
        <li><a href="dailyexpenses">Daily Expenses</a></li>
        <li><a href="payees">Payees</a></li>
        <li><a href="payment-voucher">Payment Voucher</a>   </li>
    </ul>
</div>
<?php } ?>

<?php if ($content23['report'] == 1){?>
<div class="btn-group">
    <button data-toggle="dropdown" class="btn btn-sm btn-success dropdown-toggle" type="button" aria-expanded="false"><i class="fa fa-list"></i> Reports<span class="caret"></span>
    </button>
    <ul role="menu" class="dropdown-menu">
      	<li><a href="low-stock">Low Stocks</a> </li>
        <li><a href="counting">Counting</a>  </li>
         <li><a href="batchedItems">Batched Items</a>  </li>
        <li><a href="sales">Sales</a> </li>
        <li><a href="orders-report">Orders</a> </li>
        <li><a href="debtors">Debtors</a> </li>
        <li><a href="paid-debts">Paid Debts</a> </li>
        <li><a href="sales-margine">Sales Margin</a> </li>
        <li><a href="best-sellers">Best Sellers</a>  </li>
        <li><a href="best-sellers">Best Buyers</a>  </li>
        <li><a href="entries">Stock Entries</a>  </li>
        <li><a href="categories-report">Categories</a>  </li>
    </ul>
</div>
<?php } ?>

<?php if ($content23['customers'] == 1){?>
<a href="customers" class="btn btn-sm btn-warning" style="margin-top:6px"><i class="fa fa-book"></i> Customer</a>
<?php } ?>


