<?php

use Latte\Runtime as LR;

/** source: D:\app\test\abiesoft\app\Http/../../templates/page/profile/detail.php.latte */
final class Templatee55b15f68b extends Latte\Runtime\Template
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
		$this->renderBlock('classbody', get_defined_vars()) /* line 8 */;
		echo "\n";
		$this->renderBlock('navbar', get_defined_vars()) /* line 12 */;
		$this->renderBlock('sidebar', get_defined_vars()) /* line 13 */;
		echo '

';
		$this->renderBlock('content', get_defined_vars()) /* line 16 */;
		echo "\n";
		$this->renderBlock('dialog', get_defined_vars()) /* line 425 */;
		$this->renderBlock('footer', get_defined_vars()) /* line 430 */;
		echo "\n";
		$this->renderBlock('pluginjs', get_defined_vars()) /* line 432 */;
		echo "\n";
		$this->renderBlock('pagejs', get_defined_vars()) /* line 438 */;
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
		echo '<link rel="stylesheet" href="../../assets/examples/css/pages/profile.css">
';
	}


	/** {block classbody} on line 8 */
	public function blockClassbody(array $ʟ_args): void
	{
		echo 'animsition site-navbar-small page-profile
';
	}


	/** {block navbar} on line 12 */
	public function blockNavbar(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		$this->createTemplate('../../theme/components/navbar.php.latte', $this->params, "include")->renderToContentType('html', 'navbar') /* line 12 */;
	}


	/** {block sidebar} on line 13 */
	public function blockSidebar(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		$this->createTemplate('../../theme/components/sidebar.php.latte', $this->params, "include")->renderToContentType('html', 'sidebar') /* line 13 */;
	}


	/** {block content} on line 16 */
	public function blockContent(array $ʟ_args): void
	{
		echo '<div class="page">
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <!-- Page Widget -->
                <div class="card card-shadow text-center">
                    <div class="card-block">
                        <a class="avatar avatar-lg" href="javascript:void(0)">
                            <img src="../../assets/portraits/5.jpg" alt="...">
                        </a>
                        <h4 class="profile-user">Sukron Abbayroad</h4>
                        <p class="profile-job">sabbayroad@gmail.com</p>
                        <p>Staf Administrasi Elektronik | PT. Alam Jagad Raya</p>
                        <div class="btn-group">
                          <button type="button" class="btn btn-icon btn-primary"><i class="icon wb-envelope" aria-hidden="true"></i></button>
                          <button type="button" class="btn btn-icon btn-primary"><i class="icon wb-settings" aria-hidden="true"></i></button>
                          <button type="button" class="btn btn-icon btn-primary"><i class="icon wb-power" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row no-space">
                            <div class="col-4">
                                <strong class="profile-stat-count">0</strong>
                                <span>Project</span>
                            </div>
                            <div class="col-4">
                                <strong class="profile-stat-count">0</strong>
                                <span>Proses</span>
                            </div>
                            <div class="col-4">
                                <strong class="profile-stat-count">0</strong>
                                <span>Selesai</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page Widget -->
            </div>

            <div class="col-lg-9">
                <!-- Panel -->
                <div class="panel">
                    <div class="panel-body nav-tabs-animate nav-tabs-horizontal" data-plugin="tabs">
                        <ul class="nav nav-tabs nav-tabs-line" role="tablist">
                            <li class="nav-item" role="presentation"><a class="active nav-link" data-toggle="tab" href="#activities" aria-controls="activities" role="tab">Activities <span class="badge badge-pill badge-danger">5</span></a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#profile" aria-controls="profile" role="tab">Profile</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#messages" aria-controls="messages" role="tab">Messages</a></li>
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" aria-expanded="false">Menu </a>
                                <div class="dropdown-menu" role="menu">
                                    <a class="active dropdown-item" data-toggle="tab" href="#activities" aria-controls="activities" role="tab">Activities <span class="badge badge-pill badge-danger">5</span></a>
                                    <a class="dropdown-item" data-toggle="tab" href="#profile" aria-controls="profile" role="tab">Profile</a>
                                    <a class="dropdown-item" data-toggle="tab" href="#messages" aria-controls="messages" role="tab">Messages</a>
                                </div>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active animation-slide-left" id="activities" role="tabpanel">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="pr-20">
                                                <a class="avatar" href="javascript:void(0)">
                                                    <img class="img-fluid" src="../../assets/portraits/2.jpg" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-5">Ida Fleming
                                                    <small>posted an updated</small>
                                                </h5>
                                                <small>active 14 minutes ago</small>
                                                <div class="profile-brief">“Check if it can be corrected with overflow : hidden”</div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="pr-20">
                                                <a class="avatar" href="javascript:void(0)">
                                                    <img class="img-fluid" src="../../assets/portraits/3.jpg" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-5">Julius
                                                    <small>uploaded 4 photos</small>
                                                </h5>
                                                <small>active 14 minutes ago</small>
                                                <div class="profile-brief clearfix">
                                                    <img class="profile-uploaded" src="../../assets/photos/placeholder.png" alt="...">
                                                    <img class="profile-uploaded" src="../../assets/photos/placeholder.png" alt="...">
                                                    <img class="profile-uploaded" src="../../assets/photos/placeholder.png" alt="...">
                                                    <img class="profile-uploaded" src="../../assets/photos/placeholder.png" alt="...">
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="pr-20">
                                                <a class="avatar" href="javascript:void(0)">
                                                    <img class="img-fluid" src="../../assets/portraits/4.jpg" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-5">Owen Hunt
                                                    <small>posted a new note</small>
                                                </h5>
                                                <small>active 14 minutes ago</small>
                                                <div class="profile-brief">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit. Integer nec odio. Praesent libero. Sed cursus
                                                    ante dapibus diam. Sed nisi. Nulla quis sem at nibh
                                                    elementum imperdiet. Duis sagittis ipsum. Praesent
                                                    mauris. Fusce nec tellus sed augue semper porta.
                                                    Mauris massa.</div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="pr-20">
                                                <a class="avatar" href="javascript:void(0)">
                                                    <img class="img-fluid" src="../../assets/portraits/5.jpg" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-5">Terrance Arnold
                                                    <small>posted a new blog</small>
                                                </h5>
                                                <small>active 14 minutes ago</small>
                                                <div class="profile-brief">
                                                    <div class="media">
                                                        <a class="pr-20">
                                                            <img class="w-160" src="../../assets/photos/placeholder.png" alt="...">
                                                        </a>
                                                        <div class="media-body pl-20">
                                                            <h4 class="mt-0 mb-5">Getting Started</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                elit. Integer nec odio. Praesent libero. Sed
                                                                cursus ante dapibus diam. Sed nisi. Nulla quis
                                                                sem at nibh elementum imperdiet. Duis sagittis
                                                                ipsum. Praesent mauris.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="pr-20">
                                                <a class="avatar" href="javascript:void(0)">
                                                    <img class="img-fluid" src="../../assets/portraits/2.jpg" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-5">Ida Fleming
                                                    <small>posted an new activity comment</small>
                                                </h5>
                                                <small>active 14 minutes ago</small>
                                                <div class="profile-brief">Cras sit amet nibh libero, in gravida nulla. Nulla
                                                    vel metus.</div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="pr-20">
                                                <a class="avatar" href="javascript:void(0)">
                                                    <img class="img-fluid" src="../../assets/portraits/3.jpg" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-5">Julius
                                                    <small>posted an updated</small>
                                                </h5>
                                                <small>active 14 minutes ago</small>
                                                <div class="profile-brief">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit. Integer nec odio. Praesent libero. Sed cursus
                                                    ante dapibus diam.</div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <a class="btn btn-block btn-default profile-readMore" href="javascript:void(0)" role="button">Show more</a>
                            </div>

                            <div class="tab-pane animation-slide-left" id="profile" role="tabpanel">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="pr-20">
                                                <a class="avatar" href="javascript:void(0)">
                                                    <img class="img-fluid" src="../../assets/portraits/5.jpg" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-5">Terrance Arnold
                                                    <small>posted a new blog</small>
                                                </h5>
                                                <small>active 14 minutes ago</small>
                                                <div class="profile-brief">
                                                    <div class="media">
                                                        <a class="pr-20">
                                                            <img class="w-160" src="../../assets/photos/placeholder.png" alt="...">
                                                        </a>
                                                        <div class="media-body pl-20">
                                                            <h4 class="mt-0 mb-5">Getting Started</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                elit. Integer nec odio. Praesent libero. Sed
                                                                cursus ante dapibus diam. Sed nisi. Nulla quis
                                                                sem at nibh elementum imperdiet. Duis sagittis
                                                                ipsum. Praesent mauris.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="pr-20">
                                                <a class="avatar" href="javascript:void(0)">
                                                    <img class="img-fluid" src="../../assets/portraits/2.jpg" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-5">Ida Fleming
                                                    <small>posted an updated</small>
                                                </h5>
                                                <small>active 14 minutes ago</small>
                                                <div class="profile-brief">“Check if it can be corrected with overflow : hidden”</div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="pr-20">
                                                <a class="avatar" href="javascript:void(0)">
                                                    <img class="img-fluid" src="../../assets/portraits/4.jpg" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-5">Owen Hunt
                                                    <small>posted a new note</small>
                                                </h5>
                                                <small>active 14 minutes ago</small>
                                                <div class="profile-brief">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit. Integer nec odio. Praesent libero. Sed cursus
                                                    ante dapibus diam. Sed nisi. Nulla quis sem at nibh
                                                    elementum imperdiet. Duis sagittis ipsum. Praesent
                                                    mauris. Fusce nec tellus sed augue semper porta.
                                                    Mauris massa.</div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="pr-20">
                                                <a class="avatar" href="javascript:void(0)">
                                                    <img class="img-fluid" src="../../assets/portraits/2.jpg" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-5">Ida Fleming
                                                    <small>posted an new activity comment</small>
                                                </h5>
                                                <small>active 14 minutes ago</small>
                                                <div class="profile-brief">Cras sit amet nibh libero, in gravida nulla. Nulla
                                                    vel metus.</div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="pr-20">
                                                <a class="avatar" href="javascript:void(0)">
                                                    <img class="img-fluid" src="../../assets/portraits/3.jpg" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-5">Julius
                                                    <small>uploaded 4 photos</small>
                                                </h5>
                                                <small>active 14 minutes ago</small>
                                                <div class="profile-brief clearfix">
                                                    <img class="profile-uploaded" src="../../assets/photos/placeholder.png" alt="...">
                                                    <img class="profile-uploaded" src="../../assets/photos/placeholder.png" alt="...">
                                                    <img class="profile-uploaded" src="../../assets/photos/placeholder.png" alt="...">
                                                    <img class="profile-uploaded" src="../../assets/photos/placeholder.png" alt="...">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-pane animation-slide-left" id="messages" role="tabpanel">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="pr-20">
                                                <a class="avatar" href="javascript:void(0)">
                                                    <img class="img-fluid" src="../../assets/portraits/2.jpg" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-5">Ida Fleming
                                                    <small>posted an updated</small>
                                                </h5>
                                                <small>active 14 minutes ago</small>
                                                <div class="profile-brief">“Check if it can be corrected with overflow : hidden”</div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="pr-20">
                                                <a class="avatar" href="javascript:void(0)">
                                                    <img class="img-fluid" src="../../assets/portraits/5.jpg" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-5">Terrance Arnold
                                                    <small>posted a new blog</small>
                                                </h5>
                                                <small>active 14 minutes ago</small>
                                                <div class="profile-brief">
                                                    <div class="media">
                                                        <a class="pr-20">
                                                            <img class="w-160" src="../../assets/photos/placeholder.png" alt="...">
                                                        </a>
                                                        <div class="media-body pl-20">
                                                            <h4 class="mt-0 mb-5">Getting Started</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                elit. Integer nec odio. Praesent libero. Sed
                                                                cursus ante dapibus diam. Sed nisi. Nulla quis
                                                                sem at nibh elementum imperdiet. Duis sagittis
                                                                ipsum. Praesent mauris.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="pr-20">
                                                <a class="avatar" href="javascript:void(0)">
                                                    <img class="img-fluid" src="../../assets/portraits/4.jpg" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-5">Owen Hunt
                                                    <small>posted a new note</small>
                                                </h5>
                                                <small>active 14 minutes ago</small>
                                                <div class="profile-brief">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit. Integer nec odio. Praesent libero. Sed cursus
                                                    ante dapibus diam. Sed nisi. Nulla quis sem at nibh
                                                    elementum imperdiet. Duis sagittis ipsum. Praesent
                                                    mauris. Fusce nec tellus sed augue semper porta.
                                                    Mauris massa.</div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="pr-20">
                                                <a class="avatar" href="javascript:void(0)">
                                                    <img class="img-fluid" src="../../assets/portraits/3.jpg" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-5">Julius
                                                    <small>posted an updated</small>
                                                </h5>
                                                <small>active 14 minutes ago</small>
                                                <div class="profile-brief">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit. Integer nec odio. Praesent libero. Sed cursus
                                                    ante dapibus diam.</div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Panel -->
            </div>
        </div>
    </div>
</div>
';
	}


	/** {block dialog} on line 425 */
	public function blockDialog(array $ʟ_args): void
	{
	}


	/** {block footer} on line 430 */
	public function blockFooter(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		$this->createTemplate('../../theme/components/footer.php.latte', $this->params, "include")->renderToContentType('html', 'footer') /* line 430 */;
	}


	/** {block pluginjs} on line 432 */
	public function blockPluginjs(array $ʟ_args): void
	{
	}


	/** {block pagejs} on line 438 */
	public function blockPagejs(array $ʟ_args): void
	{
		echo '<script src="../../assets/js/Plugin/responsive-tabs.js"></script>
<script src="../../assets/js/Plugin/tabs.js"></script>
';
	}
}
