<!-- File: src/Template/Users/index.ctp -->

<div class="container-fluid">
    <?php if ($authUser != "") { ?>
    <div class="col-md-2 sidebar">
      <ul class="nav nav-sidebar">
      <h3><?= __('Actions') ?></h3>
        <?php if (($authUserRole == "Admin") || ($authUserRole == "Manager")) { ?>
            <li><?= $this->Html->link(__('Create License'), ['action' => 'add']) ?></li>
        <?php } ?>
            <li><?= $this->Html->link(__('List Licenses'), ['action' => 'index']) ?></li>
      </ul>
      </ul>
    </div>

    <div class="col-md-8 main">
    <h2 class="page-header"><i class="fa fa-fw fa-dashboard"></i>Dashboard <small>Licenses</small></h2>
    <div class="table-responsive">

      <div class="col-lg-4 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-question fa-3x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= h($currentEvaluationCount) ?></div>
                        <div><strong>Current Evaluations</strong></div>
                    </div>
                </div>
            </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-key fa-3x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= h($totalLicenseCount) ?></div>
                        <div><strong>Total Licenses</strong></div>
                    </div>
                </div>
            </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-stop fa-3x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= h($expiredLicenseCount) ?></div>
                        <div><strong>Expired Licenses</strong></div>
                    </div>
                </div>
            </div>
        </div>
      </div>

    </div>

    <?php } else { ?>
      <div class="col-md-10 main">
        <div class="alert alert-danger">Access Denied!</div>
      </div>
    <?php } ?>
</div>

</div>
