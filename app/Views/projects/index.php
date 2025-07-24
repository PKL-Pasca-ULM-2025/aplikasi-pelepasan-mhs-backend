<?=$this->extend("projects/layout")?>
 
<?=$this->section("content")?>
 
<div class="container">
    <h2 class="text-center mt-5 mb-3">CodeIgniter Project Manager</h2>
    <div class="card">
        <div class="card-header">
            <a class="btn btn-outline-primary" href="<?php echo base_url('/projects/new'); ?>"> 
                Create New Project 
            </a>
        </div>
        <div class="card-body">
                 
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <b><?php echo session()->getFlashdata('success') ?></b>
                </div>
            <?php endif ?>
 
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th width="240px">Action</th>
                </tr>
                <?php foreach ($projects as $project):?>
                <tr>
                    <td><?= $project->name ?></td>
                    <td><?= $project->description ?></td>
                    <td>
                        <form action="<?php echo base_url('/projects/delete/' . $project->id); ?>" method="post">
                            <a
                                class="btn btn-outline-info"
                                href="<?php echo base_url('/projects/show/' . $project->id); ?>">
                                Show
                            </a>
                            <a
                                class="btn btn-outline-success"
                                href="<?php echo base_url('/projects/edit/' . $project->id); ?>">
                                Edit
                            </a>
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach;?>
            </table>
        </div>
    </div>
</div>
 
<?=$this->endSection()?>