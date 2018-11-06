<li><a href="<?=site_url('company/jobs')?>">Jobs</a></li>
<li><a class='dropdown-trigger' data-target='dropdown1'>Welcome, <?=$this->ion_auth->user()->row()->first_name?> <?=$this->ion_auth->user()->row()->last_name?> <i class="material-icons right">arrow_drop_down</i></a></li>

<ul id="dropdown1" class="dropdown-content">
  <li><a href="<?=site_url('auth/logout')?>">Logout</a></li>
</ul>