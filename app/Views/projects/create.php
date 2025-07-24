<?=$this->extend("projects/layout")?>
 
<?=$this->section("content")?>
<div class="container">
    <h2 class="text-center mt-5 mb-3">Create New Project</h2>
    <div class="card">
        <div class="card-header">
            <a class="btn btn-outline-info float-right" href="<?php echo base_url('/projects'); ?>"> 
                View All Projects
            </a>
        </div>
        <div class="card-body">
            <!-- flashdata for success -->
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <b><?php echo session()->getFlashdata('success') ?></b>
                </div>
            <?php endif ?>
            <!-- flashdata for errors -->
            <?php if (session()->getFlashdata('errors')) : ?>
                <div class="alert alert-danger">
                    <ul>
                    <?php foreach (session()->getFlashdata('errors')  as $field => $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach ?>
                    </ul>
                </div>
            <?php endif ?>
 
            <form action="<?php echo base_url('/projects/create'); ?>" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input 
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        value="<?= old('name') ?>">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea 
                        class="form-control"
                        id="description"
                        rows="3"
                        name="description"><?= old('description') ?></textarea>
                </div>
                 
                <button type="submit" class="btn btn-outline-primary mt-3">Save Project</button>
            </form>
             
        </div>
    </div>
</div>
 
<?=$this->endSection()?>