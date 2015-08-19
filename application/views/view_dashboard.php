<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title">
					<h1>Dashboard
						<small>Content Overview</small><br>
					</h1>
					<ol class="breadcrumb">
						<li class="active"><i class="fa fa-dashboard"></i>&emsp;Welcome, <?php echo $username;?></li>
						<li class="pull-right">
							<div id="reportrange" class="btn btn-green btn-square date-picker">
								<i class="fa fa-calendar"></i>
								<span class="date-range">&emsp;<?php echo date('l\, jS \of F Y'); ?></span> <i class="fa fa-caret-down"></i>
							</div>
						</li>
					</ol>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-4 col-sm-6">
				<div class="circle-tile">
					<a href="#">
						<div class="circle-tile-heading dark-blue">
							<i class="fa fa-bell fa-fw fa-3x"></i>
						</div>
					</a>
					<div class="circle-tile-content dark-blue">
						<div class="circle-tile-description text-faded">
							Courses Enrolled
						</div>
						<div class="circle-tile-number text-faded">
							<!-- <?php if(isset($NoOfCourses) == "") { echo "0"; } else { echo $NoOfCourses; } ?> -->
							<?php echo isset($NoOfCourses) == "" ? "0" : $NoOfCourses ?>
						</div>
						<a href="#" class="circle-tile-footer" onclick="toggler('courseList');">More Info&nbsp;<i class="fa fa-chevron-circle-right"></i></a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6">
				<div class="circle-tile">
					<a href="#">
						<div class="circle-tile-heading green">
							<i class="fa fa-tasks fa-fw fa-3x"></i>
						</div>
					</a>
					<div class="circle-tile-content green">
						<div class="circle-tile-description text-faded">
							New Courses Assigned to you
						</div>
						<div class="circle-tile-number text-faded">
							2 (dummy data)
							<span id="sparklineB"><canvas height="24" width="24" style="display: inline-block; width: 24px; height: 24px; vertical-align: top;"></canvas></span>
						</div>
						<a href="#" class="circle-tile-footer">More Info&nbsp;<i class="fa fa-chevron-circle-right"></i></a>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-sm-6">
				<div class="circle-tile">
					<a href="#">
						<div class="circle-tile-heading blue">
							<i class="fa fa-comments fa-fw fa-3x"></i>
						</div>
					</a>
					<div class="circle-tile-content blue">
						<div class="circle-tile-description text-faded">
							Groups
						</div>
						<div class="circle-tile-number text-faded">
							2
							<span id="sparklineD"><canvas height="24" width="36" style="display: inline-block; width: 36px; height: 24px; vertical-align: top;"></canvas></span>
						</div>
						<a href="#" class="circle-tile-footer">More Info&nbsp;<i class="fa fa-chevron-circle-right"></i></a>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-9" id="courseList">
				<div class="tile checklist-tile courseL">
					<h4><i class="fa fa-check-square-o"></i>Course List</h4>
					<div class="checklist">
						
						<?php 
						if (isset($user_courses[0]->courseName) == 0) {
							?>
							<div class="form-group">
								<label>You have enrolled in 0 courses.</label>
							</div>
							<?php
						} else {
							foreach ($user_courses as $usercourse) {
								?>
								<div class="form-group">
									<a href="learning/?lid=<?php echo $usercourse->courseID; ?>" class="courseLink">
										<label><i class="fa fa-list"></i>&emsp;<?php echo $usercourse->courseName; ?></label>
									</a>
								</div>
								<?php
							}
						}
						?>
					</div>
<!-- 					<div class="checklist">
						<div class="form-group">
							<input type="checkbox" class="isChecked" checked>
							<label class="strikeout">
								<i class="fa fa-wrench fa-fw text-faded"></i>Software Update 2.1
							</label>
							<span class="task-time text-faded pull-right">Yesterday</span>
						</div>
						<div class="form-group">
							<input type="checkbox" class="isChecked" checked>
							<label class="strikeout">
								<i class="fa fa-wrench fa-fw text-faded"></i> Server #2 Hardward Upgrade
							</label>
							<span class="task-time text-faded pull-right">9:39 AM</span>
						</div>
						<div class="form-group">
							<input type="checkbox" class="isChecked" checked>
							<label class="strikeout">
								<i class="fa fa-warning fa-fw text-orange"></i> Call Ticket #2032
							</label>
							<span class="task-time text-faded pull-right">9:53 AM</span>
						</div>
						<div class="form-group">
							<input type="checkbox" class="isChecked">
							<label class="strikeout">
								<i class="fa fa-warning fa-fw text-orange"></i> Emergency Maintenance
							</label>
							<span class="task-time text-faded pull-right">10:14 AM</span>
						</div>
						<div class="form-group">
							<input type="checkbox" class="isChecked">
							<label class="strikeout">
								<i class="fa fa-file fa-fw text-faded"></i> Purchase Order #439
							</label>
							<span class="task-time text-faded pull-right">10:20 AM</span>
						</div>
						<div class="form-group">
							<input type="checkbox" class="isChecked">
							<label class="strikeout">
								<i class="fa fa-pencil fa-fw text-faded"></i> March Content Update
							</label>
							<span class="task-time text-faded pull-right">10:48 AM</span>
						</div>
						<div class="form-group">
							<input type="checkbox" class="isChecked">
							<label class="strikeout">
								<i class="fa fa-magic fa-fw text-faded"></i> Client #42 Data Scrubbing
							</label>
							<span class="task-time text-faded pull-right">11:09 AM</span>
						</div>
						<div class="form-group">
							<input type="checkbox" class="isChecked">
							<label class="strikeout">
								<i class="fa fa-wrench fa-fw text-faded"></i> PHP Upgrade Server #6
							</label>
							<span class="task-time text-faded pull-right">11:17 AM</span>
						</div>
					</div> -->
				</div>
			</div>

			<div class="col-lg-3">
				<div class="tile checklist-tile cal" style="height: 200px">
					<p class="time-widget">
						<span class="time-widget-heading">It Is Currently</span>
						<br>
						<strong>
							<span id="datetime">
								<?php echo date("l M d, Y"); ?>
								<br>
								<?php echo date("h:i:s A"); ?>
							</span>
						</strong>
					</p>
				</div>
			</div>

		</div>
		<!-- /.row -->
	</div>
	<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script>
$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
});
function toggler(courseList) {
	$("#" + courseList).toggle("slow");
}
</script>
</body>
</html>