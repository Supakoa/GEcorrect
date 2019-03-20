<?php 
  require '../server/server.php';
  $id = $_POST['data1'];
  $sql = "SELECT * FROM student WHERE std_id  = '$id' ";
  $re = mysqli_query($con,$sql);
  $r = mysqli_fetch_array($re);
?>



<!-- Small modal 3-->
<div class="modal fade bd-example-modal-sm" id="del" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog modal-sm">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">ลบข้อมูล <?php echo $r['std_id']; ?></h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>

														<!-- hidden value id -->
														<input form="form_4" type="hidden" name="hide_del_id" value="<?php echo $r['std_id']; ?>">

														<div class="modal-footer">
															<form action="search1.php" method="post" id="form_4">
																<button name="del_btn" form="form_4" type="submit" class="btn btn-danger btn-sm">Yes</button>
																<button type="submit" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
															</form>
														</div>
													</div>
												</div>
											</div>
											<!--end modal 3-->

											