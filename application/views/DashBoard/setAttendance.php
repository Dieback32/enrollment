<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">
					<i class="fa fa fa-bars"></i> Set Student Attendance
				</h3>
			</div>
		</div>
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading"></header>
					<div class="panel-body">
						<table class="table table-bordered">
							<thead>
							<tr>
								<th>Days</th>
								<th>June</th>
								<th>July</th>
								<th>Aug</th>
								<th>Sept</th>
								<th>Oct</th>
								<th>Nov</th>
								<th>Dec</th>
								<th>Jan</th>
								<th>Feb</th>
								<th>Mar</th>
								<th>Total</th>
							</tr>
							</thead>
							<tbody>
							<tr class="attendanceS">
								<td>No. of School Days</td>
								<td contentEditable="true" data-num="1"><?php echo @$attendance[0]['juneS'] > 0 ? @$attendance[0]['juneS'] : 0 ?></td>
								<td contentEditable="true" data-num="2"><?php echo @$attendance[0]['julyS'] > 0 ? @$attendance[0]['julyS'] : 0 ?></td>
								<td contentEditable="true" data-num="3"><?php echo @$attendance[0]['augustS'] > 0 ? @$attendance[0]['augustS'] : 0 ?></td>
								<td contentEditable="true" data-num="4"><?php echo @$attendance[0]['septemberS'] > 0 ? @$attendance[0]['septemberS'] : 0 ?></td>
								<td contentEditable="true" data-num="5"><?php echo @$attendance[0]['octoberS'] > 0 ? @$attendance[0]['octoberS'] : 0 ?></td>
								<td contentEditable="true" data-num="6"><?php echo @$attendance[0]['novemberS'] > 0 ? @$attendance[0]['novemberS'] : 0 ?></td>
								<td contentEditable="true" data-num="7"><?php echo @$attendance[0]['decemberS'] > 0 ? @$attendance[0]['decemberS'] : 0 ?></td>
								<td contentEditable="true" data-num="8"><?php echo @$attendance[0]['januaryS'] > 0 ? @$attendance[0]['januaryS'] : 0 ?></td>
								<td contentEditable="true" data-num="9"><?php echo @$attendance[0]['februaryS'] > 0 ? @$attendance[0]['februaryS'] : 0 ?></td>
								<td contentEditable="true" data-num="10"><?php echo @$attendance[0]['marchS'] > 0 ? @$attendance[0]['marchS'] : 0 ?></td>
								<td></td>
							</tr>

							<tr class="attendanceP">
								<td>No. of Days Present</td>
								<td contentEditable="true" data-num="1"><?php echo @$attendance[0]['juneP'] > 0 ? @$attendance[0]['juneP'] : 0 ?></td>
								<td contentEditable="true" data-num="2"><?php echo @$attendance[0]['julyP'] > 0 ? @$attendance[0]['julyP'] : 0 ?></td>
								<td contentEditable="true" data-num="3"><?php echo @$attendance[0]['augustP'] > 0 ? @$attendance[0]['augustP'] : 0 ?></td>
								<td contentEditable="true" data-num="4"><?php echo @$attendance[0]['septemberP'] > 0 ? @$attendance[0]['septemberP'] : 0 ?></td>
								<td contentEditable="true" data-num="5"><?php echo @$attendance[0]['octoberP'] > 0 ? @$attendance[0]['octoberP'] : 0 ?></td>
								<td contentEditable="true" data-num="6"><?php echo @$attendance[0]['novemberP'] > 0 ? @$attendance[0]['novemberP'] : 0 ?></td>
								<td contentEditable="true" data-num="7"><?php echo @$attendance[0]['decemberP'] > 0 ? @$attendance[0]['decemberP'] : 0 ?></td>
								<td contentEditable="true" data-num="8"><?php echo @$attendance[0]['januaryP'] > 0 ? @$attendance[0]['januaryP'] : 0 ?></td>
								<td contentEditable="true" data-num="9"><?php echo @$attendance[0]['februaryP'] > 0 ? @$attendance[0]['februaryP'] : 0 ?></td>
								<td contentEditable="true" data-num="10"><?php echo @$attendance[0]['marchP'] > 0 ? @$attendance[0]['marchP'] : 0 ?></td>
								<td></td>
							</tr>

							<tr class="attendanceA">
								<td><b>No. of Days Absent</b></td>
								<td contentEditable="false"><?php echo @$attendance[0]['juneA'] > 0 ? @$attendance[0]['juneA'] : 0 ?></td>
								<td contentEditable="false"><?php echo @$attendance[0]['julyA'] > 0 ? @$attendance[0]['julyA'] : 0 ?></td>
								<td contentEditable="false"><?php echo @$attendance[0]['augustA'] > 0 ? @$attendance[0]['augustA'] : 0 ?></td>
								<td contentEditable="false"><?php echo @$attendance[0]['septemberA'] > 0 ? @$attendance[0]['septemberA'] : 0 ?></td>
								<td contentEditable="false"><?php echo @$attendance[0]['octoberA'] > 0 ? @$attendance[0]['octoberA'] : 0 ?></td>
								<td contentEditable="false"><?php echo @$attendance[0]['novemberA'] > 0 ? @$attendance[0]['novemberA'] : 0 ?></td>
								<td contentEditable="false"><?php echo @$attendance[0]['decemberA'] > 0 ? @$attendance[0]['decemberA'] : 0 ?></td>
								<td contentEditable="false"><?php echo @$attendance[0]['januaryA'] > 0 ? @$attendance[0]['januaryA'] : 0 ?></td>
								<td contentEditable="false"><?php echo @$attendance[0]['februaryA'] > 0 ? @$attendance[0]['februaryA'] : 0 ?></td>
								<td contentEditable="false"><?php echo @$attendance[0]['marchA'] > 0 ? @$attendance[0]['marchA'] : 0 ?></td>
								<td></td>
							</tr>
							</tbody>
						</table>
						<div class="btn save-attendance btn-primary">Save Attenance</div>
					</div>
				</section>
			</div>
		</div>
		<!-- page end-->
	</section>
