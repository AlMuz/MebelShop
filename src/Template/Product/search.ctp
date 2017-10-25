<?php $this->assign('title', 'Search - '.$maintitle);?>

<?php if($this->request->query['search'] != null): ?>
  <div class="row">
    <h2 style="text-align:center;">
       Search request is: <b> <?= $this->request->query['search'] ?> </b>
    </h2>
    <hr style="border-top:1px solid #040404;">
  </div>
<?php endif; ?>

<?php if(!empty($product)) : ?>
  <div class="row">
    <!-- it print product with their style  -->
    <?= $this->element('product') ?>
  </div>
<?php else: ?>
  <h2 style="text-align:center;">No Results</h2>
  <hr style="border-top:1px solid #040404;">
<?php endif; ?>
