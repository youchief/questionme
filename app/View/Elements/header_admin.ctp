<header class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
                <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'welcome')); ?>">QME <small>v.1.0 beta</small></a>
                </div>
                <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                                <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">App <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                                <li class="dropdown-header">Q-days</li>
                                                <li><?php echo $this->Html->link('Add', array('controller' => 'qdays', 'action' => 'add', 'admin' => true)); ?></li>
                                                <li><?php echo $this->Html->link('List', array('controller' => 'qdays', 'action' => 'index', 'admin' => true)); ?></li>
                                                <li class="divider"></li>
                                                <li class="dropdown-header">Q-weeks</li>
                                                <li><?php echo $this->Html->link('Add', array('controller' => 'qweeks', 'action' => 'add', 'admin' => true)); ?></li>
                                                <li><?php echo $this->Html->link('List', array('controller' => 'qweeks', 'action' => 'index', 'admin' => true)); ?></li>
                                                <li class="divider"></li>
                                                <li class="dropdown-header">Regions</li>
                                                <li><?php echo $this->Html->link('Add', array('controller' => 'regions', 'action' => 'add', 'admin' => true)); ?></li>
                                                <li><?php echo $this->Html->link('List', array('controller' => 'regions', 'action' => 'index', 'admin' => true)); ?></li>
                                                <li class="divider"></li>
                                                <li class="dropdown-header">Banners</li>
                                                <li><?php echo $this->Html->link('Add', array('controller' => 'banners', 'action' => 'add', 'admin' => true)); ?></li>
                                                <li><?php echo $this->Html->link('List', array('controller' => 'banners', 'action' => 'index', 'admin' => true)); ?></li>
                                                <li><?php echo $this->Html->link('Type', array('controller' => 'bannerTypes', 'action' => 'index', 'admin' => true)); ?></li>
                                                <li class="divider"></li>
                                                <li class="dropdown-header">Contacts</li>
                                                <li><?php echo $this->Html->link('List', array('controller' => 'contacts', 'action' => 'index', 'admin' => true)); ?></li>

                                        </ul>
                                </li>
                                <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Questions <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                                <li class="dropdown-header">Questions</li>
                                                <li><?php echo $this->Html->link('Wizard', array('controller' => 'questions', 'action' => 'wizard', 'admin' => true)); ?></li>
                                                <li><?php echo $this->Html->link('Add', array('controller' => 'questions', 'action' => 'add', 'admin' => true)); ?></li>
                                                <li><?php echo $this->Html->link('List', array('controller' => 'questions', 'action' => 'index', 'admin' => true)); ?></li>
                                                <li><?php echo $this->Html->link('Export Results', array('controller' => 'users', 'action' => 'export', 'admin' => true)); ?></li>
                                                <li class="divider"></li>
                                                <li class="dropdown-header">Question Types</li>
                                                <li><?php echo $this->Html->link('Add', array('controller' => 'questionTypes', 'action' => 'add', 'admin' => true)); ?></li>
                                                <li><?php echo $this->Html->link('List', array('controller' => 'questionTypes', 'action' => 'index', 'admin' => true)); ?></li>
                                                <li class="divider"></li>
                                                <li class="dropdown-header">Question Queries</li>
                                                <li><?php echo $this->Html->link('Add', array('controller' => 'queries', 'action' => 'add', 'admin' => true)); ?></li>
                                                <li><?php echo $this->Html->link('List', array('controller' => 'queries', 'action' => 'index', 'admin' => true)); ?></li>
                                        </ul>
                                </li>
                                <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Choices <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                                <li class="dropdown-header">Question Choices</li>
                                                <li><?php echo $this->Html->link('Add', array('controller' => 'choices', 'action' => 'add', 'admin' => true)); ?></li>
                                                <li><?php echo $this->Html->link('List', array('controller' => 'choices', 'action' => 'index', 'admin' => true)); ?></li>
                                        </ul>
                                </li>
                                <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Customers <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                                <li class="dropdown-header">Customers</li>
                                                <li><?php echo $this->Html->link('Add', array('controller' => 'customers', 'action' => 'add', 'admin' => true)); ?></li>
                                                <li><?php echo $this->Html->link('List', array('controller' => 'customers', 'action' => 'index', 'admin' => true)); ?></li>
                                                <li class="divider"></li>
                                                <li class="dropdown-header">Customer Types</li>
                                                <li><?php echo $this->Html->link('Add', array('controller' => 'customerTypes', 'action' => 'add', 'admin' => true)); ?></li>
                                                <li><?php echo $this->Html->link('List', array('controller' => 'customerTypes', 'action' => 'index', 'admin' => true)); ?></li>

                                        </ul>
                                </li>
                                <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Orders <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                                <li class="dropdown-header">Orders</li>
                                                <li><?php echo $this->Html->link('Add', array('controller' => 'orders', 'action' => 'add', 'admin' => true)); ?></li>
                                                <li><?php echo $this->Html->link('List', array('controller' => 'orders', 'action' => 'index', 'admin' => true)); ?></li>
                                                <li class="divider"></li>
                                                <li class="dropdown-header">Order Types</li>
                                                <li><?php echo $this->Html->link('Add', array('controller' => 'orderTypes', 'action' => 'add', 'admin' => true)); ?></li>
                                                <li><?php echo $this->Html->link('List', array('controller' => 'orderTypes', 'action' => 'index', 'admin' => true)); ?></li>

                                        </ul>
                                </li>

                                <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gifts <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                                <li class="dropdown-header">Gifts</li>
                                                <li><?php echo $this->Html->link('Add', array('controller' => 'gifts', 'action' => 'add', 'admin' => true)); ?></li>
                                                <li><?php echo $this->Html->link('List', array('controller' => 'gifts', 'action' => 'index', 'admin' => true)); ?></li>
                                                <li class="divider"></li>
                                                <li class="dropdown-header">Big Gifts</li>
                                                <li><?php echo $this->Html->link('Add', array('controller' => 'bigGifts', 'action' => 'add', 'admin' => true)); ?></li>
                                                <li><?php echo $this->Html->link('List', array('controller' => 'bigGifts', 'action' => 'index', 'admin' => true)); ?></li>
                                                <li class="divider"></li>
                                                <li class="dropdown-header">Vouchers</li>
                                                <li><?php echo $this->Html->link('Add', array('controller' => 'vouchers', 'action' => 'add', 'admin' => true)); ?></li>
                                                <li><?php echo $this->Html->link('List', array('controller' => 'vouchers', 'action' => 'index', 'admin' => true)); ?></li>

                                        </ul>
                                </li>

                                <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Users <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                                <li class="dropdown-header">Users</li>
                                                <li><?php echo $this->Html->link('Add', array('controller' => 'users', 'action' => 'add', 'admin' => true)); ?></li>
                                                <li><?php echo $this->Html->link('List', array('controller' => 'users', 'action' => 'index', 'admin' => true)); ?></li>

                                                <li class="divider"></li>
                                                <li class="dropdown-header">User Groups</li>
                                                <li><?php echo $this->Html->link('Add', array('controller' => 'groups', 'action' => 'add', 'admin' => true)); ?></li>
                                                <li><?php echo $this->Html->link('List', array('controller' => 'groups', 'action' => 'index', 'admin' => true)); ?></li>
                                                <li class="divider"></li>
                                                <li class="dropdown-header">Group Actions</li>
                                                <li><?php echo $this->Html->link('Add', array('controller' => 'actions', 'action' => 'add', 'admin' => true)); ?></li>
                                                <li><?php echo $this->Html->link('List', array('controller' => 'actions', 'action' => 'index', 'admin' => true)); ?></li>
                                        </ul>
                                </li>      
                                <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profiles <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                                <li><?php echo $this->Html->link('Add', array('controller' => 'profiles', 'action' => 'add', 'admin' => true)); ?></li>
                                                <li><?php echo $this->Html->link('List', array('controller' => 'profiles', 'action' => 'index', 'admin' => true)); ?></li>
                                                <li><?php echo $this->Html->link('Export Profiles', array('controller' => 'users', 'action' => 'export_profile', 'admin' => true)); ?></li>


                                        </ul>
                                </li>

                        </ul>

                        <ul class="nav navbar-nav navbar-right">

                                <li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout', 'admin' => true)); ?></li>
                        </ul>    

                </div><!--/.navbar-collapse -->
        </div>
</header>