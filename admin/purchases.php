<?php
require_once('include/bootstrap.php');
$user = new Users($db_connection);
$user->isLoggedIn();
$purchases = new Purchases($db_connection);
$results = $purchases->getAllData();


if (isset($_GET['action'])) {

	switch ($_GET['action']) {
		case 'delete':
			$purchases->delete($_GET['id']);
			redirect('purchases.php?action=success');
		break;
		case 'success':
			$deleteMsg = 'Изтриването успешно';
			break;
		default:
			redirect('purchases.php');
			break;
		case 'approved':
			$purchases->updateApproved($_GET['id']);
			redirect('purchases.php?approved=success');
			break;
	}
}

if(isset($_GET['approved']) && $_GET['approved'] == 'success') {
	$approvedMsg = 'Одобрихте успешно покупката на продукта';
}



require_once('include/header.php');
?>
<div class="content">
	<table>
		<tr>
			<th width="5%%">Референция</th>
			<th width="25%">Име</th>
			<th width="5%">Дата</th>
			<th width="25%">Е-мейл</th>
			<th width="5%">Телефон</th>
			<th width="25%">Име</th>
			<th width="10%">Цена</th>
			<th width="10%">Действие</th>
		</tr>
		<?php
		foreach ($results as $key => $value) {
		?>
		<tr>
			<td><?php echo $value['product_id']?></td>
			<td><?php echo $value['name']?></td>
			<td><?php echo $value['date_added']?></td>
			<td><?php echo $value['email']?></td>
			<td><?php echo $value['phone']?></td>
			<td><?php echo $value['product_title']?></td>
			<td><?php echo $value['product_price']?></td>
			<td>
				<?=($value['is_approved'] != 1) ? '<a href="purchases.php?action=approved&id='.$value['id'].'">Одобри</a>/' : false?><a href="purchases.php?action=delete&id=<?=$value['id']?>">Изтрий</a>
			</td>
		</tr>
		<?php
		}
		?>
		<?php if (isset($deleteMsg)) : ?>
		<tr>
			<th colspan="8"><div class="success"><?= $deleteMsg ?></div></th>
		</tr>
		<?php endif; ?>
		<?php if (isset($approvedMsg)) : ?>
		<tr>
			<th colspan="8"><div class="success"><?= $approvedMsg ?></div></th>
		</tr>
		<?php endif; ?>
	</table>
	<br>
</div>
<?php
require_once('include/footer.php');