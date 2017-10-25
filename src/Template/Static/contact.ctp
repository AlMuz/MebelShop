<?php $this->assign('title', 'Contact us - '.$maintitle);?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<?= $this->Html->link('Home','/');?>
			</li>
			<li class="active">
        <?= 'Contact us!' ?>
			</li>
		</ol>
	</div>
</div>

<div class="container-fluid text-center">
  <div class="row content">
    <article>
      <h1>Contact us</h1>
      <h2>If you have any questions, feel free to contact with us!</h2>
    </article>
  </div>
</div>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="well well-sm">
				<?= $this->Form->create() ?>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="name"> Name </label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" required="required"  name="name"/>
              </div>
              <div class="form-group">
                <label for="email"> Email Address </label>
                <div class="input-group">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-envelope"></span>
                  </span>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" required="required" name="email"/>
                </div>
              </div>
              <div class="form-group">
                <label for="subject"> Subject </label>
                <select id="subject" name="subject" class="form-control" required="required">
                  <option value="na" selected="">Choose One:</option>
                  <option value="service">General Customer Service</option>
                  <option value="suggestions">Suggestions</option>
                  <option value="product">Product Support</option>
                </select>
              </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="name"> Message </label>
              <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required">
              </textarea>
            </div>
          </div>
          <div class="col-md-12">
						<?= $this->Form->button(__('Send'),['class' => 'btn btn-success col-xs-12 col-sm-1','tabindex' => '11']) ?>
					<?= $this->Form->end() ?>
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
