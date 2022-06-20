<?php

use Latte\Runtime as LR;

/** source: D:\app\test\abiesoft\templates\theme\components\sidebar.php.latte */
final class Template0f8ecaeca1 extends Latte\Runtime\Template
{
	public const Blocks = [
		['sidebar' => 'blockSidebar'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		$this->renderBlock('sidebar', get_defined_vars()) /* line 1 */;
	}


	/** {block sidebar} on line 1 */
	public function blockSidebar(array $ʟ_args): void
	{
		echo '    <div class="site-menubar site-menubar-light">
      <div class="site-menubar-body">
        <div>
          <div>
            <ul class="site-menu" data-plugin="menu">
              <li class="site-menu-item">
                <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 8 */;
		echo '" data-dropdown-toggle="false">
                      <i class="site-menu-icon wb-home" aria-hidden="true"></i>
                      <span class="site-menu-title">Home</span>
                  </a>
              </li>
              <li class="site-menu-category">General</li>
              <li class="dropdown site-menu-item has-sub">
                <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
                      <i class="site-menu-icon wb-menu" aria-hidden="true"></i>
                      <span class="site-menu-title">Menu</span>
                          <span class="site-menu-arrow"></span>
                  </a>
                <div class="dropdown-menu">
                  <div class="site-menu-scroll-wrap is-list">
                    <div>
                      <div>
                        <ul class="site-menu-sub site-menu-normal-list">
                          <li class="site-menu-item">
                            <a class="animsition-link" href="layouts/grids.html">
                              <span class="site-menu-title">Perusahaan</span>
                            </a>
                          </li>
                          <li class="site-menu-item">
                            <a class="animsition-link" href="layouts/grids.html">
                              <span class="site-menu-title">Personil</span>
                            </a>
                          </li>
                          <li class="site-menu-item">
                            <a class="animsition-link" href="layouts/grids.html">
                              <span class="site-menu-title">Project</span>
                            </a>
                          </li>
                          <li class="site-menu-item">
                            <a class="animsition-link" href="layouts/grids.html">
                              <span class="site-menu-title">Aset</span>
                            </a>
                          </li>
                          <li class="site-menu-item">
                            <a class="animsition-link" href="layouts/grids.html">
                              <span class="site-menu-title">Perawatan</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              
            </ul>      
            </div>
        </div>
      </div>
    </div>
';
	}
}
