<?php

use Latte\Runtime as LR;

/** source: D:\app\test\abiesoft\app\Http/../../templates/page/home/index.php.latte */
final class Template6e761e1989 extends Latte\Runtime\Template
{
	public const Blocks = [
		['title' => 'blockTitle', 'plugincss' => 'blockPlugincss', 'classbody' => 'blockClassbody', 'navbar' => 'blockNavbar', 'sidebar' => 'blockSidebar', 'content' => 'blockContent', 'dialog' => 'blockDialog', 'footer' => 'blockFooter', 'pluginjs' => 'blockPluginjs', 'pagejs' => 'blockPagejs'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo "\n";
		$this->renderBlock('title', get_defined_vars()) /* line 3 */;
		echo "\n";
		$this->renderBlock('plugincss', get_defined_vars()) /* line 4 */;
		echo "\n";
		$this->renderBlock('classbody', get_defined_vars()) /* line 14 */;
		echo "\n";
		$this->renderBlock('navbar', get_defined_vars()) /* line 18 */;
		$this->renderBlock('sidebar', get_defined_vars()) /* line 19 */;
		echo '

';
		$this->renderBlock('content', get_defined_vars()) /* line 22 */;
		echo "\n";
		$this->renderBlock('dialog', get_defined_vars()) /* line 561 */;
		$this->renderBlock('footer', get_defined_vars()) /* line 562 */;
		echo "\n";
		$this->renderBlock('pluginjs', get_defined_vars()) /* line 564 */;
		echo "\n";
		$this->renderBlock('pagejs', get_defined_vars()) /* line 572 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		$this->parentName = '../../launcher.php.latte';
		return get_defined_vars();
	}


	/** {block title} on line 3 */
	public function blockTitle(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo ' ';
		echo LR\Filters::escapeHtmlText($title) /* line 3 */;
		echo ' ';
	}


	/** {block plugincss} on line 4 */
	public function blockPlugincss(array $ʟ_args): void
	{
		echo '<link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 5 */;
		echo '/assets/vendor/chartist/chartist.css">
<link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 6 */;
		echo '/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
<link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 7 */;
		echo '/assets/vendor/aspieprogress/asPieProgress.css">
<link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 8 */;
		echo '/assets/vendor/jquery-selective/jquery-selective.css">
<link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 9 */;
		echo '/assets/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
<link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 10 */;
		echo '/assets/vendor/asscrollable/asScrollable.css">
<link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 11 */;
		echo '/assets/examples/css/dashboard/team.css">
';
	}


	/** {block classbody} on line 14 */
	public function blockClassbody(array $ʟ_args): void
	{
		echo 'animsition site-navbar-small dashboard
';
	}


	/** {block navbar} on line 18 */
	public function blockNavbar(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		$this->createTemplate('../../theme/components/navbar.php.latte', $this->params, "include")->renderToContentType('html', 'navbar') /* line 18 */;
	}


	/** {block sidebar} on line 19 */
	public function blockSidebar(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		$this->createTemplate('../../theme/components/sidebar.php.latte', $this->params, "include")->renderToContentType('html', 'sidebar') /* line 19 */;
	}


	/** {block content} on line 22 */
	public function blockContent(array $ʟ_args): void
	{
		echo '
    <!-- Page -->
    <div class="page">
      <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
          <!-- First Row -->
          <!-- Completed Options Pie Widgets -->
          <div class="col-xxl-3">
            <div class="row h-full" data-plugin="matchHeight">
              <div class="col-xxl-12 col-lg-4 col-sm-4">
                <div class="card card-shadow card-completed-options">
                  <div class="card-block p-30">
                    <div class="row">
                      <div class="col-6">
                        <div class="counter text-left blue-grey-700">
                          <div class="counter-label mt-10">Tasks Completed
                          </div>
                          <div class="counter-number font-size-40 mt-10">
                            1,234
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="pie-progress pie-progress-sm" data-plugin="pieProgress" data-valuemax="100"
                          data-barcolor="#57c7d4" data-size="100" data-barsize="10"
                          data-goal="86" aria-valuenow="86" role="progressbar">
                          <span class="pie-progress-number blue-grey-700 font-size-20">
                            86%
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xxl-12 col-lg-4 col-sm-4">
                <div class="card card-shadow card-completed-options">
                  <div class="card-block p-30">
                    <div class="row">
                      <div class="col-6">
                        <div class="counter text-left blue-grey-700">
                          <div class="counter-label mt-10">Points Completed
                          </div>
                          <div class="counter-number font-size-40 mt-10">
                            698
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="pie-progress pie-progress-sm" data-plugin="pieProgress" data-valuemax="100"
                          data-barcolor="#62a8ea" data-size="100" data-barsize="10"
                          data-goal="62" aria-valuenow="62" role="progressbar">
                          <span class="pie-progress-number blue-grey-700 font-size-20">
                            62%
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xxl-12 col-lg-4 col-sm-4">
                <div class="card card-shadow card-completed-options">
                  <div class="card-block p-30">
                    <div class="row">
                      <div class="col-6">
                        <div class="counter text-left blue-grey-700">
                          <div class="counter-label mt-10">Cards Completed
                          </div>
                          <div class="counter-number font-size-40 mt-10">
                            1,358
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="pie-progress pie-progress-sm" data-plugin="pieProgress" data-valuemax="100"
                          data-barcolor="#926dde" data-size="100" data-barsize="10"
                          data-goal="56" aria-valuenow="56" role="progressbar">
                          <span class="pie-progress-number blue-grey-700 font-size-20">
                            56%
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Completed Options Pie Widgets -->
          <!-- Team Total Completed -->
          <div class="col-xxl-9">
            <div id="teamCompletedWidget" class="card card-shadow example-responsive">
              <div class="card-block p-20 pb-25">
                <div class="row pb-40" data-plugin="matchHeight">
                  <div class="col-md-6">
                    <div class="counter text-left pl-10">
                      <div class="counter-label">Team Total Completed</div>
                      <div class="counter-number-group text-truncate">
                        <span>1,439</span>
                        <span>86%</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <ul class="list-inline mr-50">
                      <li class="list-inline-item">
                        Task Completed
                      </li>
                      <li class="list-inline-item">
                        Cards Completed
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="ct-chart"></div>
              </div>
            </div>
          </div>
          <!-- End Team Total Completed -->
          <!-- End First Row -->
          <!-- Second Row -->
          <!-- Personal -->
          <div class="col-xxl-4 col-xl-6 col-lg-6">
            <div id="personalCompletedWidget" class="card card-shadow pb-20">
              <div class="card-header card-header-transparent cover overlay">
                <img class="cover-image" src="../assets/photos/placeholder.png">
                <div class="overlay-panel overlay-background vertical-align">
                  <div class="vertical-align-middle">
                    <a class="avatar" href="javascript:void(0)">
                      <img alt="" src="../assets/portraits/4.jpg">
                    </a>
                    <div class="font-size-20 mt-10">MACHI</div>
                    <div class="font-size-14">machidesign@163.com</div>
                  </div>
                </div>
              </div>
              <div class="card-block">
                <div class="row text-center mb-20">
                  <div class="col-6">
                    <div class="counter">
                      <div class="counter-label total-completed">TOTAL COMPLETED</div>
                      <div class="counter-number red-600">1,628</div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="counter">
                      <div class="counter-label">TOTAL TIME</div>
                      <div class="counter-number blue-600">17</div>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <caption>TODAY STATISTIC</caption>
                    <tbody>
                      <tr>
                        <td>
                          Tasks Completed
                        </td>
                        <td>
                          <div class="progress progress-xs mb-0">
                            <div class="progress-bar progress-bar-info bg-blue-600" role="progressbar" aria-valuenow="90"
                              aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                            </div>
                          </div>
                        </td>
                        <td>
                          90%
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Cards Completed
                        </td>
                        <td>
                          <div class="progress progress-xs mb-0">
                            <div class="progress-bar progress-bar-info bg-green-600" role="progressbar" aria-valuenow="86"
                              aria-valuemin="0" aria-valuemax="100" style="width: 86%">
                            </div>
                          </div>
                        </td>
                        <td>
                          86%
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Points Completed
                        </td>
                        <td>
                          <div class="progress progress-xs mb-0">
                            <div class="progress-bar progress-bar-info bg-red-600" role="progressbar" aria-valuenow="68"
                              aria-valuemin="0" aria-valuemax="100" style="width: 68%">
                            </div>
                          </div>
                        </td>
                        <td>
                          68%
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- End Personal -->
          <!-- To Do List -->
          <div class="col-xxl-4 col-xl-6 col-lg-6">
            <div id="toDoListWidget" class="card card-shadow card-lg pb-20">
              <div class="card-header card-header-transparent">
                <div class="card-header-actions">
                  <a id="addNewItemBtn" href="javascript:void(0)" class="add-item-toggle">
                <i class="icon wb-plus" aria-hidden="true"></i>
              </a>
                </div>
                <h5 class="card-title">TO DO LIST</h5>
              </div>
              <ul class="list-group h-500" data-plugin="scrollable">
                <div data-role="container">
                  <div data-role="content">
                    <li class="list-group-item">
                      <div class="checkbox-custom checkbox-success checkbox-lg">
                        <input type="checkbox" name="checkbox" checked="checked">
                        <label class="item-title">Edit meeting record</label>
                      </div>
                      <div class="item-due-date">
                        <span>Tue,aug 25</span>
                      </div>
                      <ul class="item-members">
                        <li>
                          <img class="avatar avatar-sm" src="../assets/portraits/3.jpg">
                          <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                            <i class="icon wb-pencil" aria-hidden="true"></i>
                          </button>
                        </li>
                      </ul>
                    </li>
                    <li class="list-group-item">
                      <div class="checkbox-custom checkbox-success checkbox-lg">
                        <input type="checkbox" name="checkbox" checked="checked">
                        <label class="item-title">Upload Photos and Video</label>
                      </div>
                      <div class="item-due-date">
                        <span>Tue,aug 25</span>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="checkbox-custom checkbox-success checkbox-lg">
                        <input type="checkbox" name="checkbox">
                        <label class="item-title">Edit the blog system</label>
                      </div>
                      <div class="item-due-date">
                        <span>No due date</span>
                      </div>
                      <ul class="item-members">
                        <li>
                          <img class="avatar avatar-sm" src="../assets/portraits/1.jpg">
                          <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                            <i class="icon wb-pencil" aria-hidden="true"></i>
                          </button>
                        </li>
                        <li>
                          <img class="avatar avatar-sm" src="../assets/portraits/5.jpg">
                          <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                            <i class="icon wb-pencil" aria-hidden="true"></i>
                          </button>
                        </li>
                      </ul>
                    </li>
                    <li class="list-group-item">
                      <div class="checkbox-custom checkbox-success checkbox-lg">
                        <input type="checkbox" name="checkbox">
                        <label class="item-title">Edit the blog system</label>
                      </div>
                      <div class="item-due-date">
                        <span>No due date</span>
                      </div>
                      <ul class="item-members">
                        <li>
                          <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                            <i class="icon wb-pencil" aria-hidden="true"></i>
                          </button>
                        </li>
                      </ul>
                    </li>
                    <li class="list-group-item">
                      <div class="checkbox-custom checkbox-success checkbox-lg">
                        <input type="checkbox" name="checkbox">
                        <label class="item-title">Edit the blog system</label>
                      </div>
                      <div class="item-due-date">
                        <span>No due date</span>
                      </div>
                      <ul class="item-members">
                        <li>
                          <img class="avatar avatar-sm" src="../assets/portraits/4.jpg">
                          <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                            <i class="icon wb-pencil" aria-hidden="true"></i>
                          </button>
                        </li>
                        <li>
                          <img class="avatar avatar-sm" src="../assets/portraits/6.jpg">
                          <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                            <i class="icon wb-pencil" aria-hidden="true"></i>
                          </button>
                        </li>
                        <li>
                          <img class="avatar avatar-sm" src="../assets/portraits/7.jpg">
                          <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                            <i class="icon wb-pencil" aria-hidden="true"></i>
                          </button>
                        </li>
                      </ul>
                    </li>
                    <li class="list-group-item">
                      <div class="checkbox-custom checkbox-success checkbox-lg">
                        <input type="checkbox" name="checkbox" checked="checked">
                        <label class="item-title">Edit meeting record</label>
                      </div>
                      <div class="item-due-date">
                        <span>Tue,aug 25</span>
                      </div>
                      <ul class="item-members">
                        <li>
                          <img class="avatar avatar-sm" src="../assets/portraits/3.jpg">
                          <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                            <i class="icon wb-pencil" aria-hidden="true"></i>
                          </button>
                        </li>
                      </ul>
                    </li>
                    <li class="list-group-item">
                      <div class="checkbox-custom checkbox-success checkbox-lg">
                        <input type="checkbox" name="checkbox" checked="checked">
                        <label class="item-title">Upload Photos and Video</label>
                      </div>
                      <div class="item-due-date">
                        <span>Tue,aug 25</span>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="checkbox-custom checkbox-success checkbox-lg">
                        <input type="checkbox" name="checkbox">
                        <label class="item-title">Edit the blog system</label>
                      </div>
                      <div class="item-due-date">
                        <span>No due date</span>
                      </div>
                      <ul class="item-members">
                        <li>
                          <img class="avatar avatar-sm" src="../assets/portraits/1.jpg">
                          <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                            <i class="icon wb-pencil" aria-hidden="true"></i>
                          </button>
                        </li>
                        <li>
                          <img class="avatar avatar-sm" src="../assets/portraits/5.jpg">
                          <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                            <i class="icon wb-pencil" aria-hidden="true"></i>
                          </button>
                        </li>
                      </ul>
                    </li>
                    <li class="list-group-item">
                      <div class="checkbox-custom checkbox-success checkbox-lg">
                        <input type="checkbox" name="checkbox">
                        <label class="item-title">Edit the blog system</label>
                      </div>
                      <div class="item-due-date">
                        <span>No due date</span>
                      </div>
                      <ul class="item-members">
                        <li>
                          <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                            <i class="icon wb-pencil" aria-hidden="true"></i>
                          </button>
                        </li>
                      </ul>
                    </li>
                    <li class="list-group-item">
                      <div class="checkbox-custom checkbox-success checkbox-lg">
                        <input type="checkbox" name="checkbox">
                        <label class="item-title">Edit the blog system</label>
                      </div>
                      <div class="item-due-date">
                        <span>No due date</span>
                      </div>
                      <ul class="item-members">
                        <li>
                          <img class="avatar avatar-sm" src="../assets/portraits/4.jpg">
                          <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                            <i class="icon wb-pencil" aria-hidden="true"></i>
                          </button>
                        </li>
                        <li>
                          <img class="avatar avatar-sm" src="../assets/portraits/6.jpg">
                          <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                            <i class="icon wb-pencil" aria-hidden="true"></i>
                          </button>
                        </li>
                        <li>
                          <img class="avatar avatar-sm" src="../assets/portraits/7.jpg">
                          <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                            <i class="icon wb-pencil" aria-hidden="true"></i>
                          </button>
                        </li>
                      </ul>
                    </li>
                  </div>
                </div>
              </ul>
            </div>
          </div>
          <!-- End To Do List -->
          <!-- Recent Activity -->
          <div class="col-xxl-4">
            <div id="recentActivityWidget" class="card card-shadow card-lg pb-20">
              <div class="card-header card-header-transparent pb-10">
                <div class="card-header-actions">
                  <span class="badge badge-default badge-round">VIEW ALL</span>
                </div>
                <h5 class="card-title">
                  RECENT ACTIVITY
                </h5>
              </div>
              <ul class="timeline timeline-icon">
                <li class="timeline-reverse timeline-item">
                  <div class="timeline-content-wrap">
                    <div class="timeline-dot bg-green-600">
                      <i class="icon wb-chat" aria-hidden="true"></i>
                    </div>
                    <div class="timeline-content">
                      <div class="title">
                        <span class="authors">Victor Erixon</span> assigned to a task
                      </div>
                      <div class="metas">
                        active 14 minutes ago
                      </div>
                      <ul class="members">
                        <li>
                          <img class="avatar avatar-sm" src="../assets/portraits/7.jpg">
                        </li>
                        <li>
                          <img class="avatar avatar-sm" src="../assets/portraits/6.jpg">
                        </li>
                        <li>
                          <img class="avatar avatar-sm" src="../assets/portraits/8.jpg">
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li class="timeline-reverse timeline-item">
                  <div class="timeline-content-wrap">
                    <div class="timeline-dot bg-blue-600">
                      <i class="icon wb-image" aria-hidden="true"></i>
                    </div>
                    <div class="timeline-content">
                      <div class="title">
                        <span class="authors">Alex Bender</span>uploaded 3 photos
                      </div>
                      <div class="metas">
                        active 2 hours ago
                      </div>
                      <ul class="photos">
                        <li class="cover">
                          <img class="cover-image" src="../assets/photos/placeholder.png">
                        </li>
                        <li class="cover">
                          <img class="cover-image" src="../assets/photos/placeholder.png">
                        </li>
                        <li class="cover">
                          <img class="cover-image" src="../assets/photos/placeholder.png">
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li class="timeline-reverse timeline-item">
                  <div class="timeline-content-wrap">
                    <div class="timeline-dot bg-cyan-600">
                      <i class="icon wb-file" aria-hidden="true"></i>
                    </div>
                    <div class="timeline-content">
                      <div class="title">
                        <span class="authors">Jeff Erixon</span>
                        invite you to attend topic discussion in
                        <span class="room-number">B205</span>
                        classroom
                      </div>
                      <div class="metas">
                        active 4 hours ago
                      </div>
                      <div class="tags">
                        As user experience designers we have to find the sweet spot
                      </div>
                    </div>
                  </div>
                </li>
                <li class="timeline-reverse timeline-item">
                  <div class="timeline-content-wrap">
                    <div class="timeline-dot bg-orange-600">
                      <i class="icon wb-map" aria-hidden="true"></i>
                    </div>
                    <div class="timeline-content">
                      <div class="title">
                        <span class="authors">Jeff Erixon</span>
                        invite you to attend topic discussion in
                        <span class="room-number">B205</span>
                        classroom
                      </div>
                      <div class="metas">
                        active 3 hours ago
                      </div>
                      <ul class="operates">
                        <li>
                          <button class="btn btn-outline btn-success btn-round">Accept</button>
                        </li>
                        <li>
                          <button class="btn btn-outline btn-danger btn-round">Refuse</button>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <!-- End Recent Activity -->
          <!-- End Second Row -->
        </div>
      </div>
    </div>
    <!-- End Page -->
';
	}


	/** {block dialog} on line 561 */
	public function blockDialog(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		$this->createTemplate('../../theme/components/dialog.php.latte', $this->params, "include")->renderToContentType('html', 'dialog') /* line 561 */;
	}


	/** {block footer} on line 562 */
	public function blockFooter(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		$this->createTemplate('../../theme/components/footer.php.latte', $this->params, "include")->renderToContentType('html', 'footer') /* line 562 */;
	}


	/** {block pluginjs} on line 564 */
	public function blockPluginjs(array $ʟ_args): void
	{
		echo '<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 565 */;
		echo '/assets/vendor/chartist/chartist.js"></script>
<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 566 */;
		echo '/assets/vendor/aspieprogress/jquery-asPieProgress.js"></script>
<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 567 */;
		echo '/assets/vendor/matchheight/jquery.matchHeight-min.js"></script>
<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 568 */;
		echo '/assets/vendor/jquery-selective/jquery-selective.min.js"></script>
<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 569 */;
		echo '/assets/vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>
';
	}


	/** {block pagejs} on line 572 */
	public function blockPagejs(array $ʟ_args): void
	{
		echo '<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 573 */;
		echo '/assets/js/Plugin/matchheight.js"></script>
<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 574 */;
		echo '/assets/js/Plugin/aspieprogress.js"></script>
<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 575 */;
		echo '/assets/js/Plugin/bootstrap-datepicker.js"></script>
<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 576 */;
		echo '/assets/js/Plugin/asscrollable.js"></script>
<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 577 */;
		echo '/assets/examples/js/dashboard/team.js"></script>
';
	}
}
