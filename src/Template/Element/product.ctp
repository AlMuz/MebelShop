<?php foreach ($product as $product):?>
  <div class="col-sm-6 col-md-4 mainproduct">
    <?= $this->Html->link($this->Html->image($product->MainImage),
        ['action'=>'view',$product->idProduct],
        ['escape'=>false,'class'=>'thumbnail']);
    ?>
    <div>
      <h4>
        <?= $this->Html->link(($product->Name),
            ['action'=>'view',$product->idProduct]);
            if(($product->Interest) > 50 ){
                echo '<p style="float: right;"><span class="glyphicon glyphicon-heart"></span>TOP!</p>';
            }
        ?>
      </h4>
    </div>
    <div>
      Price:
      <?= $this->Number->currency($product->Price, $currency,['locale' => 'it_IT']);?>
    </div>
  </div>
<?php endforeach;?>
