<h5 style="margin-top: 5%;">list of available jobs</h5>
<p style="margin-bottom: 5%;">You can only submit one proposal to any published jobs</p>
<table>
	<thead>
		<tr>
			<?php foreach ($fields as $key): ?>
				<th><?=$key?></th>
			<?php endforeach ?>
				<th>#</th>
		</tr>
	</thead>
	<tbody>

		<!-- <?php foreach ($uploaded as $key2): ?>
			<tr>
				<?php foreach ($fields as $key3): ?>
				<td><?=$key2->$key3?></td>
				<?php endforeach ?>
				<td><a class="btn modal-form disabled" data-id="<?=$key2->id?>">Submit Proposal</a></td>
			</tr>
		<?php endforeach ?> -->

		<?php foreach ($data as $key): ?>
			<tr>
				<?php foreach ($fields as $key1): ?>
				<td><?=$key->$key1?></td>
				<?php endforeach ?>
				<td>
					<?php if (isset($key->status)){ ?>
						
						<?php if($key->status =='uploaded'){ ?>
							<a class="btn modal-form disabled" data-id="<?=$key->id?>">Submit Proposal</a>
						<?php }else{ ?>
							<a class="btn modal-form" data-id="<?=$key->id?>">Submit Proposal</a>
						<?php } ?>

					<?php }else{ ?>
						<a class="btn modal-form" data-id="<?=$key->id?>">Submit Proposal</a>
					<?php } ?>
				</td>
			</tr>
		<?php endforeach ?>
		
	</tbody>
</table>



  <!-- Modal Structure -->
  <div id="upload-proposal" class="modal">
    <div class="modal-content">
      <form class="row submit_proposal" data-table="proposal" enctype="multipart/form-data">
      	<div class="input-field col s6">
          <input placeholder="need a budget" id="budget" name="budget" type="text" class="validate">
          <label for="budget">need a budget</label>
        </div>
        <div class="input-field col s6">
          <input placeholder="completion days" id="date" name="completion_day" type="number" class="validate">
          <label for="date">completion days</label>
        </div>
        <div class="file-field input-field col s12">
	      <div class="btn">
	        <span>File</span>
	        <input type="file" name="proposal" multiple>
	      </div>
	      <div class="file-path-wrapper">
	        <input class="file-path validate" type="text" placeholder="Upload one or more files">
	      </div>
	    </div>
	    <button type="submit" class="btn">Upload Proposal</button>
      </form>
    </div>
  </div>