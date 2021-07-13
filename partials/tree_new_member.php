<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
			<form id="send-newmember" class="pt-mnewmember">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel"><?=$lang['newmember']['title']?></h4>
	      </div>
				<?php if ( fh_access('members', $id) ): ?>
      	<div class="modal-body">
					<div class="pt-form pt-forms">
					  <!-- Nav tabs -->
					  <ul class="nav nav-tabs" role="tablist">
					    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?=$lang['newmember']['personal']?></a></li>
					    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?=$lang['newmember']['contact']?></a></li>
					    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><?=$lang['newmember']['biographical']?></a></li>
					    <li role="presentation"><a href="#pics" aria-controls="pics" role="tab" data-toggle="tab"><?=$lang['newmember']['pictures']?></a></li>
					  </ul>

					  <!-- Tab panes -->
					  <div class="tab-content">
					    <div role="tabpanel" class="tab-pane active" id="home">
								<label class="link-u"><?=$lang['newmember']['link']?> <input type="text" class="form-control" name="user" value=""></label>
								<div class="row">
									<div class="col-md-6">
										<label>
											<?=$lang['newmember']['first']?>:
											<input type="text" value="" placeholder="<?=$lang['newmember']['lab1']?>" name="firstname" />
										</label>
									</div>
									<div class="col-md-6">
										<label>
											<?=$lang['newmember']['last']?>:
											<input type="text" value="" placeholder="<?=$lang['newmember']['lab2']?>" name="lastname" />
										</label>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<label><?=$lang['newmember']['gender']?>:</label>
										<label class="pt-inline"><input type="radio" name="gender" value="1" /> <?=$lang['newmember']['female']?></label>
										<label class="pt-inline"><input type="radio" name="gender" value="2" /> <?=$lang['newmember']['male']?></label>
									</div>
									<div class="col">
										<label><?=$lang['newmember']['rtype']?>:</label>
										<select name="type">
											<option value="1"><?=$lang['newmember']['child']?></option>
											<option value="2"><?=$lang['newmember']['partner']?></option>
											<option value="3"><?=$lang['newmember']['ex']?></option>
											<option value="4"><?=$lang['newmember']['parent']?></option>
										</select>
									</div>
								</div>

								<div class="row">
									<div class="col">
										<label>
											<?=$lang['newmember']['bdate']?>:<br />
											<input type="text" name="birthdate" value="" placeholder="00/00/0000" class="datepicker-here" data-language='en' data-position='top left' />
										</label>
									</div>
										<div class="col">
											<label>
												<?=$lang['newmember']['mdate']?>:<br />
												<input type="text" name="mariagedate" value="" placeholder="00/00/0000" class="datepicker-here" data-language='en' data-position='top left' />
											</label>
										</div>
											<div class="col">
												<label>
													<?=$lang['newmember']['ddate']?>:<br />
													<input type="text" name="deathdate" value="" placeholder="00/00/0000" class="datepicker-here" data-language='en' data-position='top left' />
												</label>
											</div>
								</div>

								<label><input type="checkbox" name="death" value="1" checked /> <?=$lang['newmember']['alive']?></label>
								<label>
									<?=$lang['newmember']['photo']?>:
									<input type="text" value="" placeholder="<?=$lang['newmember']['photo_url']?>" name="photo" />
								</label>
								<div class="prt-group">
									<input type="file" name="poll_file" id="file" class="inputfile" />
									<label for="file"><i class="fa fa-upload"></i> <?=$lang['newmember']['choose']?></label>
								</div>
								<div class="form-group"><label><?=$lang['newmember']['instead']?>:</label></div>
								<div class="form-avatar">
								<div class="form-inline">
									<?php for($x=1; $x<=16;$x++): ?>
									<div class="form-group">
										<input type="radio" name="avatar" value="<?=$x?>" id="sradioe<?=$x?>" class="choice image">
										<label for="sradioe<?=$x?>"><b><img src="<?=path?>/images/avatar/<?=$x?>.jpg" /></b></label>
									</div>
									<?php endfor; ?>
								</div>
								</div>
					    </div>
					    <div role="tabpanel" class="tab-pane" id="profile">
								<label>
									Facebook:
									<input type="text" value="" placeholder="<?=$lang['newmember']['lab3']?>" name="facebook" />
								</label>
								<label>
									Twitter:
									<input type="text" value="" placeholder="<?=$lang['newmember']['lab4']?>" name="twitter" />
								</label>
								<label>
									Instagram:
									<input type="text" value="" placeholder="<?=$lang['newmember']['lab5']?>" name="instagram" />
								</label>
								<label>
									Email:
									<input type="text" value="" placeholder="<?=$lang['newmember']['lab6']?>" name="email" />
								</label>
								<label>
									<?=$lang['newmember']['website']?>:
									<input type="text" value="" placeholder="<?=$lang['newmember']['lab7']?>" name="site" />
								</label>
								<label>
									<?=$lang['newmember']['tel']?>:
									<input type="text" value="" placeholder="<?=$lang['newmember']['lab8']?>" name="tel" />
								</label>
								<label>
									<?=$lang['newmember']['mobile']?>:
									<input type="text" value="" placeholder="<?=$lang['newmember']['lab9']?>" name="mobile" />
								</label>
					    </div>
					    <div role="tabpanel" class="tab-pane" id="messages">
								<label>
									<?=$lang['newmember']['bplace']?>:
									<input type="text" value="" placeholder="<?=$lang['newmember']['lab10']?>" name="birthplace" />
								</label>
								<label>
									<?=$lang['newmember']['dplace']?>:
									<input type="text" value="" placeholder="<?=$lang['newmember']['lab11']?>" name="deathplace" />
								</label>
								<label>
									<?=$lang['newmember']['profession']?>:
									<textarea name="profession" placeholder="<?=$lang['newmember']['lab12']?>"></textarea>
								</label>
								<label>
									<?=$lang['newmember']['company']?>:
									<textarea name="company" placeholder="<?=$lang['newmember']['lab13']?>"></textarea>
								</label>
								<label>
									<?=$lang['newmember']['interests']?>:
									<textarea name="interests" placeholder="<?=$lang['newmember']['lab14']?>"></textarea>
								</label>
								<label>
									<?=$lang['newmember']['bio']?>:
									<textarea name="bio" placeholder="<?=$lang['newmember']['lab15']?>"></textarea>
								</label>
					    </div>
					    <div role="tabpanel" class="tab-pane" id="pics">
								<?php if ( fh_access('albums') ): ?>
								<input id="images" name="images[]" type="file" multiple>
								<?php else: ?>
									<?php echo fh_alerts($lang['alerts']['albums'], 'warning') ?>
								<?php endif; ?>
					    </div>
					  </div>
					</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?=$lang['site']['close']?></button>
        <button type="submit" class="btn btn-primary"><?=$lang['site']['submit']?></button>
				<input type="hidden" name="parent" value="" />
				<input type="hidden" name="id" value="" />
				<input type="hidden" name="nid" value="" />
      </div>
		<?php else: ?>
			<div class="modal-body">
			<?php echo fh_alerts($lang['alerts']['members']) ?>
			</div>
		<?php endif; ?>
		</form>
    </div>
  </div>
</div>
