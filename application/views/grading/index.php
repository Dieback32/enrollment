<!DOCTYPE html>
<html>
<head>
	<title>Grading</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<!-- styles -->
	<!-- datatables -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-12" style="height:600px; overflow: hidden; overflow-y: auto">

			<h4 style="margin-top:25px">Grading System</h4>
			<hr>
			<h5>Subject Name: <?php echo $subject[0]->subject?></h5>
			<ul class="nav nav-tabs gradeTabs" role="tablist">
				<?php if ($_GET['sem'] == '1'): ?>
					<li class="active">
						<a href="#f1" role="tab" data-toggle="tab" data-quarter="1"
						   data-subj="<?php echo $subject[0]->id ?>">
							<icon class="fa fa-home"></icon>
							First Quarter
						</a>
					</li>
					<li><a href="#f2" role="tab" data-toggle="tab" data-quarter="2"
					       data-subj="<?php echo $subject[0]->id ?>">
							<i class="fa fa-user"></i> Second Quarter
						</a>
					</li>
				<?php elseif ($_GET['sem'] == '2'): ?>
					<li class="active">
						<a href="#f3" role="tab" data-toggle="tab" data-quarter="3"
						   data-subj="<?php echo $subject[0]->id ?>">
							<i class="fa fa-envelope"></i> Third Quarter
						</a>
					</li>
					<li>
						<a href="#f4" role="tab" data-toggle="tab" data-quarter="4"
						   data-subj="<?php echo $subject[0]->id ?>">
							<i class="fa fa-cog"></i> Fourth Quarter
						</a>
					</li>
				<?php endif ?>
			</ul>

			<style>
				.grading th, td {
					font-size: 10px;
				}
			</style>
			<!-- Tab panes -->
			<div class="tab-content" style="padding-top:5px">
				<?php
				$syId = $this->db->get_where('enrollment', array('status' => 1, 'end' => 1))->result_array()[0];
				?>
				<?php for ($i = 1; $i <= 4; $i++): ?>
					<div class="tab-pane fade
                        <?php
					if ($i == 1 && $_GET['sem'] == 1) {
						echo 'active';
					} else if ($i == 3 && $_GET['sem'] == 2) {
						echo 'active';
					}
					$hps = @$this->db->get_where('subject_hps', array('subjectId' => $id, 'quarter' => $i, 'sy' => $syId['sy']))->result()[0];
					?>

                        in" id="f<?php echo $i ?>">

						<?php
							$sy = $this->db->get_where('enrollment', array(
								'status' => 1,
								'end' => 1
							))->result_array();

						?>
						<?php if(!@$sy[0]['sy']):?>
						<h1 class="text-center">Grading System is Closed!</h1>
						<?php else: ?>
						<table class="table table-bordered table-responsive grading" data-quarter="<?php echo $i ?>">
							<thead>
							<tr>
								<td rowspan="2">Learner's Name</td>
								<td colspan="13">Written Work (<?php echo $subject[0]->written_work ?> %)</td>
								<td colspan="13">Performance Task (<?php echo $subject[0]->performance_task ?> %)</td>
								<td colspan="3" class="qa-assessment-percentage"
								    data-value="<?php echo $subject[0]->quarterly_assesment ?>">Quarterly Assesment
									(<?php echo $subject[0]->quarterly_assesment ?> %)
								</td>
								<td rowspan="3">Initial Grade</td>
								<td rowspan="3">Quarterly Grade</td>
							</tr>
							<tr>
								<td>1</td>
								<td>2</td>
								<td>3</td>
								<td>4</td>
								<td>5</td>
								<td>6</td>
								<td>7</td>
								<td>8</td>
								<td>9</td>
								<td>10</td>
								<td>Total</td>
								<td>PS</td>
								<td>WS</td>

								<td>1</td>
								<td>2</td>
								<td>3</td>
								<td>4</td>
								<td>5</td>
								<td>6</td>
								<td>7</td>
								<td>8</td>
								<td>9</td>
								<td>10</td>
								<td>Total</td>
								<td>PS</td>
								<td>WS</td>

								<td>1</td>
								<td>PS</td>
								<td>WS</td>
							</tr>
							<tr class="highestPossibleScore" data-quarter="<?php echo $i ?>">
								<td>Highest Posible Score</td>
								<td contenteditable="true" class="ww"><?php echo @$hps->w1 ?></td>
								<td contenteditable="true" class="ww"><?php echo @$hps->w2 ?></td>
								<td contenteditable="true" class="ww"><?php echo @$hps->w3 ?></td>
								<td contenteditable="true" class="ww"><?php echo @$hps->w4 ?></td>
								<td contenteditable="true" class="ww"><?php echo @$hps->w5 ?></td>
								<td contenteditable="true" class="ww"><?php echo @$hps->w6 ?></td>
								<td contenteditable="true" class="ww"><?php echo @$hps->w7 ?></td>
								<td contenteditable="true" class="ww"><?php echo @$hps->w8 ?></td>
								<td contenteditable="true" class="ww"><?php echo @$hps->w9 ?></td>
								<td contenteditable="true" class="ww"><?php echo @$hps->w10 ?></td>
								<td class="firstQuarterWWTotal"><?php echo @$hps->wtotal ?></td>
								<td>--</td>
								<td class="firstQuarterPTTotalP"
								    data-value="<?php echo $subject[0]->written_work ?>"><?php echo $subject[0]->written_work ?>
									%
								</td>


								<td contenteditable="true" class="pt"><?php echo @$hps->p1 ?></td>
								<td contenteditable="true" class="pt"><?php echo @$hps->p2 ?></td>
								<td contenteditable="true" class="pt"><?php echo @$hps->p3 ?></td>
								<td contenteditable="true" class="pt"><?php echo @$hps->p4 ?></td>
								<td contenteditable="true" class="pt"><?php echo @$hps->p5 ?></td>
								<td contenteditable="true" class="pt"><?php echo @$hps->p6 ?></td>
								<td contenteditable="true" class="pt"><?php echo @$hps->p7 ?></td>
								<td contenteditable="true" class="pt"><?php echo @$hps->p8 ?></td>
								<td contenteditable="true" class="pt"><?php echo @$hps->p9 ?></td>
								<td contenteditable="true" class="pt"><?php echo @$hps->p10 ?></td>
								<td class="firstQuarterPTTotal"><?php echo @$hps->ptotal ?></td>
								<td>--</td>
								<td class="firstQuarterPTTotalPt"
								    data-value="<?php echo $subject[0]->performance_task ?>"
								    class=""><?php echo $subject[0]->performance_task ?>%
								</td>

								<td contenteditable="true" class="qa"><?php echo @$hps->q1 ?></td>
								<td>--</td>
								<td class=""><?php echo $subject[0]->quarterly_assesment ?> %</td>
							</tr>
							</thead>
							<tbody class="studentLists" data-quarter="<?php echo $i ?>">
							<?php foreach ($learners as $learner): ?>
								<tr class="learner-row" data-id="<?php echo $learner->id ?>"
								    data-quarter="<?php echo $i ?>">
									<?php
									$grade = $this->db->get_where('grades', array(
										'studentId' => $learner->id,
										'subjectId' =>  $subject[0]->id,
										'quarter' => $i,
										'syId' => $syId['sy']
									))->result();
									if (COUNT($grade) == 0) {
										$grade = array();
									} else {
										$grade = $grade[0];
									}
									?>
									<td><?php echo $learner->fname ?></td>
									<td contenteditable="true" class="ww"><?php echo @$grade->w1 ?></td>
									<td contenteditable="true" class="ww"><?php echo @$grade->w2 ?></td>
									<td contenteditable="true" class="ww"><?php echo @$grade->w3 ?></td>
									<td contenteditable="true" class="ww"><?php echo @$grade->w4 ?></td>
									<td contenteditable="true" class="ww"><?php echo @$grade->w5 ?></td>
									<td contenteditable="true" class="ww"><?php echo @$grade->w6 ?></td>
									<td contenteditable="true" class="ww"><?php echo @$grade->w7 ?></td>
									<td contenteditable="true" class="ww"><?php echo @$grade->w8 ?></td>
									<td contenteditable="true" class="ww"><?php echo @$grade->w9 ?></td>
									<td contenteditable="true" class="ww"><?php echo @$grade->w10 ?></td>
									<td class="learner-ww"><?php echo @$grade->wTotal ?></td>
									<td class="learner-ps-ww"><?php echo @$grade->wwps ?></td>
									<td class="learner-ww-p"><?php echo @$grade->wwws ?></td>


									<td contenteditable="true" class="pt"><?php echo @$grade->p1 ?></td>
									<td contenteditable="true" class="pt"><?php echo @$grade->p2 ?></td>
									<td contenteditable="true" class="pt"><?php echo @$grade->p3 ?></td>
									<td contenteditable="true" class="pt"><?php echo @$grade->p4 ?></td>
									<td contenteditable="true" class="pt"><?php echo @$grade->p5 ?></td>
									<td contenteditable="true" class="pt"><?php echo @$grade->p6 ?></td>
									<td contenteditable="true" class="pt"><?php echo @$grade->p7 ?></td>
									<td contenteditable="true" class="pt"><?php echo @$grade->p8 ?></td>
									<td contenteditable="true" class="pt"><?php echo @$grade->p9 ?></td>
									<td contenteditable="true" class="pt"><?php echo @$grade->p10 ?></td>
									<td class="learner-pt"><?php echo @$grade->pTotal ?></td>
									<td class="learner-ps-pt"><?php echo @$grade->ptps ?></td>
									<td class="learner-pt-p"><?php echo @$grade->ptws ?></td>

									<td contenteditable="true" class="qa"><?php echo @$grade->q1 ?></td>
									<td class="learner-ps-qa"><?php echo @$grade->qaps ?></td>
									<td class="learner-qa"><?php echo @$grade->qaws ?></td>
									<td class="learner-ig"><?php echo @$grade->initialGrade ?></td>
									<td class="learning-init-grade"><?php echo @$grade->qg ?></td>
								</tr>
							<?php endforeach ?>
							</tbody>
						</table>
						<?php endif?>
					</div>
				<?php endfor ?>
			</div>
		</div>
		<div class="col-md-12">
			<a href="<?php echo base_url() ?>index.php/Dashboard" class="btn btn-primary btn-sm">Back</a>
			<button class="btn btn-primary btn-sm save-grade-btn">Save Grades</button>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		var calculateHPS = function (e) {
			quarter = $(e.currentTarget).parents('.highestPossibleScore').attr('data-quarter');
			var WWtotal = 0;
			var PTtotal = 0;
			var QATotal = 0;
			$.each($('.highestPossibleScore[data-quarter="' + quarter + '"]').children('.ww'), function (index, value) {
				if (isNaN($(value).html())) {
					$(value).html('0');
					alert('Input Should Contains Number Only')
				} else {
					WWtotal += Number($(value).html());
				}
			});

			$.each($('.highestPossibleScore[data-quarter="' + quarter + '"]').children('.pt'), function (index, value) {
				if (isNaN($(value).html())) {
					$(value).html('0');
					alert('Input Should Contains Number Only')
				} else {
					PTtotal += Number($(value).html());
				}
			});

			$.each($('.highestPossibleScore[data-quarter="' + quarter + '"]').children('.qa'), function (index, value) {
				if (isNaN($(value).html())) {
					$(value).html('0');
					alert('Input Should Contains Number Only')
				} else {
					QATotal += Number($(value).html());
				}
			});

			$('.highestPossibleScore[data-quarter="' + quarter + '"]').find('.firstQuarterWWTotal').html(WWtotal);
			$('.highestPossibleScore[data-quarter="' + quarter + '"]').find('.firstQuarterPTTotal').html(PTtotal);
		}

		var calculateLR = function (e) {

		}

		$('.highestPossibleScore td').on('input', function (e) {
			calculateHPS(e);
		});


		$('.learner-row td').on('input', function (e) {
			index = Number($(this).index());
			quarter = $(e.currentTarget).parent().attr('data-quarter');

			var wwhighestPossibleScore = $('.highestPossibleScore[data-quarter="' + quarter + '"]').children().eq((index)).html();
			var WWtotalHighestPosibleScore = $('.highestPossibleScore[data-quarter="' + quarter + '"]').children('.firstQuarterWWTotal').html();
			var wwPercentage = $('.highestPossibleScore[data-quarter="' + quarter + '"]').children('.firstQuarterPTTotalP').attr('data-value');

			input = $(e.currentTarget).html();
			if (Number(wwhighestPossibleScore) < Number(input) && $(e.currentTarget).attr('class') == 'ww') {
				alert('Invalid Input');
				$(e.currentTarget).html(0);
			} else {
				var WWtotal = 0;
				$.each($(e.currentTarget).parent().children('td.ww'), function (index, value) {
					if (isNaN($(value).html())) {
						$(value).html('0');
						alert('Input Should Contains Number Only')
					} else {
						WWtotal += Number($(value).html());
					}
				});
				wwPercentage = Number(((WWtotal / WWtotalHighestPosibleScore) * 100) * (wwPercentage / 100));
				$(e.currentTarget).parent().children('td.learner-ww').html(WWtotal);
				$(e.currentTarget).parent().children('td.learner-ww-p').html(wwPercentage.toFixed(2));

			}

			var pthighestPossibleScore = $('.highestPossibleScore[data-quarter="' + quarter + '"]').children().eq((index)).html();
			var pttotalHighestPosibleScore = $('.highestPossibleScore[data-quarter="' + quarter + '"]').children('.firstQuarterPTTotal').html();
			var ptPercentage = $('.highestPossibleScore[data-quarter="' + quarter + '"]').children('.firstQuarterPTTotalPt').attr('data-value');

			if (Number(pthighestPossibleScore) < Number(input) && $(e.currentTarget).attr('class') == 'pt') {
				alert('Invalid Input');
				$(e.currentTarget).html(0);
			} else {

				var PTtotal = 0;
				$.each($(e.currentTarget).parent().children('td.pt'), function (index, value) {
					if (isNaN($(value).html())) {
						$(value).html('0');
						alert('Input Should Contains Number Only')
					} else {
						PTtotal += Number($(value).html());
					}
				});
				ptPercentage = Number(((PTtotal / pttotalHighestPosibleScore) * 100) * (ptPercentage / 100));
				$(e.currentTarget).parent().children('td.learner-pt').html(PTtotal);
				$(e.currentTarget).parent().children('td.learner-pt-p').html(ptPercentage.toFixed(2));


			}


			// var qaTotal =

			var qaTotal = 0;
			var qaFinal = 0;
			$.each($('.highestPossibleScore[data-quarter="' + quarter + '"]').children('.qa'), function (index, value) {
				if (!isNaN($(value).html())) {
					qaTotal += Number($(value).html());
				}
			});

			if ($(e.currentTarget).attr('class') == 'qa') {
				var qahighestPosibleScore = Number($('.highestPossibleScore[data-quarter="' + quarter + '"]').children().eq(index).html());
				if (qahighestPosibleScore < Number(input)) {
					alert('Invalid Input');
					$(e.currentTarget).html(0);
				} else {
					var inputQa = 0;
					$.each($(e.currentTarget).parent().children('td.qa'), function (index, value) {
						if (isNaN($(value).html())) {
							$(value).html('0');
							alert('Input Should Contains Number Only')
						} else {
							inputQa += Number($(value).html());
//
						}
					});

					var qaPercentage = Number($('.qa-assessment-percentage').attr('data-value'));
					var temp = Number(((inputQa / qaTotal) * 100) * (qaPercentage / 100));

					qaFinal = temp;
				}
			}

			if (qaFinal == 0) {
				qaFinal = isNaN($(e.currentTarget).parent().children().eq(29).html()) ? 0 : Number($(e.currentTarget).parent().children().eq(29).html());
				$(e.currentTarget).parent().children('td.learner-qa').html(qaFinal.toFixed(2));
			} else {
				$(e.currentTarget).parent().children('td.learner-qa').html(qaFinal.toFixed(2));
			}

			var wwfinal = isNaN($(e.currentTarget).parent().children().eq(13).html()) ? 0 : Number($(e.currentTarget).parent().children().eq(13).html());
			var ptfinal = isNaN($(e.currentTarget).parent().children().eq(26).html()) ? 0 : Number($(e.currentTarget).parent().children().eq(26).html());
			var total = wwfinal + ptfinal + qaFinal;


			var wwPS = (WWtotal / WWtotalHighestPosibleScore) * 100;
			var ptPS = (PTtotal / pttotalHighestPosibleScore) * 100;
			var ptQA = (Number($(e.currentTarget).parent().children().eq(27).html()) / qaTotal) * 100;

			$(e.currentTarget).parent().children().eq(12).html(wwPS.toFixed(2));
			$(e.currentTarget).parent().children().eq(25).html(ptPS.toFixed(2));
			$(e.currentTarget).parent().children().eq(28).html(ptQA.toFixed(2));

			$(e.currentTarget).parent().children('.learner-ig').html(total.toFixed(2));

			var evaluate = function (grade) {
				var $grade = Number(grade);

				if ($grade == 100) {
					ret = 100;
				} else if ($grade >= 98.40 && $grade <= 99.99) {

					ret = 99;
				} else if ($grade >= 96.80 && $grade <= 98.39) {

					ret = 98;
				} else if ($grade >= 95.20 && $grade <= 96.79) {

					ret = 97;
				} else if ($grade >= 93.60 && $grade <= 95.19) {

					ret = 96;
				} else if ($grade >= 92.00 && $grade <= 93.59) {

					ret = 95;
				} else if ($grade >= 90.40 && $grade <= 91.99) {

					ret = 94;
				} else if ($grade >= 88.80 && $grade <= 90.39) {

					ret = 93;
				} else if ($grade >= 87.20 && $grade <= 88.79) {

					ret = 92;
				} else if ($grade >= 85.60 && $grade <= 87.19) {

					ret = 91;
				} else if ($grade >= 84.00 && $grade <= 85.59) {

					ret = 90;
				} else if ($grade >= 82.40 && $grade <= 83.99) {

					ret = 89;
				} else if ($grade >= 80.80 && $grade <= 82.39) {

					ret = 88;
				} else if ($grade >= 79.20 && $grade <= 80.79) {

					ret = 87;
				} else if ($grade >= 77.60 && $grade <= 79.19) {

					ret = 86;
				} else if ($grade >= 76.00 && $grade <= 77.59) {

					ret = 85;
				} else if ($grade >= 74.40 && $grade <= 75.99) {

					ret = 84;
				} else if ($grade >= 72.80 && $grade <= 74.39) {

					ret = 83;
				} else if ($grade >= 71.20 && $grade <= 72.79) {

					ret = 82;
				} else if ($grade >= 69.60 && $grade <= 71.19) {

					ret = 81;
				} else if ($grade >= 68.00 && $grade <= 69.59) {

					ret = 80;
				} else if ($grade >= 66.40 && $grade <= 67.99) {

					ret = 79;
				} else if ($grade >= 65.80 && $grade <= 66.39) {

					ret = 78;
				} else if ($grade >= 63.20 && $grade <= 64.79) {

					ret = 77;
				} else if ($grade >= 61.60 && $grade <= 63.19) {

					ret = 76;
				} else if ($grade >= 60.60 && $grade <= 61.59) {

					ret = 75;
				} else if ($grade >= 56 && $grade <= 59.99) {

					ret = 74;
				} else if ($grade >= 52 && $grade <= 55.99) {

					ret = 73;
				} else if ($grade >= 48 && $grade <= 51.99) {

					ret = 72;
				} else if ($grade >= 44 && $grade <= 47.99) {

					ret = 71;
				} else if ($grade >= 40 && $grade <= 43.99) {

					ret = 70;
				} else if ($grade >= 36 && $grade <= 39.99) {

					ret = 69;
				} else if ($grade >= 32 && $grade <= 35.99) {

					ret = 68;
				} else if ($grade >= 28 && $grade <= 31.99) {

					ret = 67;
				} else if ($grade >= 24 && $grade <= 27.99) {

					ret = 66;
				} else if ($grade >= 20 && $grade <= 23.99) {

					ret = 65;
				} else if ($grade >= 16 && $grade <= 19.99) {

					ret = 64;
				} else if ($grade >= 12 && $grade <= 15.99) {

					ret = 63;
				} else if ($grade >= 8 && $grade <= 11.99) {

					ret = 62;
				} else if ($grade >= 4 && $grade <= 7.99) {

					ret = 61;
				} else if ($grade >= 0 && $grade <= 3.99) {

					ret = 60;
				}
				return ret;
			}
			$(e.currentTarget).parent().children('.learning-init-grade').html(evaluate(total.toFixed(2)));


		});

		$('.save-grade-btn').click(function () {
			var quarter = $($('.gradeTabs').children('.active')[0]).find('a').attr('data-quarter');
			var subjectId = $($('.gradeTabs').children('.active')[0]).find('a').attr('data-subj');

			var highestPossibleScoreWw = [];
			var highestPossibleScorePt = [];
			var highestPossibleScoreQa = [];

			var hpsww = $($('.grading')[quarter - 1]).find('.highestPossibleScore').children('.ww');
			var hpspt = $($('.grading')[quarter - 1]).find('.highestPossibleScore').children('.pt');
			var hpsqa = $($('.grading')[quarter - 1]).find('.highestPossibleScore').children('.qa');

			var hpswwTotal = $($('.grading')[quarter - 1]).find('.highestPossibleScore').children('.firstQuarterWWTotal').html();
			var hpsptTotal = $($('.grading')[quarter - 1]).find('.highestPossibleScore').children('.firstQuarterPTTotal').html();

			$.each(hpsww, function (index, value) {
				if (Number($(value).html()) > 0) {
					highestPossibleScoreWw.push(Number($(value).html()));
				} else {
					highestPossibleScoreWw.push(0);
				}
			});

			$.each(hpspt, function (index, value) {
				if (Number($(value).html()) > 0) {
					highestPossibleScorePt.push(Number($(value).html()));
				} else {
					highestPossibleScorePt.push(0);
				}
			});

			$.each(hpsqa, function (index, value) {
				if (Number($(value).html()) > 0) {
					highestPossibleScoreQa.push(Number($(value).html()));
				} else {
					highestPossibleScoreQa.push(0);
				}
			});

			var formData = {
				quarter: quarter,
				subjectId: subjectId,
				hpsww: highestPossibleScoreWw,
				hpswwTotal: hpswwTotal,
				hpspt: highestPossibleScorePt,
				hpsptTotal: hpsptTotal,
				hpsqa: highestPossibleScoreQa
			};

			$.ajax({
				url: '<?php echo base_url() . 'index.php/grading/saveGrade'?>',
				type: 'POST',
				data: {
					formData: formData
				},
			}).done(function (response) {
				$.each($('.studentLists [data-quarter="' + quarter + '"]'), function (e) {
					var studentId = $(this).attr('data-id');
					// console.log(studentId);
					var row = $(this);
					var wwScore = [];
					var ptScore = [];
					var qaScore = [];
					$.each(row, function (index, value) {
						$.each($(value).children('.ww'), function (index, ww) {
							wwScore.push($(ww).html() == '' ? 0 : Number($(ww).html()));
						});
						$.each($(value).children('.pt'), function (index, pt) {
							ptScore.push($(pt).html() == '' ? 0 : Number($(pt).html()));
						});
						$.each($(value).children('.qa'), function (index, qa) {
							qaScore.push($(qa).html() == '' ? 0 : Number($(qa).html()));
						});
					});

					var wTotal = Number($(row).find('.learner-ww').html())
					var pTotal = Number($(row).find('.learner-pt').html());
					var initialGrade = Number($(row).find('.learner-ig').html());
					var wwws = Number($(row).find('.learner-ww-p').html());
					var ptws = Number($(row).find('.learner-pt-p').html());
					var qaws = Number($(row).find('.learner-qa').html());
					var qaps = Number($(row).find('.learner-ps-qa').html());


					var wwps = Number($(row).find('.learner-ps-ww').html());
					var ptps = Number($(row).find('.learner-ps-pt').html());
					var qg = Number($(row).find('.learning-init-grade').html());

					var grade = {
						subjectId: subjectId,
						studentId: studentId,
						quarter: quarter,
						wwScore: wwScore,
						ptScore: ptScore,
						qaScore: qaScore,
						initialGrade: initialGrade,
						wTotal: wTotal,
						pTotal: pTotal,
						wwws: wwws,
						ptws: ptws,
						wwps: wwps,
						ptps: ptps,
						qaws: qaws,
						qaps: qaps,
						qg: qg,
					};

					$.ajax({
						url: '<?php echo base_url() . 'index.php/grading/insertGrade'?>',
						type: 'POST',
						data: {
							formData: grade
						},
					}).done(function () {

					})

				});


				alert('Saving Grades Completed!');
			});


		})

	});


</script>
</body>
</html>