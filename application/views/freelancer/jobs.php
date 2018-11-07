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
							<a class="btn modal-form disabled">Submit Proposal</a>
						<?php }else{ ?>
							<a class="btn modal-form" data-id="<?=$key->id?>" data-judul="<?=$key->judul?>">Submit Proposal</a>
						<?php } ?>

					<?php }else{ ?>
						<a class="btn modal-form" data-id="<?=$key->id?>" data-judul="<?=$key->judul?>">Submit Proposal</a>
					<?php } ?>
				</td>
			</tr>
		<?php endforeach ?>
		
	</tbody>
</table>



  <!-- Modal Structure -->
  <div id="upload-proposal" class="modal">
    <div class="modal-content">
    	<h5 style="margin-bottom: 5%;" id="judul-proposal">haha</h5>
    	<div style="width: 15%; border-bottom: 5px solid #065FD4; margin-bottom: 5%;"></div>
      <form class="row submit_proposal" data-table="proposal" enctype="multipart/form-data" autocomplete="off">
      	<div class="input-field col s6 tooltipped" data-position="top" data-tooltip="how many budget you need">
          <input placeholder="need a budget" id="budget" name="budget" type="number" class="validate" required>
          <label for="budget">need a budget</label>
          <span class="helper-text">Example 10000000</span>
        </div>
        <div class="input-field col s6 tooltipped" data-position="top" data-tooltip="how many days for completion" required>
          <input placeholder="completion days" id="date" name="completion_day" type="number" class="validate">
          <label for="date">completion days</label>
          <span class="helper-text">Example '5' Days</span>
        </div>
        <div class="file-field input-field col s12">
	      <div class="btn">
	        <span>File</span>
	        <input type="file" name="proposal" multiple>
	      </div>
	      <div class="file-path-wrapper">
	        <input class="file-path validate" type="text" placeholder="Upload proposal files" required>
	        <span class="helper-text">Only PDF files</span>
	      </div>
	    </div>
	    <button style="margin-top: 5%; width: 100%;" type="submit" class="btn">Upload Proposal</button>
      </form>
    </div>
  </div>