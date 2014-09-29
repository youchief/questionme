<header class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
                <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">QME <small>v.0.1</small></a>
                </div>
                <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                                <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">App <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                                <li class="dropdown-header">Q-days</li>
                                                <li><a href="#">Add</a></li>
                                                <li><a href="#">List</a></li>
                                                <li class="divider"></li>
                                                <li class="dropdown-header">Q-weeks</li>
                                                <li><a href="#">Add</a></li>
                                                <li><a href="#">List</a></li>
                                                <li class="divider"></li>
                                                <li class="dropdown-header">Regions</li>
                                                <li><a href="#">Add</a></li>
                                                <li><a href="#">List</a></li>
                                                <li class="divider"></li>
                                                <li class="dropdown-header">Contacts</li>
                                                <li><?php echo $this->Html->link('List', array('controller' => 'contacts', 'action' => 'index', 'admin' => true)); ?></li>

                                        </ul>
                                </li>
                                <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Questions <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                                <li class="dropdown-header">Questions</li>
                                                <li><a href="#">Add</a></li>
                                                <li><a href="#">List</a></li>
                                                <li class="divider"></li>
                                                <li class="dropdown-header">Question Types</li>
                                                <li><a href="#">Add</a></li>
                                                <li><a href="#">List</a></li>
                                                <li class="divider"></li>
                                                <li class="dropdown-header">Question Queries</li>
                                                <li><a href="#">Add</a></li>
                                                <li><a href="#">List</a></li>
                                        </ul>
                                </li>
                                <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Choices <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                                <li class="dropdown-header">Question Choices</li>
                                                <li><a href="#">Add</a></li>
                                                <li><a href="#">List</a></li>
                                                <li class="divider"></li>
                                                <li class="dropdown-header">Question Choice Types</li>
                                                <li><a href="#">Add</a></li>
                                                <li><a href="#">List</a></li>
                                                <li class="divider"></li>
                                                <li class="dropdown-header">Question Queries</li>
                                                <li><a href="#">Add</a></li>
                                                <li><a href="#">List</a></li>
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
                                                <li><a href="#">Add</a></li>
                                                <li><a href="#">List</a></li>
                                                <li class="divider"></li>
                                                <li class="dropdown-header">Order Types</li>
                                                <li><a href="#">Add</a></li>
                                                <li><a href="#">List</a></li>

                                        </ul>
                                </li>

                                <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gifts <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                                <li class="dropdown-header">Gifts</li>
                                                <li><a href="#">Add</a></li>
                                                <li><a href="#">List</a></li>
                                                <li class="divider"></li>
                                                <li class="dropdown-header">Vouchers</li>
                                                <li><a href="#">Add</a></li>
                                                <li><a href="#">List</a></li>

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
                                                <li><a href="#">Add</a></li>
                                                <li><a href="#">List</a></li>

                                        </ul>
                                </li>

                        </ul>

                        <ul class="nav navbar-nav navbar-right">

                                <li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout', 'admin' => true)); ?></li>
                        </ul>    

                </div><!--/.navbar-collapse -->
        </div>
</header>