</section>

<script>
	$(document).ready(function(){
		var noOfSchoolDaysRaw = $('.attendanceS').children('td');
		var sTotal = 0;
		var aTotal = 0;
		var pTotal = 0;
		for(i=1; i<= 10; i ++){
			sTotal += Number($($('.attendanceS').children('td')[i]).html());
			aTotal += Number($($('.attendanceA').children('td')[i]).html());
			pTotal += Number($($('.attendanceP').children('td')[i]).html());
		}

		$($('.attendanceS').children('td')[11]).html(sTotal);
		$($('.attendanceP').children('td')[11]).html(pTotal);
		$($('.attendanceA').children('td')[11]).html(aTotal);

		var calculateS = function(e){
			var attendanceValue = 0;
			$.each($('.attendanceS').children('td'), function(index, value){
				// console.log(value);
				if(index <= 10){
					attendanceValue += isNaN(Number($(value).html())) ? 0 : Number($(value).html());
				}
			});
			$($('.attendanceS').children('td')[11]).html(attendanceValue);

			var col = $(e.originalEvent.target.outerHTML).attr('data-num');
			if(isNaN(parseFloat($($('.attendanceS').children('td')[col]).html()))){
				$($('.attendanceS').children('td')[col]).html(0);
				alert('Invalid input');
			}else{
				var shoolDays = Number($($('.attendanceS').children('td')[col]).html());
				var present = Number($($('.attendanceP').children('td')[col]).html());
				$($('.attendanceA').children('td')[col]).html(shoolDays - present);
			}
		};

		var calculateP = function(e){

			var attendanceValue = 0;
			$.each($('.attendanceP').children('td'), function(index, value){
				// console.log(value);
				if(index <= 10){
					attendanceValue += isNaN(Number($(value).html())) ? 0 : Number($(value).html());
				}
			});
			$($('.attendanceP').children('td')[11]).html(attendanceValue);
			var col = $(e.originalEvent.target.outerHTML).attr('data-num');
			if(isNaN(parseFloat($($('.attendanceP').children('td')[col]).html()))){
				$($('.attendanceP').children('td')[col]).html(0);
				alert('Invalid input');
			}else{
				var shoolDays = Number($($('.attendanceS').children('td')[col]).html());
				var present = Number($($('.attendanceP').children('td')[col]).html());
				var result = shoolDays - present;
				$($('.attendanceA').children('td')[col]).html(result.toFixed(2));
			}
		}

		$('.attendanceS').on('input', function(e){
			calculateS(e);
		});

		$('.attendanceP').on('input', function(e){
			calculateP(e);
		});

		$('.save-attendance').click(function(e){
			var noOfSchoolDaysRaw = $('.attendanceS').children('td');
			var noOfSchoolDays = {
				'juneS' : $(noOfSchoolDaysRaw[1]).html(),
				'julyS' : $(noOfSchoolDaysRaw[2]).html(),
				'augustS' : $(noOfSchoolDaysRaw[3]).html(),
				'septemberS' : $(noOfSchoolDaysRaw[4]).html(),
				'octoberS' : $(noOfSchoolDaysRaw[5]).html(),
				'novemberS' : $(noOfSchoolDaysRaw[6]).html(),
				'decemberS' : $(noOfSchoolDaysRaw[7]).html(),
				'januaryS' : $(noOfSchoolDaysRaw[8]).html(),
				'februaryS' : $(noOfSchoolDaysRaw[9]).html(),
				'marchS' : $(noOfSchoolDaysRaw[10]).html(),
			};

			var noOfPresentDaysRaw = $('.attendanceP').children('td');
			var noOfPresentDays = {
				'juneP' : $(noOfPresentDaysRaw[1]).html(),
				'julyP' : $(noOfPresentDaysRaw[2]).html(),
				'augustP' : $(noOfPresentDaysRaw[3]).html(),
				'septemberP' : $(noOfPresentDaysRaw[4]).html(),
				'octoberP' : $(noOfPresentDaysRaw[5]).html(),
				'novemberP' : $(noOfPresentDaysRaw[6]).html(),
				'decemberP' : $(noOfPresentDaysRaw[7]).html(),
				'januaryP' : $(noOfPresentDaysRaw[8]).html(),
				'februaryP' : $(noOfPresentDaysRaw[9]).html(),
				'marchP' : $(noOfPresentDaysRaw[10]).html(),
			};


			var noOfAbsentDaysRaw = $('.attendanceA').children('td');
			var noOfAbsenttDays = {
				'juneA' : $(noOfAbsentDaysRaw[1]).html(),
				'julyA' : $(noOfAbsentDaysRaw[2]).html(),
				'augustA' : $(noOfAbsentDaysRaw[3]).html(),
				'septemberA' : $(noOfAbsentDaysRaw[4]).html(),
				'octoberA' : $(noOfAbsentDaysRaw[5]).html(),
				'novemberA' : $(noOfAbsentDaysRaw[6]).html(),
				'decemberA' : $(noOfAbsentDaysRaw[7]).html(),
				'januaryA' : $(noOfAbsentDaysRaw[8]).html(),
				'februaryA' : $(noOfAbsentDaysRaw[9]).html(),
				'marchA' : $(noOfAbsentDaysRaw[10]).html(),
			};

			$.ajax({
				url: '<?php echo base_url()?>index.php/Dashboard/saveAttendance',
				method: 'POST',
				dataType: 'json',
				data : {
					'studentId' : '<?php echo $studentId?>',
					'syId' : '<?php echo $syId ?>',
					noOfSchoolDays: noOfSchoolDays,
					noOfPresentDays: noOfPresentDays,
					noOfAbsenttDays : noOfAbsenttDays,
				}
			}).done(function(response){
				if(response.result === 'success'){
					alert('Save Attendance Success.');
					window.location.reload();
				}
			})

		});


	})
</script>