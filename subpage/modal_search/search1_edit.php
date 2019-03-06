<?php 
  require '../server/server.php';
  $id = $_POST['data1'];
  $sql = "SELECT * FROM student WHERE std_id  = '$id' ";
  $re = mysqli_query($con,$sql);
  $r = mysqli_fetch_array($re);
?>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="loca" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="loca">แก้ไข <?php echo $r['std_id'];?></h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<!-- real id to send to update -->
														<input form="form_3" type="hidden" name="real_edit_id" value="<?php echo $r['std_id']; ?>">
														<div class="modal-body">
															<div class="container">
																<div class="form-group">
																	<div class="row">
																		<div class="col-md-7">
																			<label for="id">รหัสนักศึกษา</label>
																			<input name="edit_id" form="form_3" id="id" class="form-control" type="text" value="<?php echo $r['std_id']; ?>" required>
																		</div>
																		<div class="col-md-6">
																			<label for="fname">ชื่อ-นามสกุล</label>
																			<input name="edit_name" form="form_3" id="fname" class="form-control" type="text" value="<?php echo $r['name']; ?>" required>
																		</div>
																	</div>
																</div>
															</div>

														</div>
														<div class="modal-footer">
															<form action="search1.php" method="post" id="form_3">
																<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
																<button name="edit_btn" type="submit" form="form_3" class="btn btn-primary btn-sm">Save</button>
															</form>
														</div>
													</div>
												</div>
											</div>
                                            