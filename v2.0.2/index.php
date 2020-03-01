<?php require_once('inc/loader.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?=core_output_head()?>
  </head>

  <body>

	<div class="container">

		<div class="col-md-12">
			<h1>MIN&Xi;</h1>
		</div>

		<?php if ( $stat['waiting'] == '1' ) {
			echo '<div class="col-md-12"><p align="center"><em>There is insufficient data to produce any useful metrics.<br>Please check your wallet settings in config.php.<br>The pool you are querying may also be limiting API requests - please try later.</em></p></div>';
			die;
		} ?>

		<div class="col-md-6">
			<ul class="list-group">
				<li class="list-group-item list-group-item-<?=$conf['colour']?>"><h4>Statistics<span class="pull-right">ETH:<?=$fiat['code'].'['.number_format($ethtofiat,2)?>]</span></h4></li>
				<li class="list-group-item">
					<?php if ( $conf['show_reportedhash'] == '0' ) { ?>Mined<span class="pull-right">&Xi;<?=$stat['unpaid']?></span> <?php } ?>
					<?php if ( $conf['show_reportedhash'] == '1' ) { ?>Reported Hashrate<span class="pull-right"><?=$stat['reportedhashrate']?> MH/s</span> <?php } ?>
				</li>				
				<li class="list-group-item">Effective Hashrate [60 mins]	<span class="pull-right"><?=$stat['hashrate']?></span></li>
				<li class="list-group-item">Average Hashrate [24 hrs]		<span class="pull-right"><?=$stat['avghashrate']?> MH/s</span></li>
			</ul>
		</div>

		<div class="col-md-6">
			<ul class="list-group">
				<li class="list-group-item list-group-item-<?=$conf['colour']?>"><h4>Progr&Xi;ss <span class="pull-right"><?=number_format(($stat['unpaid']/$stat['payout'])*100)?>%</span></h4></li>
				<li class="list-group-item">Remaining 	<span class="pull-right">&Xi;<?=number_format($stat['eneeded'],5)?></span></li>
				<li class="list-group-item">Time Left	<span class="pull-right"><?=core_calc_remaining($stat['hoursuntil'])?></span></li>
				<li class="list-group-item">Next Payout	<span class="pull-right"><?=$stat['paytime']?></span></li>
			</ul>
		</div>

		<?php if ( $conf['show_bar'] == '1' ) { ?>
		<div class="col-md-12">
			<div class="progress">
			  	<div class="progress-bar progress-bar-striped progress-bar-<?=$conf['colour']?> active" role="progressbar" aria-valuenow="<?=$stat['unpaid']?>" aria-valuemin="0" aria-valuemax="100" style="width:<?=number_format(($stat['unpaid']/$stat['payout'])*100)?>%">
			  		<p><?=number_format(($stat['unpaid']/$stat['payout'])*100)?>%</p>
				</div>
			</div><br>
		</div>
		<?php } ?>	

		<div class="col-md-3">
			<ul class="list-group">
				<li class="list-group-item list-group-item-<?=$conf['colour']?>"><h4>&Xi;TH</h4></li>
				<?php if ( $conf['show_min'] == '1' ) { ?>		<li class="list-group-item">Minute 	<span class="pull-right">&Xi;<?=number_format($stat['emin'],5)?></span></li>	<?php } ?>
				<?php if ( $conf['show_hour'] == '1' ) { ?>	<li class="list-group-item">Hour 	<span class="pull-right">&Xi;<?=number_format($stat['ehour'],5)?></span></li>	<?php } ?>
				<?php if ( $conf['show_day'] == '1' ) { ?>		<li class="list-group-item">Day 	<span class="pull-right">&Xi;<?=number_format($stat['eday'],5)?></span></li>	<?php } ?>
				<?php if ( $conf['show_week'] == '1' ) { ?>	<li class="list-group-item">Week 	<span class="pull-right">&Xi;<?=number_format($stat['eweek'],5)?></span></li>	<?php } ?>
				<?php if ( $conf['show_month'] == '1' ) { ?>	<li class="list-group-item">Month 	<span class="pull-right">&Xi;<?=number_format($stat['emonth'],5)?></span></li>	<?php } ?>
			</ul>
		</div>

		<div class="col-md-3">
			<ul class="list-group">
				<li class="list-group-item list-group-item-<?=$conf['colour']?>"><h4>&Xi;TH &raquo; ฿TC</h4></li>
				<?php if ( $conf['show_min'] == '1' ) { ?>		<li class="list-group-item">Minute 	<span class="pull-right">฿<?=number_format($stat['bmin'],5)?></span></li>	<?php } ?>
				<?php if ( $conf['show_hour'] == '1' ) { ?>	<li class="list-group-item">Hour 	<span class="pull-right">฿<?=number_format($stat['bhour'],5)?></span></li>	<?php } ?>
				<?php if ( $conf['show_day'] == '1' ) { ?>		<li class="list-group-item">Day 	<span class="pull-right">฿<?=number_format($stat['bday'],5)?></span></li>	<?php } ?>
				<?php if ( $conf['show_week'] == '1' ) { ?>	<li class="list-group-item">Week 	<span class="pull-right">฿<?=number_format($stat['bweek'],5)?></span></li>	<?php } ?>
				<?php if ( $conf['show_month'] == '1' ) { ?>	<li class="list-group-item">Month 	<span class="pull-right">฿<?=number_format($stat['bmonth'],5)?></span></li>	<?php } ?>
			</ul>
		</div>

		<div class="col-md-3">
			<ul class="list-group">
				<li class="list-group-item list-group-item-<?=$conf['colour']?>"><h4>&Xi;TH &raquo; <?=$fiat['code']?></h4></li>
				<?php if ( $conf['show_min'] == '1' ) { ?>		<li class="list-group-item">Minute 	<span class="pull-right"><?=$fiat['sym'].number_format(($stat['emin']*$ethtofiat),2)?></span></li><?php } ?>
				<?php if ( $conf['show_hour'] == '1' ) { ?>	<li class="list-group-item">Hour 	<span class="pull-right"><?=$fiat['sym'].number_format(($stat['ehour']*$ethtofiat),2)?></span></li><?php } ?>
				<?php if ( $conf['show_day'] == '1' ) { ?>		<li class="list-group-item">Day 	<span class="pull-right"><?=$fiat['sym'].number_format(($stat['eday']*$ethtofiat),2)?></span></li><?php } ?>
				<?php if ( $conf['show_week'] == '1' ) { ?>	<li class="list-group-item">Week 	<span class="pull-right"><?=$fiat['sym'].number_format(($stat['eweek']*$ethtofiat),2)?></span></li><?php } ?>
				<?php if ( $conf['show_month'] == '1' ) { ?>	<li class="list-group-item">Month 	<span class="pull-right"><?=$fiat['sym'].number_format(($stat['emonth']*$ethtofiat),2)?></span></li><?php } ?>
			</ul>
		</div>		

		<div class="col-md-3">
			<ul class="list-group">
				<li class="list-group-item list-group-item-<?=$conf['colour']?>"><h4>฿TC &raquo; <?=$fiat['code']?></h4></li>
				<?php if ( $conf['show_min'] == '1' ) { ?>		<li class="list-group-item">Minute 	<span class="pull-right"><?=$fiat['sym'].number_format(($stat['bmin']*$btctofiat),2)?></span></li>	<?php } ?>
				<?php if ( $conf['show_hour'] == '1' ) { ?>	<li class="list-group-item">Hour 	<span class="pull-right"><?=$fiat['sym'].number_format(($stat['bhour']*$btctofiat),2)?></span></li>	<?php } ?>
				<?php if ( $conf['show_day'] == '1' ) { ?>		<li class="list-group-item">Day 	<span class="pull-right"><?=$fiat['sym'].number_format(($stat['bday']*$btctofiat),2)?></span></li>	<?php } ?>
				<?php if ( $conf['show_week'] == '1' ) { ?>	<li class="list-group-item">Week 	<span class="pull-right"><?=$fiat['sym'].number_format(($stat['bweek']*$btctofiat),2)?></span></li>	<?php } ?>
				<?php if ( $conf['show_month'] == '1' ) { ?>	<li class="list-group-item">Month 	<span class="pull-right"><?=$fiat['sym'].number_format(($stat['bmonth']*$btctofiat),2)?></span></li>	<?php } ?>
			</ul>
		</div>

		<?php if ( $conf['show_power'] == '1' ) { ?>
		<div class="col-md-4">
			<ul class="list-group">
				<li class="list-group-item list-group-item-<?=$conf['colour']?>"><h4>Power Costs</h4></li>
				<?php if ( $conf['show_min'] == '1' ) { ?><li class="list-group-item">Minute<span class="pull-right"><?=$fiat['sym'].number_format($stat['power-min'],2)?></span></li><?php } ?>
				<?php if ( $conf['show_hour'] == '1' ) { ?>	<li class="list-group-item">Hour<span class="pull-right"><?=$fiat['sym'].number_format($stat['power-hour'],2)?></span></li><?php } ?>
				<?php if ( $conf['show_day'] == '1' ) { ?>		<li class="list-group-item">Day<span class="pull-right"><?=$fiat['sym'].number_format($stat['power-day'],2)?></span></li><?php } ?>
				<?php if ( $conf['show_week'] == '1' ) { ?>	<li class="list-group-item">Week<span class="pull-right"><?=$fiat['sym'].number_format($stat['power-week'],2)?></span></li><?php } ?>
				<?php if ( $conf['show_month'] == '1' ) { ?>	<li class="list-group-item">Month<span class="pull-right"><?=$fiat['sym'].number_format($stat['power-month'],2)?></span></li><?php } ?>
			</ul>
		</div>

		<div class="col-md-4">
			<ul class="list-group">
				<li class="list-group-item list-group-item-<?=$conf['colour']?>"><h4>&Xi;TH Profitability</h4></li>
				<?php if ( $conf['show_min'] == '1' ) { ?><li class="list-group-item">Minute<span class="pull-right"><?=$fiat['sym'].number_format((($stat['emin']*$ethtofiat)-$stat['power-min']),2)?></span></li><?php } ?>
				<?php if ( $conf['show_hour'] == '1' ) { ?>	<li class="list-group-item">Hour<span class="pull-right"><?=$fiat['sym'].number_format((($stat['ehour']*$ethtofiat)-$stat['power-hour']),2)?></span></li><?php } ?>
				<?php if ( $conf['show_day'] == '1' ) { ?>		<li class="list-group-item">Day<span class="pull-right"><?=$fiat['sym'].number_format((($stat['eday']*$ethtofiat)-$stat['power-day']),2)?></span></li><?php } ?>
				<?php if ( $conf['show_week'] == '1' ) { ?>	<li class="list-group-item">Week<span class="pull-right"><?=$fiat['sym'].number_format((($stat['eweek']*$ethtofiat)-$stat['power-week']),2)?></li><?php } ?>
				<?php if ( $conf['show_month'] == '1' ) { ?>	<li class="list-group-item">Month<span class="pull-right"><?=$fiat['sym'].number_format((($stat['emonth']*$ethtofiat)-$stat['power-month']),2)?></span></li><?php } ?>
			</ul>
		</div>

		<div class="col-md-4">
			<ul class="list-group">
				<li class="list-group-item list-group-item-<?=$conf['colour']?>"><h4>฿TC Profitability</h4></li>
				<?php if ( $conf['show_min'] == '1' ) { ?><li class="list-group-item">Minute<span class="pull-right"><?=$fiat['sym'].number_format((($stat['bmin']*$btctofiat)-$stat['power-min']),2)?></span></li><?php } ?>
				<?php if ( $conf['show_hour'] == '1' ) { ?>	<li class="list-group-item">Hour<span class="pull-right"><?=$fiat['sym'].number_format((($stat['bhour']*$btctofiat)-$stat['power-hour']),2)?></span></li><?php } ?>
				<?php if ( $conf['show_day'] == '1' ) { ?>		<li class="list-group-item">Day<span class="pull-right"><?=$fiat['sym'].number_format((($stat['bday']*$btctofiat)-$stat['power-day']),2)?></span></li><?php } ?>
				<?php if ( $conf['show_week'] == '1' ) { ?>	<li class="list-group-item">Week<span class="pull-right"><?=$fiat['sym'].number_format((($stat['bweek']*$btctofiat)-$stat['power-week']),2)?></li><?php } ?>
				<?php if ( $conf['show_month'] == '1' ) { ?>	<li class="list-group-item">Month<span class="pull-right"><?=$fiat['sym'].number_format((($stat['bmonth']*$btctofiat)-$stat['power-month']),2)?></span></li><?php } ?>
			</ul>
		</div>
		<?php } ?>

		<div class="col-md-12">
			<ul class="list-group">
				<?php if ( $cache == '1' ) { ?><li class="list-group-item list-group-item-warning">Using Cached Data: Too many requests to the Ethermine API</li><?php } ?>
			</ul>
		</div>

	</div>

	<!-- Please leave this footer block in place, so that others can find ethermine-stats -->
	<div class="container">
		<div class="col-md-12 footer">
			<a href="https://github.com/hamlesh/ethermine-stats" target="_blank" class="pull-right"><i class="fa fa-github"></i> ETHERMINE-STATS</a>
		</div>
	</div>
	<!-- Please leave this footer block in place, so that others can find ethermine-stats -->

	<?=core_output_footerscripts()?>

  </body>

</html>