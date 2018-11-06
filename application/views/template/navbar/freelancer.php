<li><a href="<?=site_url('freelancer/jobs')?>">Search Jobs</a></li>

<li class="tooltipped" data-position="bottom" data-tooltip="If you upload any proposal on list jobs, your poin will reduce 2, Your points will automatically return on the first day of the month"><a>Your poin : <span><?=$poin?></span></a></li>

<li><a class='dropdown-trigger' data-target='dropdown1'>Welcome, <?=$this->ion_auth->user()->row()->first_name?> <?=$this->ion_auth->user()->row()->last_name?> <i class="material-icons right">arrow_drop_down</i></a></li>

<ul id="dropdown1" class="dropdown-content">
  <li><a href="<?=site_url('auth/logout')?>">Logout</a></li>
</ul>

