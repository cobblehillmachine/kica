<?php 
/*
 * This file contains the HTML generated for full calendars. You can copy this file to yourthemefolder/plugins/events-manager/templates and modify it in an upgrade-safe manner.
 * 
 * There are two variables made available to you: 
 * 
 * 	$calendar - contains an array of information regarding the calendar and is used to generate the content
 *  $args - the arguments passed to EM_Calendar::output()
 * 
 * Note that leaving the class names for the previous/next links will keep the AJAX navigation working.
 */
$cal_count = count($calendar['cells']); //to prevent an extra tr
$col_count = $tot_count = 1; //this counts collumns in the $calendar_array['cells'] array
$col_max = count($calendar['row_headers']); //each time this collumn number is reached, we create a new collumn, the number of cells should divide evenly by the number of row_headers
?>
<table class="em-calendar fullcalendar franklin-gothic-demi desktop ">
	<thead>
		<tr>
			<td class="prev-month" colspan="2"><a class="em-calnav full-link em-calnav-prev" href="<?php echo $calendar['links']['previous_url']; ?>"> &#8592; <span class="desktop">View events for <?php
			$month = $calendar['month_last'];
			$dateObj   = DateTime::createFromFormat('!m', $month);
			echo $dateObj->format('F');
			?></span></a></td>
			<td class="month_name kepler-italic" colspan="3">Events for <?php echo ucfirst(date_i18n(get_option('dbem_full_calendar_month_format'), $calendar['month_start'])); ?></td>
			<td class="next-month" colspan="2"><a class="em-calnav full-link em-calnav-next" href="<?php echo $calendar['links']['next_url']; ?>"><span class="desktop">View events for <?php
			$month = $calendar['month_next'];
			$dateObj   = DateTime::createFromFormat('!m', $month);
			echo $dateObj->format('F');
			?></span> &#8594;</a></td>
		</tr>
	</thead>
	<tbody>
		<tr class="days-names">
			<td><?php echo implode('</td><td>',$calendar['row_headers']); ?></td>
		</tr>
		<tr>
			<?php
			foreach($calendar['cells'] as $date => $cell_data ){
				$class = ( !empty($cell_data['events']) && count($cell_data['events']) > 0 ) ? 'eventful':'eventless';
				if(!empty($cell_data['type'])){
					$class .= "-".$cell_data['type']; 
				}
				//In some cases (particularly when long events are set to show here) long events and all day events are not shown in the right order. In these cases, 
				//if you want to sort events cronologically on each day, including all day events at top and long events within the right times, add define('EM_CALENDAR_SORTTIME', true); to your wp-config.php file 
				if( defined('EM_CALENDAR_SORTTIME') && EM_CALENDAR_SORTTIME ) ksort($cell_data['events']); //indexes are timestamps
				?>
				<td class="<?php echo $class; ?>">
					<?php if( !empty($cell_data['events']) && count($cell_data['events']) > 0 ): ?>
					<p class="day-number franklin-gothic-demi desktop"><?php echo date('j',$cell_data['date']); ?></p>
					<p class="day-number franklin-gothic-demi mobile"><?php echo date('F j',$cell_data['date']); ?></p>
					<ul>
						<?php echo EM_Events::output($cell_data['events'],array('format'=>get_option('dbem_full_calendar_event_format'))); ?>
						<?php if( $args['limit'] && $cell_data['events_count'] > $args['limit'] && get_option('dbem_display_calendar_events_limit_msg') != '' ): ?>
						<li><a href="<?php echo esc_url($cell_data['link']); ?>"><?php echo get_option('dbem_display_calendar_events_limit_msg'); ?></a></li>
						<?php endif; ?>
					</ul>
					<?php else:?>
					<p class="day-number"><?php echo date('j',$cell_data['date']); ?></p>
					<?php endif; ?>
				</td>
				<?php
				//create a new row once we reach the end of a table collumn
				$col_count= ($col_count == $col_max ) ? 1 : $col_count+1;
				echo ($col_count == 1 && $tot_count < $cal_count) ? '</tr><tr>':'';
				$tot_count ++; 
			}
			?>
		</tr>
	</tbody>
</table>

<div class="em-calendar fullcalendar franklin-gothic-demi mobile">
	<a class="em-calnav full-link em-calnav-prev" href="<?php echo $calendar['links']['previous_url']; ?>"> &#8592;</span></a>
	<h2 class="kepler-bold-italic title">Events for <?php echo ucfirst(date_i18n(get_option('dbem_full_calendar_month_format'), $calendar['month_start'])); ?></h2>
	<a class="em-calnav full-link em-calnav-next" href="<?php echo $calendar['links']['next_url']; ?>">&#8594;</a>
</div>
<ul class="mobile">
	<?php
		foreach($calendar['cells'] as $date => $cell_data ){
			$class = ( !empty($cell_data['events']) && count($cell_data['events']) > 0 ) ? 'eventful':'eventless';
			if(!empty($cell_data['type'])){
				$class .= "-".$cell_data['type']; 
			}
			//In some cases (particularly when long events are set to show here) long events and all day events are not shown in the right order. In these cases, 
			//if you want to sort events cronologically on each day, including all day events at top and long events within the right times, add define('EM_CALENDAR_SORTTIME', true); to your wp-config.php file 
			if( defined('EM_CALENDAR_SORTTIME') && EM_CALENDAR_SORTTIME ) ksort($cell_data['events']); //indexes are timestamps
			?>
			<div class="<?php echo $class; ?>">
				<?php if( !empty($cell_data['events']) && count($cell_data['events']) > 0 ): ?>
				<li class="day-number franklin-gothic-demi desktop"><?php echo date('j',$cell_data['date']); ?></li>
				<li class="day-number franklin-gothic-demi mobile"><?php echo date('F j',$cell_data['date']); ?></li>
				<ul >
					<?php echo EM_Events::output($cell_data['events'],array('format'=>get_option('dbem_full_calendar_event_format'))); ?>
					<?php if( $args['limit'] && $cell_data['events_count'] > $args['limit'] && get_option('dbem_display_calendar_events_limit_msg') != '' ): ?>
					<li><a href="<?php echo esc_url($cell_data['link']); ?>"><?php echo get_option('dbem_display_calendar_events_limit_msg'); ?></a></li>
					<?php endif; ?>
				</ul>
				<?php else:?>
				
				<?php endif; ?>
			</div>
			<?php
			//create a new row once we reach the end of a table collumn
			$col_count= ($col_count == $col_max ) ? 1 : $col_count+1;
			echo ($col_count == 1 && $tot_count < $cal_count) ? '</tr><tr>':'';
			$tot_count ++; 
		}
		?>

</ul>


