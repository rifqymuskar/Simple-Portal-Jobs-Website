<h5 style="margin-top: 5%;">Perform job publications in the form below</h5>
<p style="margin-bottom: 5%;">after publishing the work that you need, you can see the proposal that has been entered</p>
<form class="submit_form" data-table="jobs" style="margin-bottom: 5%;">
	<div class="input-field">
      <input placeholder="Your Job Title" id="title" name="judul" type="text" class="validate">
      <label for="title">Job Title</label>
    </div>
    <button type="Submit" class="btn">Submit</button>
</form>

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
		<?php foreach ($data as $key): ?>
			<tr>
				<?php foreach ($fields as $key1): ?>
				<td><?=$key->$key1?></td>
				<?php endforeach ?>
				<td><a class="btn modal-table" data-id="<?=$key->id?>">Views Proposal</a></td>
			</tr>
		<?php endforeach ?>
		
	</tbody>
</table>

  <!-- Modal Structure -->
  <div id="proposal" class="modal">
    <div class="modal-content center-align">
    	<h5 id="kosong_jobs"></h5>
      <table id="table_proposal">
      	<thead>
      		<tr>
      			
      		</tr>
      	</thead>
      	<tbody>
      		
      	</tbody>
      </table>
    </div>
  </div>