<div class="row">
    <ul class="breadcrumbs">
        <li><a href="<?php echo Router::url(array('controller' => 'posts', 'action' => 'index')) ?>">Manajemen Posting</a></li>
        <li class="current"><a href="#">Buat Posting Baru</a></li>
    </ul>
    <div class="four columns">
        <h1 class="opensans column-title">Posting Terbaru</h1>
        
        <?php
            foreach ($posts as $post):
        ?>
        <span class="label"><?php echo $post['Category']['name']; ?></span>
        <h3><?php echo $post['Post']['title'] ?></h3>
        <a style="margin: 0 0 10px 0;" class="th" href="<?php echo $post['Post']['url'] ?>"><?php echo $this->Html->image('media/' . $post['Post']['thumbnail_url']); ?></a>
        <?php echo $post['Post']['excerpt'] ?>
        <a href="<?php echo Router::url(array('action' => 'edit', $post['Post']['id'])); ?>" class="button secondary">Edit</a>
        <?php
            endforeach;
        ?>
        
        
    </div>
    <div class="eight columns">
        <h1 class="opensans">Posting Baru</h1>
        <?php
            echo $this->Form->create('Post', array('type' => 'file'));
        ?>
        <input type="hidden" name="data[Post][user_id]" value="<?php echo AuthComponent::user('account_id') ?>"/>
        <legend>Posting</legend>
        <?php
            echo $this->Form->input('title');
        ?>
        <label>Kategori</label>
        <?php
            echo $this->Form->select('category_id', $categories, array('style' => 'width: 200px; margin: 0 0 10px 0;'));
            echo $this->Form->input('excerpt', array('type' => 'textarea'));
        ?>
        <p class="clearfix" style="height: 10px;"></p>
        <legend>Sumber Asli</legend>
        <?php
            echo $this->Form->input('url', array('label' => 'URL asli tulisan'));    
        ?>
        <legend>Thumbnail</legend>
        <a class="th"><img src="http://placehold.it/370x300"/></a>
        <p class="clearfix" style="height: 10px;"></p>
        <label>Upload Gambar</label>
        <?php
            echo $this->Form->file('thumbnail');
        ?>        
        <p class="clearfix" style="height: 10px;"></p>
        <input type="submit" value="Buat Posting Baru" class="button"/>
        <?php            
            echo $this->Form->end();
        ?>
    </div>
</div>