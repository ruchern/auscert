<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Admin Page</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-8">
						<a href="<?php echo site_url('addCourse') ?>" class="btn btn-primary">Create new course</a>&emsp;
						Last modified: <i class="fa fa-clock-o"></i>&emsp;<?php echo $courseLastEdited[0]->courseName . "&emsp;" . $courseLastEdited[0]->lastEdited; ?>
						<hr>
					</div>
					<div class="col-lg-4">
						<div class="input-group">
							<input type="search" placeholder="Search" class="form-control" id="userSearchBar">
							<span class="input-group-btn">
								<button type="button" class="btn btn-primary">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
					</div>
				</div>

				<div id="userSearchPanel" class="col-lg-12">
					<div class="panel panel-primary">
						<div class="panel-body" id="resultBox">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>Username</th>
										<th>Groups</th>
										<th>User Type</th>
										<th>Email Address</th>
										<th>Contact No.</th>
									</tr>
								</thead>
								<tbody>
									<div id="resultBox">
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="clients-list">
					<ul class="nav nav-tabs">
						<li class="active">
							<a data-toggle="tab" href="#tab-courses"><i class="fa fa-briefcase"></i>&emsp;Courses</a>
						</li>
						<li>
							<a data-toggle="tab" href="#tab-members"><i class="fa fa-user"></i>&emsp;Members</a>
						</li>
						<li>
							<a data-toggle="tab" href="#tab-groups"><i class="fa fa-users"></i>&emsp;Groups</a>
						</li>
					</ul>

					<div class="tab-content">
						<div id="tab-members" class="tab-pane fade">
							<div class="table-responsive">
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th>Username</th>
											<th>Groups</th>
											<th>User Type</th>
											<th>Email Address</th>
											<th>Contact No.</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($users as $user) { ?>
										<tr>
											<td class="client-avatar">
												<img alt="image" src="<?php echo base_url('assets/img/user-placeholder.jpg'); ?>">&emsp;<a data-toggle="tab" href="#<?php echo $user['fname']; ?>" class="client-link"><?php echo $user['fname']; ?></a>
											</td>
											<td>
												<?php
												$userArrays = $user['groupArray'];
												if (!empty($userArrays)) {
													foreach ($userArrays as $userArray) {
														?>
														<ul>
															<li>
																<a href="#"><?php echo $userArray['organisation']; ?></a>
															</li>
														</ul>
														<?php
													}
												} else {
													?>
													<ul>
														<li>User does not belong to any group(s)</li>
													</ul>
													<?php
												}
												?>
											</td>
											<td>
												<span data-toggle="tooltip" title="Any suggestion what would you prefer for this? Right now I am using 'userType' from the database."><?php echo $user['usertype']; ?></span>
											</td>
											<td>
												<i class="fa fa-envelope"></i>&emsp;<a href="mailto:<?php echo $user['email']; ?>"><?php echo $user['email']; ?></a>
											</td>
											<td>
												<i class="fa fa-phone"></i>&emsp;<a href="tel:<?php echo $user['contact']; ?>"><?php echo $user['contact']; ?></a>
											</td>
										</tr>
										<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>

					<div id="tab-courses" class="tab-pane fade in active">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<th>Course List</th>
									<th>Last Edited</th>
									<th>Status</th>
									<th>Actions</th>
								</thead>
								<tbody>
									<?php foreach ($courses as $course) {
										?>
										<tr>
											<td><a href="<?php echo site_url('learning/' . $course->courseID); ?>"><?php echo $course->courseName; ?></a></td>
											<td><?php echo empty($course->lastEdited) ? "None" : $course->lastEdited; ?></td>
											<td>
												<?php
												if ($course->active == 1) {
													?>
													<div class="btn btn-sm btn-default">
														<input type="checkbox" id="activeChecked_<?php echo $course->courseID; ?>" class="courseActive" checked>
														<label for="activeChecked_<?php echo $course->courseID; ?>" class="activeLabel">Active</label>
													</div>
													<?php
												} else {
													?>
													<div class="btn btn-sm btn-default">
														<input type="checkbox" id="activeNotChecked_<?php echo $course->courseID; ?>" class="courseActive">
														<label for="activeNotChecked_<?php echo $course->courseID; ?>" class="activeLabel">Active</label>
													</div>
													<?php
												}
												?>
											</td>

											<td class="project-actions">
												<a href="<?php echo site_url('edits/' . $course->courseID);?>" class="btn btn-sm btn-success">
													<i class="fa fa-pencil"></i>&emsp;Edit
												</a>
												&nbsp;
												<a href="<?php echo site_url('analysis/' . $course->courseID); ?>" class="btn btn-sm btn-primary">
													<i class="fa fa-bar-chart-o"></i>&emsp;Course Analytics
												</a>
												&nbsp;
												<a href="<?php echo site_url('admin/dropCourse/' . $course->courseID); ?>" class="btn btn-sm btn-danger">
													<i class="fa fa-trash"></i>&emsp;Remove
												</a>
											</td>
										</tr>
										<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>

					<div id="tab-groups" class="tab-pane fade">
						<div class="table-responsive">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>Group Name</th>
										<th>Total Members</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($groups as $group) {?>
									<tr>
										<td><?php echo $group['organisation'] ?></td>
										<td><?php echo $group['userCount'] ?></td>
										<td>
											<a href="<?php echo base_url('manageMember/' . $group['groupID']); ?>" class="btn btn-sm btn-success"><i class="fa fa-signal"></i>&emsp;Manage Members</a>
											&nbsp;
											<a href="<?php echo base_url('manageCourse/' . $group['groupID']); ?>" class="btn btn-sm btn-primary"><i class="fa fa-refresh fa-spin"></i>&emsp;Manage Courses</a>
											&nbsp;
											<a href="<?php echo site_url('admin/dropGroup/' . $group['groupID'])?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&emsp;Delete Group</a>
											&nbsp;
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<script src="<?php echo base_url('assets/js/main.js'); ?>"></script>

<script>
$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
});
</script>

<script>
	$(document).ready(function(){
		$('#userSearchPanel').hide();
		$('[data-toggle="tooltip"]').tooltip();
		$('#pageAdmin').removeAttr('href');
		var siteURL = "<?php echo site_url('learning/') ?>";
		var imgURL = "<?php echo base_url('assets/img/user-placeholder.jpg'); ?>";

		$("#userSearchBar").keyup(function(){
			if ($("#userSearchBar").val().length>3){
				$('#userSearchPanel').show();
				$.ajax({
					type:"post",
					url: "<?php echo base_url('admin/searchUser'); ?>",
					cache: false,
					data: 'userSearch='+$("#userSearchBar").val(),
					success: function(response){
						$("#resultBox").html("");
						var obj=JSON.parse(response);
						if (obj.length>0) {
							try {
								var items=[];
								$.each(obj, function(index, value){
									items.push(
										'<tr>',
//										'<td>' + value.username + '</td>',
										'<td class=\"client-avatar\">',
//										'<img src=\"' + imgURL + '\">&emsp;',
										'<a data-toggle=\"tab\" href=\"#' + value.userID + '\" class=\"client-link\">' + value.fname + '</a>',
										'     ',
										'<a data-toggle=\"tab\" href=\"#' + value.userID + '\" class=\"client-link\">' + value.lname + '</a>',
										'</td>',
										'<tr>'
									);
								});
								$("#resultBox").append.apply($("#resultBox"),items);
							} catch(e) {
								alert('Exeption while request..')
							}
						}else {
							$('#finalResult').html($('<li/>').text("No Courses Found"));
						}
					},
					error: function(){
						alert('Error 2');
					}
				});
			}
			return false;
		})


	})
</script>

</body>
</html>